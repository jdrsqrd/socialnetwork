<html>
<head>
	<title>Nosey</title>
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
	<div class="txt" align="center" id="content">
		<?php session_start();
		// echo "made it";
		// echo $_POST['username'];
		// echo "<br/>\n";
		// echo $_POST['pw'];
		// echo "<br/>\n";
		// replace with a database query to check the user credentials match

		$profile = $_POST['probox'];
		$cUID = $_SESSION['currentUserID'];

		$conn = mysql_connect("localhost", "jdr2", "S3Cr3T.228");

		if (!$conn) {
			echo "Unable to connect to DB: " . mysql_error();
			exit;
		}

		if (!mysql_select_db("jdr2")) {
			echo "Unable to select jdr2: " . mysql_error();
			exit;
		}

		//querey to check username with matching password
		$sql = "UPDATE User SET profile='$profile' WHERE userID='$cUID'";


		//runnign the querey on DB
		$result = mysql_query($sql);

		//success?
		if (!$result) {
			echo "Could not successfully run query ($sql) from DB: " . mysql_error();
			exit;
		}
		
		echo"Update Successful!</br>";
		$wait=0;
		mysql_free_result($result);
		$wait=1;
		
		//waits to make sure that the profile has been updated
		//then refreshes page
		if($wait=1){
			header("Location: http://student.seas.gwu.edu/~jdr2/profile.php");
		}
		
		//echo 'Back to <a href="profile.php">Profile</a>';

		?>
	</div>
</body>
</html>

