<?php 

session_start();

if(isset($_SESSION["username"])){
    echo "Welcome". $_SESSION["username"] . "!"; 
}else{
    echo "<a href=\"index.php\">clivk here to sign in</a>";

}
?>
<html>
    <body>
        <a href=""test.php>Go to next page</a>
    </body>
</html>