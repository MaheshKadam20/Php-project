<?php

error_reporting(0);

?>

<!DOCTYPE html>

<html lang="en">

<head>

   

    <title>File Upload</title>

</head>

<body>

    <form action="#" method="POST" enctype="multipart/form-data">

        <input type="file" name="uploadfile"><br><br>

        <input type="submit" name="submit" value= "Upload File">

</body>

</html>

<?php

$filename = $_FILES["uploadfile"]["name"];

$tempname = $_FILES["uploadfile"]["tmp_name"];

$folder = "images/".$filename;



move_uploaded_file($tempname , $folder);

echo "<img src='$folder' >";

?>
