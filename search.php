<?php
// session_start();
// if(isset($_SESSION['uname'])){
//   // header("Location:display.php");
// }
// else{
//   header("Location:login.php");
// }
include 'dbconn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Operation</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

 <form role="search"  method="POST">
<input class="form-control me-4"type="search"  placeholder="Search"  name="search"><button class="btn btn-outline-success" type="submit" name="submit" href="search.php">Search</button>

</form>
</div>

<?php
// if(isset($_POST["submit"])) {
//   $str = $_POST["search"];
//   $sth = $conn->prepare("SELECT * FROM 'search' WHERE Name = '$str'");
//   $sth->setFetchMode(PDO:: FETCH_OBJ);
//   $sth -> execute();
//   if($row = $sth->fetch())
//   {
//     <br><br><br>
//   }
// }
?>
<table class="table" border=1px>
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Image</th>
      <th scope="col">first_name</th>
      <th scope="col">last_name</th>
      <th scope="col">email</th>
      <th scope="col">user_name</th>
      <th scope="col">password</th>
      <th scope="col">role</th>
      <th scope="col">status</th>
      <th scope="col">added date</th>
      <th scope="col" colspan="2">Operation</th>
    </tr>
  </thead>
  <tbody>
<?php

if(isset($_POST['submit'])){
  $search=$_POST['search'];
  $query= "SELECT * FROM admin_users WHERE id like '%$search%'   or email like '%$search%' or username like '%$search%'";
  $query_run = mysqli_query($conn,$query);
if($query_run) {
    while($result=mysqli_fetch_assoc($query_run)) {
        echo "<tr><td>".$result['id']."</td>

        <td><img src='".$result['std_image']."'height='90px' width='90px'></td>

        <td>".$result['first_name']."</td>

        <td>".$result['last_name']."</td>

        <td>".$result['email']."</td>

        <td>".$result['username']."</td>

        <td>".$result['password']."</td>

        <td>".$result['role']."</td>

        <td>".$result['status']."</td>

        <td>".$result['added_date']."</td>

        <td><button class='btn btn-primary'><a href='update.php?Updateid=$result[id]' class='text-light'>Edit</a/button></td>

        <td><button class='btn btn-danger'><a href='delete.php?deleteid=$result[id]' onclick = 'return checkdelete()' class='text-light'>Delete</a></button></td></tr>";

}

}

}
  ?>
  </tbody>
</table>
<center>
<td><button class='btn btn-primary'><a href='display1.php' class='text-light'>Display Records</a></button></td>
</center>
</body>
</html>