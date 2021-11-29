<?php
require 'dbconnection.php';
session_start();


  if(isset($_POST['submit']))
  {


///declarations
$product_name=$_POST['product_name'];
$price=$_POST['price'];
$category=$_POST['category'];
$stock=$_POST['stock'];
$product_id=$_POST['userid'];

$name=$_FILES['product_image']['tmp_name'];


$image=$_FILES['product_image']['name'];
$old_image=$_POST['stud_old_image'];

$location='store_img/';

if($_FILES['product_image']['name'] != "") 
// No file was selected for upload, your (re)action goes here
{
	$filename=$image=$_FILES['product_image']['name'];
	$update_filename=$image;
}
else
{
	$update_filename=$old_image;
}    
$update_query="UPDATE product set p_name='$product_name',price='$price',category='$category',stock='$stock',image='$update_filename' where p_id='$product_id'";
$sqlCreate=mysqli_query($connection,$update_query);

 
 
    if($sqlCreate)
       { 

       	if($_FILES['product_image']['name'] != '') {

       	  move_uploaded_file($name, $location.$image);
       

         // unlink("img/".$old_image);

         }    
       
             header("Location: admin.php");
	           echo "updated successfully";
	           header("Location: admin.php");

       }
 }
//fetch value from database
$result = mysqli_query($connection,"SELECT * FROM product WHERE p_id='" . $_GET['p_id'] . "'");
$row= mysqli_fetch_array($result);


?>





<!DOCTYPE html>
<html>
<head>
<title>Update Employee Data</title>
<style>

	img{
		width: 150px;
		height: 150px;
	}
  .container{
     max-width: 500px;
     margin: auto;
     background-color: #b701ff;

  }
</style>
</head>
<body>

<form class="container" name="frmUser" method="post" enctype="multipart/form-data">
<div>
	<?

	php if(isset($message)) { echo $message; } 

	?>
</div>
<div style="padding-bottom:5px;">
<!--<a href=".php">Employee List</a>--->
</div>
ID: <br>
<input type="hidden" name="userid" class="txtField" value="<?php echo $row['p_id']; ?>">
<input type="text" name="userid"  value="<?php echo $row['p_id']; ?>">
<br>
Product Name: <br>
<input type="text" name="product_name" class="txtField" value="<?php echo $row['p_name']; ?>">
<br>
Price:<br>
<input type="text" name="price" class="txtField" value="<?php echo $row['price']; ?>">
<br>
Category:<br>
<input type="text" name="category" class="txtField" value="<?php echo $row['category']; ?>">
<br>
Stock:<br>
<input type="text" name="stock" class="txtField" value="<?php echo $row['stock']; ?>">
<br>

<img src="img/<?php echo $row['image']; ?>">
Image:<br>
<input type="file" name="product_image">
<br>
<br>

<input type="type" name="stud_old_image" value="<?php echo $row['image']?>">
<br>
 <!--<img src=<?php// echo $location.$row["image"];?>>-->
<br>
 <input type="submit" name="submit" value="Submit" class="button">

</form>
</body>
</html>