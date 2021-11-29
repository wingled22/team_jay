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


/*if(isset($_POST['btn-rate'])){

  echo "dale";
}*/

?>

<?php 

include("./header.php");

if(isset($_POST["btn-search"])){

  include("./client_body.php");

}
else{
   include("./include_php/include_storeProduct.php");
}

?>

<?php include("./footer.php");?>



</html>
