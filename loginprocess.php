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
        
        $username = $_POST['username'];
        $pw = $_POST['pw'];
        
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
        $sql = "SELECT * FROM User WHERE username='$username' AND pw='$pw'";
        
        
        //runnign the querey on DB
        $result = mysql_query($sql);
        
        //success?
        if (!$result) {
            echo "Could not successfully run query ($sql) from DB: " . mysql_error();
            exit;
        }
        
        //user error
        if (mysql_num_rows($result)==0){
            echo "Incorrect username and/or password. Please go back and try again.";
            exit;
        }
        
        echo "Sccessful Login</br>";
        $wait=0;
        $row = mysql_fetch_assoc($result);
        //variables from before could be used 
        $_SESSION['username'] = $row["username"];
        $_SESSION['currentUserID'] = $row["userID"];
        
        $test = $row["userID"];
        
        $ntest =$_SESSION['username'];
        //$test =  $_SESSION['currentUserID'];
        
        echo "$test</br>";
        
        //$ready=0;
        
        mysql_free_result($result);
        $wait=1;
        
        
        //waits to make sure that the session has been established
        //then redirects to home page
        if($wait=1){
            header("Location: http://student.seas.gwu.edu/~jdr2/home.php");
        }
        
        //echo 'Proceed to <a href="home.php">Home</a>';
        
        ?>
    </div>
</body>
</html>

