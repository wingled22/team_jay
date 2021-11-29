<?php 

require("./dbconnection.php");
session_start();

$username=$_SESSION['username'];
require("./dbconnection.php");


$result = mysqli_query($connection,"SELECT * FROM login where username='$username'");
$row= mysqli_fetch_array($result);

$name=$row['firstname'];


$client_name=$_SESSION['username'];

$result = mysqli_query($connection,"SELECT * FROM login WHERE username='$client_name'");
$row= mysqli_fetch_array($result);

$fullname= $row['firstname']." ".$row['lastname'];
$name=$row['firstname'];




/*$result = mysqli_query($connection,"SELECT * FROM cart where username='$username'");
$row= mysqli_fetch_array($result);*/
    
    
    if(isset($_POST['btn-update']))
    {
        
        /*---------Original Quantity--------*/
        $quantity=$_POST['quantity'];
        $stock2=$_POST['stock2'];
        
        $product_id=$_POST['product_id'];
        $stock=$_POST['stock'];
    
$var = $_POST['stock_id'];

        $con_stock = $stock2-$quantity;
    
        $update1 = "UPDATE cart SET stock = '$con_stock',quantity ='$quantity'  WHERE c_id='$product_id'";
        $update_success1 = mysqli_query($connection, $update1);
    
        $update2 = "UPDATE product SET stock = '$con_stock'  WHERE p_id=$var";
        $update_success2 = mysqli_query($connection, $update2);
    
        $update2 = "UPDATE wishlist SET stock = '$con_stock'  WHERE p_id=$var";
        $update_success2 = mysqli_query($connection, $update2);
        
        if ($update_success1)
        {
            echo "<script>if(confirm('Successfully Updated !')){document.location.href='MyOrders.php'};</script>";
            exit();
        }
        
    }
    
    
    
if(isset($_POST['btn_save'])){

$username=$_POST['username'];
$current=$_POST['current_password'];
$new=$_POST['new_password'];
$retype_password=$_POST['retype_password'];

$current_password=$row['password'];
$password=md5($current);


if($current_password != $password){
    echo "<script>alert('Current Password is Incorrect!!');window.location.href = 'ChangePassword.php';</script>";
}

else if($new !=$retype_password){
   
      echo "<script>alert('Password Mismatch!');window.location.href = 'ChangePassword.php';</script>";
}

else{

/* unfinished ***************************************/
$update_query="update login set username='$username',password=md5('$new') where id='".$row['id']."'";
$sqlCreate=mysqli_query($connection,$update_query);


    if($sqlCreate)
       { 

     
         echo "<script>alert('Password Change successfully');window.location.href = './ChangePassword.php';</script>";
            /* header("Location: client_dashboard.php");*/

       }

   }

}


if($_SESSION['status']=='invalid'|| empty($_SESSION['status']))

  {

     $_SESSION['status']=='invalid';
     header("Location: login.php");
  }

  //fetch client personal information//
 $client_name=$_SESSION['username'];

/*$result = mysqli_query($connection,"SELECT * FROM cart WHERE username='$client_name'");
$row= mysqli_fetch_array($result);

/*$fullname= $row['firstname']." ".$row['lastname'];

/*$_SESSION['id']=$_POST['id'];*/


 ?>
<!--end of php file------------------------------------------------------------------>

<?php
 include("./header.php");
 
if(isset($_POST["btn-search"]))
{
   
   include("./client_body.php");
   //event
}
else{
  include("./include_php/include_myOrders.php");
}
   


?>;

 
 <?php include("./footer.php")?>;



</html>