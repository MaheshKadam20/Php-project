<?php
session_start();
if(isset($_SESSION['uname'])){

}else{
    header("location: login.php");
}
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>User Home</title>
    </head>
    <body style="background:url(user.jpg); background-repeat; background-size:100% 100%">
        
    <center>
        <h1>User Home Page</h1><br>
        <a href="update.php"><button>Edit Profile</button></a>
        <a href="resetpass.php"><button>Change Password</button></a>
        <a href="logout.php"><button>Logout</button></a>
    </center>
    </body>
</html>

