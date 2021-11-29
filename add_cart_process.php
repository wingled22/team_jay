<?php 

session_start();
require("./dbconnection.php");




  if(isset($_POST['cart']))
   {
    

        $product_name=$_SESSION['product_name'];
        $price= $_SESSION['price'];
        $quantity=$_POST['quantity'];
        $image=$_SESSION['image'];
        $client=$_SESSION['client'];
        $id= $_SESSION['id'];

       


        //stock

         $present_stock=$_SESSION['stocks'];

         $result=$present_stock-$quantity;
         $stock=$result;


   
  
    $create_query= "insert into cart values(null,'$product_name','$price','$quantity','$image','$client',$stock,$id)";
    $sqlCreate=mysqli_query($connection,$create_query);//store the submitted data in database
 
      if($sqlCreate)
     {

          
        
        echo '<script>alert("Successfully added")</script>';
     //   header("Location: addCart.php");
    
         
           
        

       $update_query="update product set stock='$result' where p_id='$id'";
       $sqlCreate=mysqli_query($connection,$update_query);
       unset($_SESSION['stocks']);

 

         
      }
       
       else{
         //  echo "not added";
       }
     }
     
 ?>
