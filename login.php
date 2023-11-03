<?php

session_start();
include "dbconn.php";

?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Login Form</title>
        <link rel="stylesheet" type="text/css" href="login.css">

    </head>       
    <body class="login" style="background:url(login.jpg); background-repeat; background-size:100% 100%">
       
        <form action="" method="POST">
            <div>
                <center>
                <h2>Login</h2>
             
                <label>Username</label>
                <input type="text" name="uname" placeholder="Enter Username" >
                <br><br>
                <label>Password</label>
                <input type="password" name="pass"placeholder="Enter Password">
                <br><br>
                <button type='submit'>Login</button>
               <br><br>

                <p>Forget password? <a href="forgetpass.php">Click here</a></p>
                <p>For sign up <a href="index.php">Click here!</a></p>
                </center>
            </div>  
        </form> 
    </body>
</html>
<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $uname=$_POST['uname'];
    $pass=base64_encode($_POST['pass']);
   
          $sql="(SELECT * FROM admin_users WHERE username='$uname'AND password='$pass')";
          $result= mysqli_query($conn, $sql);
          $row= mysqli_fetch_array($result);
       ;
        if($row>0){
          if($row["role"]=="Users"){
              $_SESSION["uname"] = $uname;
                header("location:userhome.php");
            }
          elseif($row["role"]=="Admin"){
          

              $_SESSION['uname'] = $uname;
                header("location:adminhome.php");
            }
        }elseif(empty($uname) && empty($pass)){

               echo "<center>Username and Password is Empty!</center>";
        }elseif(empty($uname)){

          echo "<center>Username is Empty!</center>";
   }elseif(empty($pass)){

    echo "<center>Password is Empty!</center>";
}
        else{
           echo "<center>Incorrect username and password</center>";
        }
          
      }

?>
