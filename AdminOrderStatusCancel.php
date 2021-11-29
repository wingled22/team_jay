<?php 

session_start();
require("./dbconnection.php");


$username=$_SESSION['username'];
require("./dbconnection.php");

$buy =$_GET['buyID']; 

$create_query = "UPDATE buy SET status = 'Canceled' WHERE buy = $buy";
$sqlCreate=mysqli_query($connection,$create_query);
if($sqlCreate)
{
    echo '<script>alert("Status changed successfully")</script>';
    header("Location: AdminOrderStatus.php");
}else{
    echo '<script>alert("Status changed was not successful")</script>';
    header("Location: AdminOrderStatus.php");
}