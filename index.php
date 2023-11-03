<?php
session_start();
if(isset($_SESSION['uname'])){
    
}
// if(isset($_SESSION['uname'])){

// }else{
//   header("Location:login.php");
// }
//  $username = $password = $email = "";

//  $username_err = $password_err = $email = "";

include 'dbconn.php';

?>

<html>

    <head>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Registration</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="navigation_bar.css">

    </head>
    <body>
    
    <!-- <ul>
  <li><a class="active" href="adminhome.php">Home</a></li>
  <li><a href="index.php">Register</a></li>
  <li><a href="display1.php">User's Record</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul> -->

<body >
    
<div class="container">
        <form style='border:5px solid; margin:10px 250px;'  action="#" method="post" enctype="multipart/form-data">
                <center><h2>Register</h2>

                <label>Upload Images:</label>
                <input type="file" name="uploadfile"><br><br>
                <div class="col-1">
                <label>First Name:</label>
                </div>
                <div class="col-2">
                <input type="text" name="firstname" placeholder="First Name"><br><br>
                </div>


                <div class="col-1">
                <label>Last Name:</label>
                </div>
                <div class="col-2">
                <input type="text" name="lastname" placeholder="Last Name"><br><br>
                </div>

                <div class="col-1"> 
                <label>Email:</label>
                </div>
                <div class="col-2">
                <input type="text" name="email" placeholder="Eamil ID"><br><br>
                </div>

                <div class="col-1">
                <label>Username:</label>
                </div>
                <div class="col-2">
                <input type="text" name="username" placeholder="User Name"><br><br>
                </div>
                <div class="col-1">
                <label>Password:</label>
                </div>
                <div class="col-2">
                <input type="password" name="password" placeholder="Password"><br><br>
                </div>
                

                <div class="col-1">
                <label>Role:</label>
</div>

<div class="col-2">
                <select name="role" >
 
               <option >Admin</option>
              <option >Users</option>
                </select>
</div><br><br>

<div class="col-1">
                <label>Status:</label>
</div>

<div class="col-2">
                <select name="status">
                 <option value="0">Active</option>
                <option value="1">Deactive</option>      
                </select>
</div>
                 <br>
                 <br>
                <button type="submit" name="submit">Register</button><br><br>
                <a href="logout.php"><button>Logout</button></a>
                <br>
                <br>
            </center>
        </div>
        </form>
    </body>
</html>    

<?php

if(isset($_POST['submit'])){
    $filename = $_FILES["uploadfile"]["name"];
$tempname = $_FILES["uploadfile"]["tmp_name"];
$folder = "images/".$filename;
move_uploaded_file($tempname , $folder);
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $username=$_POST['username'];
    $password=base64_encode($_POST['password']);
    $role=$_POST['role'];
    $status=$_POST['status'];
    if(empty(trim($_POST["username"]))){
        echo"Username cannot be blank";
    }
    else{
        $sql = "SELECT id FROM admin_users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);                    
            // Set the value of param username
            $param_username = trim($_POST['username']);
            // Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "This username is already taken";
                    echo "This username is already taken";

                }

                else{

                    $username = trim($_POST['username']);

                }

            }

            else{

                echo "Something went wrong";

            }

        }

    }

    mysqli_stmt_close($stmt);

//

//Check for email

if(empty(trim($_POST["email"]))){

    echo"email cannot be blank";

}

else{

    $sql = "SELECT id FROM admin_users WHERE email = ?";

    $stmt = mysqli_prepare($conn, $sql);

    if($stmt)

    {

        mysqli_stmt_bind_param($stmt, "s", $param_email);                    

        // Set the value of param username

        $param_email = trim($_POST['email']);

        // Try to execute this statement

        if(mysqli_stmt_execute($stmt)){

            mysqli_stmt_store_result($stmt);

            if(mysqli_stmt_num_rows($stmt) == 1)

            {

                $email_err = "This email is already taken";

                echo "This email is already taken";

            }

            else{

                $email = trim($_POST['email']);

            }

        }

        else{

            echo "Something went wrong";

        }

    }

}

mysqli_stmt_close($stmt);

if(empty($username_err))

{

    $insertquery="INSERT INTO admin_users(std_image,first_name,last_name,email,username,password,role,status)VALUES('$folder','$firstname','$lastname','$email','$username','$password','$role','$status')";

    $result= mysqli_query($conn,$insertquery);

    if($result){

    header('location: display1.php');

}else{

    die(mysqli_error($conn));

}

}

}

?>


