<?php

session_start();
if(isset($_SESSION['uname'])){

}else{
   header("location: login.php");
}

$username = $password = $email = "";

$username_err = $password_err = $email_err = "";

 ?>

<?php

include 'dbconn.php';

$id=isset($_GET['Updateid']);
 $query ="Select * from admin_users where id='.$id.'";
$query_run =mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($query_run);
    $folder= $row['std_image'];
      $first_name=$row['first_name'];
        $last_name=$row['last_name'];
        $email=$row['email'];
        $username=$row['username'];
        $password=$row['password'];
        $role=$row['role'];
        $status=$row['status'];

if(isset($_POST['submit'])){
if(isset($_POST['submit'])){

if(($_FILES['uploadfile']['name']!=""))

{
     $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "images/".$filename;
    move_uploaded_file($tempname ,$folder);
}

else {

$filename=$_POST['oldimage'];

}
             $id=$_POST['id'];
            $first_name= $_POST['first_name'];
            $last_name= $_POST['last_name'];
            $email= $_POST['email'];
            $username= $_POST['username'];
            $password= base64_encode($_POST['password']);
            $role= $_POST['role'];
            $status= $_POST['status'];
            
            if(empty(trim($_POST["username"]))){

                echo"Username cannot be blank";

            }
            else{
                $sql = "SELECT id FROM admin_users WHERE id != ".$id." AND username = ?";
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
        if(empty(trim($_POST["email"]))){

            echo"email cannot be blank";
        }
        else{
            $sql = "SELECT id FROM admin_users WHERE id != ".$id." AND email = ?";
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
        if(empty($username_err) && empty($email_err))
        {
           $query = "update admin_users set std_image = '$folder', first_name = '$first_name',last_name = '$last_name',email='$email',username='$username',password='$password',role='$role',status='$status'
             where id='$id'";
            $query_run = mysqli_query($conn,$query);

            if($query_run){
                echo 'Updated Successfully';
                 header('location:display1.php');
                }else{
                    die("Failed to Connect".mysqli_connect_error());
                }
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
    <title>Registeration</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="navigation_bar.css">
</head>

<body style="background:url(index.jpg);background-repeat ; background-size:100% 100%"> 
<ul>
  <!-- <li><a class="active" href="adminhome.php">Home</a></li>
  <li><a href="index.php">Register</a></li>
   <li><a href="display1.php">User's Record</a></li> -->
  <li><a href="logout.php">Logout</a></li>
</ul>
<br>
<br>
    <form method="post" enctype="multipart/form-data">
        <center>
       <h3 align="center">Update Form</h3>
       
    <table border="1 px">
    <tr>
        <td>
      <label for="std_image">Upload Image :</label>
      <img src="<?php echo $folder;?>" style="margin-top:20px;" height='80px' width='80px' >
      &nbsp&nbsp&nbsp&nbsp
      <input type="file" name="uploadfile" >
      <input type="hidden" name="oldimage"  value= "<?php echo $updateid['upload_file']; ?>">
        </tr>

        <tr>
        <td>
        <div class="col-1">
            <label for="first_name">First Name : </label>
            </div>

            <div class="col-2">
            <input type="text" name="first_name" value= <?php echo $first_name; ?> >
            </div>
        </td>
        </tr>
        <tr>
        <td>
        <div class="col-1">
        <label for="last_name">Last Name : </label>
        </div>
        <div class="col-2">
        <input type="text" name="last_name" value= <?php echo $last_name; ?> >
        </div>
        </td>  
        </tr>
        <tr>
        <td>
        <div class="col-1">
        <label for="email">Email : </label>
        </div>
        <div class="col-2">
        <input type="text" name="email"  value= <?php echo $email; ?>>
        </div>
        </td>  
        </tr>
        <tr>
        <td>
        <div class="col-1">
        <label for="username">UserName : </label>
        </div>
        <div class="col-2">
        <input type="text" name="username" value= <?php echo $username; ?> >
       </div>

        </td>  

        </tr>

        <tr>

        <td>
        <div class="col-1">
            <label for="password">Password : </label>
            </div>
            <div class="col-2">
            <input type="text" name="password" value= <?php echo base64_decode($password); ?> >
            </div>
        </td>
        </tr>
        <tr>
         <td>
         <div class="col-1">
        <label for ="role">Role:</label>
</div>

<div class="col-2">
                <select name="role"  value= <?php echo $role; ?>>
                    <option <?php echo $role == 'User'? 'selected' :''?> >Users</option>
                    <option <?php echo $role == 'Admin' ? 'selected':''?> >Admin</option>
                </select>
</div>
        </td>  
        </tr>
        <tr>
        <td>
        <div class="col-1">
        <label for="status">Status : </label>
</div>

<div class="col-2">
        <select name="status"  value= <?php echo $status; ?> >

            <option value="1" <?php echo $status == '1'? 'selected' :''?> >active</option>
            <option value="0" <?php echo $status == '0'? 'selected' :''?>>Deactive</option>
        </select>
</div>
        </td>  
        </tr>
        <tr>

        <td align="center">
            <input type="submit" name="submit" value="Update" >
            <input type="hidden" name="id" value="<?php echo $id; ?>" >
        </td>
        </tr>
        </table>
        <br>
<a href="login.php"><button> Login</button></a>
    </table>
        </center>
    </form>



</body>



</html>
