<?php

require("dbconnection.php");

$rollno1=$_REQUEST["username"];

if($rollno1!=""){
	$query="SELECT * FROM login where username='$rollno1'";
	  $login_Sqlvalidate=mysqli_query($connection,$query);
      $row=mysqli_fetch_array($login_Sqlvalidate);

      $type=$row["type"];
      $store_name=$row["store_name"];
      $id=$row['id'];
}

$result=array("$type","$store_name","$id");
$myJson=json_encode($result);

echo "$myJson";


?>