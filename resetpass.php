<?php

session_start();
if(isset($_SESSION['uname'])){

}else{
   header("location: login.php");
}
?>
<?php
include 'dbconn.php';

$id=$_SESSION['uname'];
$query ="SELECT * from admin_users ";
$query_run =mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($query_run);
        $uname=$row['username'];
        $password=$row['password'];


if(isset($_POST['change_password'])){

    // $password=base64_encode($_POST['password']);
    $current= base64_encode($_POST['current']);

    $new= base64_encode($_POST['new']);

    $confirm= base64_encode($_POST['confirm']);

if ($new!=$confirm) {

$error="New Password and Confirm Password is not matched";

   echo "<h4 style='color:red'>New Password and Confirm Password is not matched</h4> ";

}
else{

  $sql ="SELECT * from admin_users WHERE username='$id' AND password='$current'";
  $result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0)
{
    $sql ="UPDATE admin_users set password='$new'  WHERE username='$id'";
    $result1=mysqli_query($conn,$sql);

if($result1){

    echo "<center><h4 style='color:green'> Password has been changed</h4> </center>";
}

else{
  echo "<center><h4 style='color:red'>Invalid Current Password </h4></center> ";
}
}
else{
    echo "<center><h4 style='color:red'>Invalid Current Password </h4> </center>";
  }
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset password</title>
</head>
<body>
    <center>
    <form action="" method="POST">
        <label>Old password:</label>
        <input type="password" name="current" placeholder="Old password"  > <br><br>

        <label>New Password:</label>
        <input type="password" name="new" placeholder="New Password"><br><br>

        <label>Confirm Password:</label>
        <input type="password" name="confirm" placeholder="Confirm Password"><br><br>
        <button type="submit" name="change_password" value="Update">Update</button>
        <button type="back" value="back" name="back"><a href="userhome.php">Back</a></button>
    </form>
    </center>
</body>
</html>