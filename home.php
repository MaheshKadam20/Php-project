<!DOCTYPE html>
<?php
session_start();

if(isset($_SESSION['id'])&& isset($_SESSION['user_name'])) {
//if(isset($_SESSION['user_name']) ) {
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>HOME</title>
    </head>       
    <body>
    <center>
        <h1>Hello,<?php echo $_SESSION['name']; ?></h1><br>
        <a href="logout.php"><button>Logout</button></a>
    </center>
    </body>
</html>
<?php
}else{
    header("Location:index.php");
    exit();
}
?>

