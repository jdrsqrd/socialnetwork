<html>
<head>
	<title>Nosey - Profile</title>
	<link rel="stylesheet" type="text/css" href="format.css"/>
</head>
<body>
	<div id="bg">
		<img 
		src="images/Nosey Background.png"
		width="100%"
		height="100%"
		alt="">
	</div>
	<div id="content">
		<?php session_start(); 
		
		echo "<h1 align=\"center\" class=\"head\">Profile</h1>";
		
		
		
		$cUName = $_SESSION['username'];
		$cUID = $_SESSION['currentUserID'];
		
		//echo "$cUName </br> $cUID";
		
		
		if(isset($_GET['userID'])){
				$userID = $_GET['userID'];
		}
		else{
				$userID = $_SESSION['currentUserID'];
		}
		
		
		echo "<p align=\"center\" class=\"txt\">Welcome $cUName</p>";
		//echo "Welcome " . $userID . "<br/>";
		//echo "<p>First_Name	Last_Name Username</p>	<br/>";
		
		echo '<p align="center" class="txt"><a href="home.php">Home</a></p>';
		echo"
		<form align=\"right\" class=\"txt\" action=\"logout.php\">
			<input type=\"submit\" value=\"Logout\">
		</form>";
		
		$conn = mysql_connect("localhost", "jdr2", "S3Cr3T.228");
		
		if (!$conn) {
			echo "Unable to connect to DB: " . mysql_error();
			exit;
		}
		
		if (!mysql_select_db("jdr2")) {
			echo "Unable to select jdr2: " . mysql_error();
			exit;
		}
		
		$sql = "SELECT * FROM User";
		
		$result = mysql_query($sql);
		
		//success?
		if (!$result) {
			echo "Could not successfully run query ($sql) from DB: " . mysql_error();
			exit;
		}
		
		while($row = mysql_fetch_assoc($result)){
			if($row["userID"]==$userID){
				$profile = $row["profile"];
				$puname = $row["username"];
				echo "<p align=\"center\" class=\"txt\">Now viewing $puname's profile:</p>";
				echo "<p align=\"center\" class=\"txt\">$profile</p>";
			}
		}
		$row = mysql_fetch_assoc($result);
		
		//form to edit profile
		if($cUID==$userID){
			echo"<p align=\"center\" class=\"stxt\">Edit Your Profile Below</p>";
			echo"
			<form align=\"center\" class=\"txt\" action=\"profileprocess.php\" method=\"POST\">
				<textarea rows=\"5\" cols=\"30\" type=\"text\" name=\"probox\">$profile</textarea></br>
				<input type=\"submit\" value=\"Submit Profile\">
			</form>
			";
		}
		
		
		mysql_free_result($result);
		
		?>
	</div>
</body>
</html>
	<!--<head>
	<style>
	p
	{ 
	word-spacing:30px;
	}
	</style>
</head>-->


