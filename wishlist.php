<?php
    
    require("./dbconnection.php");
    session_start();
    
    $username=$_SESSION['username'];
    require("./dbconnection.php");
    
    
    $result = mysqli_query($connection,"SELECT * FROM login where username='$username'");
    $row= mysqli_fetch_array($result);
    
    
     if($_SESSION['status']=='invalid'|| empty($_SESSION['status']))
      {

     $_SESSION['status']=='invalid';
     header("Location: login.php");
  }
   
    
    //fetch client personal information//
    $client_name=$_SESSION['username'];
    
    $result = mysqli_query($connection,"SELECT * FROM login WHERE username='$client_name'");
    $row= mysqli_fetch_array($result);
    
    $fullname= $row['firstname']." ".$row['lastname'];
    $name=$row['firstname'];
    
    /*$_SESSION['id']=$_POST['id'];*/


?>
<!--end of php file------------------------------------------------------------------>

<?php include("./header.php");

 
if(isset($_POST["btn-search"]))
{
   
   include("./client_body.php");
   //event
}
else{
  include("./include_php/include_wishlist.php");
}
   


?>

<?php include("./footer.php");?>

</html>