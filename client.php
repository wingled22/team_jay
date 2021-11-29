

<?php 

session_start();

//fetch profile image

$username=$_SESSION['username'];
require("./dbconnection.php");

 

$result = mysqli_query($connection,"SELECT * FROM login where username='$username'");
$row= mysqli_fetch_array($result);

$name=$row['firstname'];

if($_SESSION['status']=='invalid'|| empty($_SESSION['status']))

  {

     $_SESSION['status']=='invalid';
     header("Location: login.php");
  }
   $_SESSION['username']= $_SESSION['username'];
  
  if($_SESSION['status']=='valid')
   {
      header("Location: admin.php");
  }



 ?>





<?php 

include("./header.php");
 
   
if(isset($_POST["btn-search"]))
{
   
   include("./client_body.php");
   //event
}
else{
  include("./include_php/include_client.php");
}



?> 

      <?php
       include("./footer.php");



      ?>
</html>
      



