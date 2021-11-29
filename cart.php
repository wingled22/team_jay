<?php
session_start();
require("./dbconnection.php");



if($_SESSION['status']=='invalid'|| empty($_SESSION['status']))

  {

     $_SESSION['status']=='invalid';
     header("Location: login.php");
  }

  $client_name=$_SESSION['username'];

$result = mysqli_query($connection,"SELECT * FROM login WHERE username='$client_name'");
$row= mysqli_fetch_array($result);

$fullname= $row['firstname']." ".$row['lastname'];
$name=$row['firstname'];



if(isset($_POST['btn-update']))
{
    
    /*---------Original Quantity--------*/
    $quantity=$_POST['quantity'];
    $stock2=$_POST['stock2'];
    
    $product_id=$_POST['product_id'];
    $stock=$_POST['stock'];
    
$var = $_POST['stock_id'];
$varwish = $_POST['wish_id'];

      $con_stock = $stock2-$quantity;
    
      $update1 = "UPDATE cart SET stock = '$con_stock', quantity ='$quantity'  WHERE c_id='$product_id'";
      $update_success1 = mysqli_query($connection, $update1);
      
        $update2 = "UPDATE product SET stock = '$con_stock',sale='$quantity'   WHERE p_id=$var";
        $update_success2 = mysqli_query($connection, $update2);
    
    $update3 = "UPDATE wishlist SET stock = '$con_stock'  WHERE p_id='$varwish'";
    $update_success3 = mysqli_query($connection, $update3);
    
    
    
      if ($update_success1)
      {
          echo "<script>if(confirm('Successfully Updated !')){document.location.href='cart.php'};</script>";
          exit();
          }

  }


if(isset($_POST['price'])){

   echo "checked";
}

?>

<?php include("./header.php");

if(isset($_POST["btn-search"])){

  include("./client_body.php");

}
else{
  include("./include_php/include_cart.php");
}

?>

<?php include("./footer.php");?>



</html>
