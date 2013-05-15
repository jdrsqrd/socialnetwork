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
		
		$wait=0;
		$_SESSION['username'] = "";
		$_SESSION['currentUserID'] = "";
		$wait=1;
		
		//waits to make sure that the session has been terminated
		//then redirects to main page
		if($wait=1){
			header("Location: http://student.seas.gwu.edu/~jdr2");
		}
		?>
	</div>
</body>
</html>

