<?php 
session_start();
$username = "";
$passwrod = "";
$error = 0;
$processed = 0;
$error_message = "ERROR MESSAGE:";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $processed = 1;
    if(empty($_POST["username"])){
        $error = 1;
        $error_message .= "<br>&middot;Please enter a username.";
    }else{
        $username = $_POST["username"];

    }
    if(empty($_POST["password"])){
        $error = 1;
        $error_message .= "<br>&middot;Please enter a password.";
    }else{
        $username = $_POST["password"];
        
    }

}

//$_SESSION["username"] = "kchapin";

?>
<html>
    <body>
        <h2>System Login</h2>
        <form method="post" action="index.php">
            <span>Username:</span>
            <input type="text" name="username"><br><br>
            <span>Password:</span>
            <input type="password" name="password"><br><br>
            <input type="submit" value="submit">
        </form>     
    </body>
</html>