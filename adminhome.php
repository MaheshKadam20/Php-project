<?php
session_start();
if(isset($_session['uname'])){

}
else{
    //  header("location: login.php");
}
include 'dbconn.php';
?>

<html>
    <head>
        <meta charset="utf-8">
        <title> Admin Home</title>
        <link rel="stylesheet" type="text/css" href="navigation_bar.css">

    </head>
    <body style="background:url(admin.jpg); background-repeat; background-size:100% 100%">
    <ul>
  <li><a class="active" href="adminhome.php">Home</a></li>
  <li><a href="index.php">Register</a></li>
  <!-- <li><a href="update.php">Update</a></li> -->
  <li><a href="display1.php">User's Record</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
    <center>
        <h1 style="color:white;"> Admin Home Page</h1><br>
        <!-- <a href="index.php">Register New Users and Admin</a><br><br> -->
        <h2>Welcome Admin.</h2>
        <a href="logout.php"><button>Logout</button></a>
        <button><a href="display1.php">Users Data</a></button>
    </center>
    </body>
</html>
