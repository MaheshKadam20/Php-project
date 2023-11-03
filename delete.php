<?php
session_start();
include 'dbconn.php';
if(isset($_GET['deleteid'])){
  $id=$_GET['deleteid'];

    $sql= "delete from admin_users where id=$id";

    $result=mysqli_query($conn,$sql);

    if($result){
        header('location:display1.php');

    }
}
    else{

        die("Failed to Connect".mysqli_error($conn));

    }


?>
