<html>
<head>
	<title>Nosey - Wall</title>
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
		
		//if no one is logged in access is denied
		$uID = $_SESSION['currentUserID'];
		if($uID==""){
			echo '<p align="center" class="txt">Please log in on the home page <a href="index.php">here</a></p>';
			exit;
		}
		
		
		echo "<h1 align=\"center\" class=\"head\">The Wall</h1>";
		
		if(isset($_GET['userID'])){
				$userID = $_GET['userID'];
		}
		else{
				$userID = $_SESSION['currentUserID'];
		}
		
		$uname = $_SESSION['username'];
		
		echo "<p align=\"center\" class=\"txt\">Welcome $uname</p>";
		//echo "<p>First_Name	Last_Name Username</p>	<br/>";
		echo '<p align="center" class="txt"><a href="profile.php">Profile</a></p>';		
		$conn = mysql_connect("localhost", "jdr2", "S3Cr3T.228");
		
		if (!$conn) {
			echo "Unable to connect to DB: " . mysql_error();
			exit;
		}
		
		if (!mysql_select_db("jdr2")) {
			echo "Unable to select jdr2: " . mysql_error();
			exit;
		}
		
		$sql = "SELECT fn, ln, username FROM User";
		
		$result = mysql_query($sql);
		
		//success?
		if (!$result) {
			echo "Could not successfully run query ($sql) from DB: " . mysql_error();
			exit;
		}
		
		//form to enter a post
		echo"
		<form align=\"right\" class=\"txt\" action=\"logout.php\">
			<input type=\"submit\" value=\"Logout\">
		</form>
		
		<form align=\"center\" class=\"txt\" action=\"wallpost.php\" method=\"POST\">
			<input class=\"submsg\" type=\"text\" name=\"wallpost\">
			<input type=\"submit\" value=\"Post\">
		</form>
		
		";
		
		//table for posts
		echo"
		<div class=\"postdiv\">
		<table class=\"posts\">
			<tbody>
				<tr>
				<th class=\"frd\">Friend</th>	
				<th class=\"msg\">Message</th>
				<th class=\"dat\">Date</th>
				</tr>
			</tbody>
		</table>
		</div>
			";
		
		while($row = mysql_fetch_assoc($result)){
			$username = $row["username"];
			$userID = $row["userID"];
			$fname = $row["fn"];
			$lname = $row["ln"];
			if($username!=null){
			//echo "<p><a href=\"home.php?userID=$userID\">$fname $lname $username</a><p><br/>";
			}
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


