<html>
<head>
<style>
p
{ 
word-spacing:30px;
}
</style>
</head>
</html>

<?php session_start(); 

echo "Welcome " . $_SESSION['username'] . "<br/>";
echo "<p>First_Name	Last_Name Username</p>	<br/>";

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

while($row = mysql_fetch_assoc($result)){
	$username = $row["username"];
	$userID = $row["userID"];
	$fname = $row["fn"];
	$lname = $row["ln"];
	if($username!=null){
	echo "<p><a href=\"home.php?userID=$userID\">$fname $lname $username</a><p><br/>";}
}

mysql_free_result($result);

?>
