<?php 
session_start();
// echo "made it";
// echo $_POST['username'];
// echo "<br/>\n";
// echo $_POST['pw'];
// echo "<br/>\n";

// replace with a database query to check the user credentials match
$username = $_POST['username'];
$pw = $_POST['pw'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];

//check that all sign up fields have been filled out
if($username==null|| $pw==null|| $fname==null|| $lname==null){
    echo "Please fill all text fields before proceeding";
    exit;
}


$conn = mysql_connect("localhost", "jdr2", "S3Cr3T.228");

if (!$conn) {
    echo "Unable to connect to DB: " . mysql_error();
    exit;
}

if (!mysql_select_db("jdr2")) {
    echo "Unable to select jdr2: " . mysql_error();
    exit;
}

$unSQL = "SELECT * FROM User WHERE username = '$username'";

$unCheck = mysql_query($unSQL);

if (!$unCheck) {
    echo "Could not successfully run query ($unSQL) from DB: " . mysql_error();
    exit;
}


if(mysql_num_rows($unCheck)>0){
    echo "Username Already Taken!";
    exit;
}

$sql = "INSERT INTO User (fn, ln, username, pw) VALUES('$fname','$lname','$username','$pw')";

$result = mysql_query($sql);

if (!$result) {
    echo "Could not successfully run query ($sql) from DB: " . mysql_error();
    exit;
}

echo "Hello $fname $lname. You have succesfully signed up with Username:[$username] and password:[$pw].<br/>";

echo 'Proceed to <a href="index.php">Login</a>';

?>
