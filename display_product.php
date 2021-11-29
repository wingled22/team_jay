
<?php 

  session_start();
 require("./dbconnection.php");


  $username=$_SESSION['username'];



$result = mysqli_query($connection,"SELECT * FROM login where username='$username'");
$row= mysqli_fetch_array($result);

$name=$row['firstname'];



 ?>


<?php
include("./header.php");


if(isset($_POST["btn-search"]))
{
   
   include("./client_body.php");
   //event
}
else{
  include("./include_php/include_display_product.php");
}
   
?>

<?php

include("./footer.php");


?>
</body>
</html>
