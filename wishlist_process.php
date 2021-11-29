<?php
    require ("./dbconnection.php");
     
     if($_SESSION['status']=='invalid'|| empty($_SESSION['status']))
      {

     $_SESSION['status']=='invalid';
     header("Location: login.php");
  }
   
    $store_name=$_GET['store_name'];
    $user = $_GET['user'];
    $result = mysqli_query($connection,"SELECT * FROM product where p_id='$id'");
    $row= mysqli_fetch_array($result);
    
    $p_id=$row['p_id'];
    $name=$row['p_name'];
    $price= $row['price'];
    $stock= $row['stock'];
    $image= $row['image'];
    
    $create_query= "INSERT into wishlist values(null,'$name','$stock','$price','$image','$user','$p_id')";
    $sqlCreate=mysqli_query($connection,$create_query);//store the submitted data in database
    
    if($sqlCreate)
    {
       echo '<script>alert("Welcome to Geeks for Geeks")</script>';
           echo '<script>alert("Successfully added")</script>';
           header("Location: store_product.php?store_name=$store_name");
           
        
    }
    
    
    
    
    
    
    
    ?>