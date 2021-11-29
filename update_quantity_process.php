<?php

echo "has been clicked";

$sum=0;
if(isset($_POST['minus'])){
  $sum=$_POST['sum'];
  $sum--;
}

if(isset($_POST['add'])){
  $sum=$_POST['sum'];
  $sum++;
}

?>
