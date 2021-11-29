
<?php
session_start();

require 'dbconnection.php';

$sql = "DELETE FROM cart WHERE c_id='" . $_GET["id"] . "'";

echo $_SESSION['quantity'];
echo  $_SESSION['var_result'];
echo $_SESSION['var_id'];


$quantity=$_SESSION['quantity'];
$stock=$_SESSION['var_result'];
$_id= $_SESSION['var_id'];


$add=$quantity+$stock;

$sale_value=0;
    


if (mysqli_query($connection, $sql)) {
    echo "Record deleted successfully";

      $update_query="update product set stock='$add',sale='$sale_value' where p_id='$_id'";
      $sqlCreate=mysqli_query($connection,$update_query);


       $update3 = "UPDATE wishlist SET stock = '$add'  WHERE p_id='$_id'";
       $update_success3 = mysqli_query($connection, $update3);
    
    header("Location: cart.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($connection);

?>