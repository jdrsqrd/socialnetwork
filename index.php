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
			<h1 align="center" id="head">Nosey</h1>
			<form align="center" class="txt" action="loginprocess.php" method="POST">
				Username: <input type="text" name="username">
				Password: <input type="password" name="pw">
				<input type="submit" value="Login">
			</form>
			<div class="desc">
				<p align="center" class="txt">Welcome to Nosey! The totally new and hip social network where you get to do your favorite thing: BE Nosey! Stalk all of your firends. Find out what they're doing, when they're doing it, and where! Take stalking to an all new level here on Nosey!</p>
			</div>
			<form align="center" class="txt" action="signup.php" method="POST">
				Don't have an account yet? Sign up today!<input type="submit" value="Sign Up">
			</form>
		</div>
	</body>
</html>
