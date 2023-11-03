<?php

$sname="localhost";
$uname="root";
$password="";
$db_name="test_db1";

$conn= mysqli_connect($sname,$uname,$password,$db_name);

if(!$conn){
    die("Failed to Connect".mysqli_connect_error());
}
