<?php
session_start();

$username = "";
$password = "";
$error = 0;
$processed = 0;
$error_message = "Error Message: ";

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
        $password = $_POST["password"];
    }

    if($error == 0){
        if($username == "kchapin" && $password == "12345"){
            $_SESSION["username"] = "kchapin";
            header("Location: search.php");
        }else{
            $error = 1;
            $error_message .= "<br>&middot;Invalid Username or Password.";
        }
    }

}

?>
<html>
    <body>
        <h2>System Login</h2>
        <?php
            if($error == 1 && $processed == 1){
                echo "<font color=red>" . $error_message . "</font>";
            }
        ?>
        <form method="post" action="index.php">
            <span>Username:</span><br>
            <input type="text" name="username"><br>
            <span>Password:</span><br>
            <input type="password" name="password"><br><br>
            <input type="submit" value="Submit">
        </form>
    </body>
</html>