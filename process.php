<html>
    <body>
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST"){
            echo "Method: Post";
            if(empty($_POST["firstname"])){
                echo "No first name provided!";
            }else{
                echo "First Name: " .$_POST["firstname"] . "<br>";
            }
            if(empty($_POST["lastname"])){
                echo "No last name provided!";
            }else{
                echo "Last Name: " .$_POST["lastname"]. "<br>";
            }
            if(empty($_POST["password"])){
                echo "No password provided!";
            }else{
                echo "Password : " .$_POST["password"] . "<br>";
            }
            if(empty($_POST["member"])){
                echo "Not member day";
            }else{
                echo "Member : " .$_POST["member"] . "<br>";
            }
            }else{
            echo "Method : Get";
            }

         ?>  


    </body>




</html>