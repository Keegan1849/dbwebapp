<?php
session_start();
$action = "";

$servername = "localhost:3306";
$username = "root";
$password = "password";
$database = "adptestdb";
$error = FALSE;
$error_message = "";
$nameuser = "";
$wordpass = "";
$processed = 0;
//Create DB Connection
$conn = new mysqli($servername, $username, $password, $database);
$conn_error = false;
if($conn->connect_error){
    $conn_error = true;
}


if(!isset($_SESSION["username"])){
    header("Location: search.php");
}else{

    if(!empty($_GET["action"])){
        $action = $_GET["action"];


    }
    if($nameuser == "testuser" && $wordpass == "54321"){
        $_SESSION["nameuser"] = "testuser";
        header("Location: search.php");
    }else{
        $error = 1;
        $error_message .= "<br>&middot; Invalid username or password";
    }
?>
<html>
    <head>
        <title>USER PAGE</title>

    </head>
    <body>
    <?php
            if($error == 1 && $processed == 1){
                echo "<font color=red>" . $error_message . "</font>";
            }
        ?>
        <form method="post" action="search.php">
            <span>Username:</span><br>
            <input type="text" name="nameuser"><br>
            <span>Password:</span><br>
            <input type="password" name="wordpass"><br><br>
            <input type="submit" value="Submit">
        </form>
    </body>
</html>
<?php
}
?>
