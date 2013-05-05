<?php session_start(); ?>

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
		<div id="content">
			<form align="center" class="txt" action="signupprocess.php" method="POST">
				First name<input type="text" name="fname"><br />
				Last name <input type="text" name="lname"><br />
				Username <input type="text" name="username"><br />
				Password <input type="password" name="pw"><br />
				<input type="submit" value="Sign Up">
			</form>
	</div>
	</body>
</html>
