<?php
$fname = "";
$lname = "";
$email = "";
$error = 0;// zero means no error
$process_data = 0;
$error_message = "please fix the following feilds";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $process_data = 1;
    if(empty($_POST["firstname"])){
        $error = 1;
        $error_message .= "<br> & middot; first name"
    }else{
        $fname = $_POST["firstname"];
    }
}   
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["lastname"])){
        $error = 1;
        $error_message .= "<br> & middot; last name"
    }else{
        $lname = $_POST["lastname"];
    }
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["email"])){
        $error = 1;
        $error_message .= "<br> & middot; email"
    }else{
        $email = $_POST["email"];
    }
}else{
    //possible invalid request/access

}

//No Errors - go to service page
if($error == 0 && $process_data == 1){
    headers("Location: index.php");
}
?>

<html>
<head>
    <title>PHP Form Test</title>
</head>
<body>
<h3>Customer Form</h3>
<?php
if($error==1){
    echo"<font color=red>" . $error_message . "</font>";
}
?>
<form method = "get" action = "process.php">
    <span>First Name:</span><br>
    <input type ="text" name = "firstname" value="<?=$fname?>"><br>
    <span> Last Name:</span><br>
    <input type ="lastname" name = "lastname"  value="<?=$lname?>"><br>
    <span> email:</span><br>
    <input type ="email" name = "email"  value="<?=$email?>"><br>
    <span>Already a Customer?:</span>&nbsp;<input type="checkbox" name="member"> <br><br>
    <input type="submit" value="submit">
</form>
</body>