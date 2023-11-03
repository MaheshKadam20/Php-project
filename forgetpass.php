<?php

include 'dbconn.php';

$id=isset($_SESSION['uname']);

$query ="SELECT * from admin_users ";

$query_run =mysqli_query($conn,$query);

$row=mysqli_fetch_assoc($query_run);

 $uname=$row['username'];

$password=$row['password'];

// if(isset($_POST['change_password'])){


//  $new= isset($_POST['new']);

// $confirm=isset($_POST['confirm']);

// if ($new!=$confirm) {

// $error="New Password and Confirm Password is not matched";

// echo "<h4 style='color:red'>New Password and Confirm Password is not matched</h4> ";

// }

// else{

//  $sql ="UPDATE admin_users set password='$new' WHERE username='$id'";

//  $result1=mysqli_query($conn,$sql);

// // if($result1){

// //  echo "<center><h4 style='color:green'> Password has been changed</h4> </center>";

// // }
// // else{

// //  echo "<center><h4 style='color:red'>Invalid Current Password </h4></center> ";

// // }

// }

// }

?>

<!DOCTYPE html>

<html lang="en">

<head>

 <meta charset="UTF-8">

 <meta http-equiv="X-UA-Compatible" content="IE=edge">

 <meta name="viewport" content="width=device-width, initial-scale=1.0">

 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css%22">

 <title>Reset password</title>

</head>

<body>

<style>

 * body

{

 background-color: rgb(232, 233, 166);

}

.container{


max-width: 500px;
width: 32%;

background-color: white;

margin: 40px auto;

padding: 10px;

box-shadow: 5px 5px 5px rgba(0,0,0,0.5);



}

.container .form

{

 width: 100%;

}

/* .container .form.class

{

 margin-bottom: 30px;

 display:flex;

 align-items: center;

}.container.form .class label

{

 width: 200px;

margin-left: 10px;

 font-size: 20px;

} */

.container .form.rutuja .input

{

 width: 100%;

 outline: none;

 border: 1px solid #D071f9;

 font-size: 16px;

 padding: 5px 10px;

 border-radius: 20px;

 transition: all 0.5s ease;

}

</style>
<table border="1 px">
<center>


 <div class="form">

 <div class="container">

 <h2>Forgot Password</h2>

 <form action="" method="POST">

</div>

<div class="rutuja">

 <label> User Name :</label>

 <input type="text" name="username" style="margin-left:20px " placeholder="User Name" required> <br><br>

</div>

<div class="rutuja">

 <label> Mobile Number:</label>

 <input type="number" name="Mobile Number" style="margin-left:10px " placeholder="Mobile Number" required>
 <button type= submit ><a href="OTP.php"> Get OTP</a></button>

</div>
 <!-- <button type="submit" name="change_password" value="Update">Update</button> -->

 <button ><a href="login.php" type="submit" name="back" value="back">Back</a></button>

</div>

 </form>

 </center>

</body>

</html>

