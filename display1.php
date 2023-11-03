



<?php
session_start();
if(isset($_SESSION['uname'])){
}else{
  header("Location:login.php");
}
include 'dbconn.php';

?>

<!DOCTYPE html>



<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
    <link rel="stylesheet" type="text/css" href="navigation_bar.css">

</head>

<body>



  <style>

    body

    {

      background:#92a8d1;

    }

table

    {

      text-align: center;

      background-color:white;

      margin: 20px auto;

      padding: 40px;

      max-width: 800px;

      width: 40%;

    }

    .Edit

    {

      font-size:20px;

      background-color: green;

      color: white;

      border:0;

      outline:none;

      border-radius: 6px;

    }

    .delete

    {

      font-size:20px;

      background-color: red;

      color: white;

      border:0;

      outline:none;

      border-radius: 6px;

    }

 

 

  </style>



<br>
<br>
<br>
<center><h2>Displaying All records</h2></center>


<ul>
  <li><a class="active" href="adminhome.php">Home</a></li>
  <li><a href="index.php">Register</a></li>
  <!-- <li><a href="update.php">Update</a></li> -->
  <li><a href="display1.php">User's Record</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>

<centre><table border="1" cellspacing ="6" width="100%"class="table">

 

  <thead

    <tr>

      <th width="7%" scope="col">Sr. No.</th>

      <th width="7%" scope="col">Image</th>

      <th width="7%" scope="col">first_name</th>

      <th width="7%" scope="col">last_name</th>

      <th width="7%" scope="col">email</th>

      <th width="7%" scope="col">user_name</th>

      <th width="7%" scope="col">password</th>

      <th width="7%" scope="col">role</th>

      <th width="7%" scope="col">status</th>

      <th width="7%" scope="col">added date</th>

      <th width="7%" scope="col">operation</th>

      <th width="7%" scope="col">operation</th>



    </tr>

  </centre>

  </thead>

  <tbody>

  <center><div class="container">

   <button ><a href="index.php">Add users</a></button>

  <!-- <a href="logout.php"><button>Logout</button></a> -->

  <button class='btn btn-primary'><a href="search.php" class='text-light'>Search</a></button>



</div>
</center>

  <?php 
  //pagination

  $num_per_page=02;

  if(isset($_GET["page"])){

    $page=$_GET["page"];

  }

  else{

    $page=1;

  }
  $start_form=($page-1)*02;

  $query="select * from admin_users limit $start_form,$num_per_page";

  $query_run = mysqli_query($conn,$query);

// $query= "SELECT * FROM admin_users";

// $query_run = mysqli_query($conn,$query);
$n=1;
if($query_run)

{

    while($result=mysqli_fetch_assoc($query_run))

    {

        

        echo "<tr><td>$n</td>



        <td><img src= '".$result['std_image']."' height='90px' width='90px'></td>

        <td>".$result['first_name']."</td>

        <td>".$result['last_name']."</td>

        <td>".$result['email']."</td>

        <td>".$result['username']."</td>

        <td>".$result['password']."</td>

        <td>".$result['role']."</td>

        <td>".$result['status']."</td>

        <td>".$result['added_date']."</td>


        <td><a href='update.php?Updateid=$result[id]'><input type='submit' value='Edit' class='Edit'></a></td>

        <td><a href='delete.php?deleteid=$result[id]' onclick = 'return checkdelete()'> <input type='submit' value='Delete' class='delete'></a></td></tr>";

//                ."</td><td><a href='delete.php?id=".base64_encode($result['id'])."'>Delete</td><td><a href='update.php?id=".base64_encode($result['id'])."'>Update</td></tr>";
$n ++ ;
}

}
  ?>
  </tbody>

</table>

<script>
  function checkdelete()

  {
    return confirm('Are you sure you want to Delete this record');
  }
</script>
<center>
  <?php 

$query="select * from admin_users";

$query_run = mysqli_query($conn,$query);

$total_records=mysqli_num_rows($query_run);

$total_pages=ceil($total_records/$num_per_page);

if($page>1){

  echo "<a href='display1.php?page=".($page-1)."'><button class='btn btn-outline-success' >Previous</button></a>";

}

for($i=1; $i<=$total_pages;$i++){

  //echo "<a href='display.php?page=".$i."'>".$i."</a>";

  //echo "<button class='btn btn-outline-success'  href='display.php?page=".$i."'>".$i."</button>";

  echo "<a href='display1.php?page=".$i."'><button class='btn btn-outline-success'  >".$i."</button></a>";

}

if($page<$i){

  echo "<a href='display1.php?page=".($page+1)."'><button class='btn btn-outline-success' >Next</button></a>";

}
?>
</center>
</body>
</html>