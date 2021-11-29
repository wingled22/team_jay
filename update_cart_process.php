
<?php
session_start();

require 'dbconnection.php';

 //echo $_POST['quantity'];
 //echo $_GET['id'];

 $quantity_value=$_POST['quantity'];
 $cart_id=$_GET['id'];

 echo $quantity_value;
 echo $cart_id;
// echo  $_SESSION['ids'];
//if (mysqli_query($connection,$sql)) {

      $update_query="update cart set quantity='$quantity_value' WHERE c_id='$cart_id'";
      $sqlCreate=mysqli_query($connection,$update_query);
      header("Location: ./cart.php");
 // }
 // else{
      if($sqlCreate)
      {
      	echo "updated sucessfully";
      }


  //}

?>