<?php
session_start();
$action = "";

$fname  = "";
$lname = "";
$contact = "";
$city = "";
$state = 0;
$zip = "";
$salary = 0.00;
$error = false;
$error_message = "Please fill it the following feilds:<br>";
$servername = "localhost:3306";
$username = "root";
$password = "password";
$database = "adptestdb";
//Create DB Connection
$conn = new mysqli($servername, $username, $password, $database);
$conn_error = false;
if($conn->connect_error){
    $conn_error = true;
}


if(!isset($_SESSION["username"])){
    header("Location: index.php");
}else{

    if(!empty($_GET["action"])){
        $action = $_GET["action"];


    }

    if($action== "logout"){
        session_destroy();
        header("Location: index.php");
    }
if(isset()$_POST["Submit"]){
    if(empty()$_POST["fname"]){
        $error = true;
        $error_message .= "-First Name"
    }else{
        $fname = $_POST["fname"];
    }
    if(empty()$_POST["lname"]){
        $error = true;
        $error_message .= "-Last Name"
    }else{
        $fname = $_POST["lname"];
    }
    if(empty()$_POST["contact"]){
        $error = true;
        $error_message .= "-Contact"
    }else{
        $fname = $_POST["Contact"];
    }
    if(empty()$_POST["city"]){
        $error = true;
        $error_message .= "-City"
    }else{
        $fname = $_POST["City"];
    }
    if(empty()$_POST["state"]){
        $error = true;
        $error_message .= "-State"
    }else{
        $fname = $_POST["state"];
    }
    if(empty()$_POST["zip"]){
        $error = true;
        $error_message .= "-Zip"
    }else{
        $fname = $_POST["zip"];
    }
    if(empty()$_POST["salary"]){
        $error = true;
        $error_message .= "-Salary"
    }else{
        if(is_numeric($_POST["salary"])){
            $salary = $_POST["salary"];

        }else{
            $error_message .= "-Salary is NAN"
        }
    }



}
?>
<html>
    <head>
        <title>SEARCH PAGE</title>
        <style>
            body{
                background-color: #e6f7ff;
            }
            .top-container{
                display: flex;
                background-color: #006699;
                border-radius: 3px;
            }
            .top-item1{
                padding:10px;

                margin: 5px;
                width: 50%;
            }
            .top-item2{
                padding:10px;
 
                margin: 5px;
                width: 50%;
                text-align: right;
            }
            .form-container{
                display: flex;
                background-color: #006699;
                border-radius: 3px;
                width: 20%;
            }
            .form-item1{
                padding:10px;
                margin: 5px;
                width: 12%;
                text-align: right;
            }
            .form-item2{
                padding:10px;
                margin: 5px;
                width: 12%;
                text-align: left;
            }
            span.title{
                font-weight: bold;
                font-size: 26pt;
                color: #ffffff;
            }
            span.title-reg{
                font-size: 12pt;
                color: #ffffff;
            }
            a.link1{
                font-size: 12pt;
                color: #e0ebeb;
            }
            a.link1:hover{
                font-size: 12pt;
                color: purple;
            }
        </style>
    </head>
    <body>
        <div class="top-container">
            <div class="top-item1">
                <span class="title">ADP DB WebApp</span><br>
                <span class="title-reg">Customer Search Page</span>
            </div>
            <div class="top-item2">
                <span class="title-reg">Welcome, <?=$_SESSION["username"]?>.</span><br>
                <span class="title-reg">Click <a href="search.php?action=logout" class="link1">here</a> to logout.</span><br>
            </div>
        </div>
        <br><br>
           <form method="post" action="inesert.php">
        <div class="form-container">
            <div class="form-item1">
                Firstname:
            </div>
            <div class="form-item2">
                <input type="text" name="firstname" name="name" value="<?=$fname?>">

            </div>
        </div>
        <div class="form-container">
            <div class="form-item1">
                Lastname:
            </div>
            <div class="form-item2">
                <input type="text" name="lastname" name="lastname" value="<?=$lname?>">

            </div>
        </div>
        <div class="form-container">
            <div class="form-item1">
                Contact:
            </div>
            <div class="form-item2">
                <input type="text" name="Contact" name="Contact" value="<?=$contact?>">

            </div>
        </div>
        <div class="form-container">
            <div class="form-item1">
                City:
            </div>
            <div class="form-item2">
                <input type="text" name="City" name="City" value="<?=$city?>">

            </div>
        </div>
        <div class="form-container">
            <div class="form-item1">
                State:
            </div>
            <div class="form-item2">
        <select name="state">
        <?php
            If($conn_error == false){
                $sql = "SELECT * FROM adptestdb.state;";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()){
                    ?>
                        <option value="<?=row[state_id]?>"><?=row[state_name]?></option>
                    <?php

                }
            }
        ?>


        </select> 
            </div>

        </div>  
     
        <div class="form-container">
            <div class="form-item1">
                Zip:
            </div>
            <div class="form-item2">
                <input type="text" name="Zip" name="Zip" value="<?=$zip?>">

            </div>
        </div>
        <div class="form-container">
            <div class="form-item1">
                Salary:
            </div>
            <div class="form-item2">
                <input type="text" name="Salary" name="Salary" value="<?=$salary?>">
                

            </div>
            
        </div>
<input type="submit" value="submit">

           </form>
    </body>
</html>
<?php
    $conn->close();
}
?>