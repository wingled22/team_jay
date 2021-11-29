<?php 

session_start();
require("./dbconnection.php");


$username=$_SESSION['username'];
require("./dbconnection.php");


$result = mysqli_query($connection,"SELECT * FROM login where username='$username'");
$row= mysqli_fetch_array($result);

$name=$row['firstname'];

/*if($_SESSION['status']=='valid')
{
   header("Location: display_product.php");
}*/


if($_SESSION['status']=='invalid'|| empty($_SESSION['status']))

  {

     $_SESSION['status']=='invalid';
     header("Location: login.php");
  }


       
  if(isset($_POST['buy']))
   { 

       $_SESSION['status']=='invalid';
    

        $product_name=$_SESSION['product_name'];
        $price= $_SESSION['price'];
        $quantity=$_POST['quantity'];
        $image=$_SESSION['image'];
        $client=$_SESSION['client'];
        $id= $_SESSION['id'];
        $stock2 = $_POST['stock2'];
        $date = date('m-d-y');


        //stock

         $present_stock=$_SESSION['stocks'];

         echo $_SESSION['stocks'];
         $result=$present_stock-$quantity;
         $stock=$result;

 
    $create_query= "INSERT into buy values(null,'$product_name','$price','$quantity','$image','$client','$stock','$stock2','$id','$date')";
    $sqlCreate=mysqli_query($connection,$create_query);//store the submitted data in database
 
   if($sqlCreate)
   {

          
        
        echo '<script>alert("Successfully added")</script>';
        header("Location: buy.php?id=$id");
           

       $update_query="UPDATE product set stock='$result',sale='$quantity' where p_id='$id'";
       $sqlCreate=mysqli_query($connection,$update_query);
       unset($_SESSION['stocks']);

      $update3 = "UPDATE wishlist SET stock = '$result'  WHERE p_id='$id'";
       $update_success3 = mysqli_query($connection, $update3);

         
      }
       
       else{
         //  echo "not added";
       }
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
 include("./include_php/include_buyItem.php");
}
   



?>
<!--categories------------------------------------------------------------>

<?php


include("./footer.php");

?>

</html>

