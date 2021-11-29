<?php 

  require("./dbconnection.php");
  
  session_start();

  if(empty($_SESSION['status']))
  {
    $_SESSION['status']='invalid';
  }

if($_SESSION['status']=='valid')
{
    header("Location: admin.php");
}

if($_SESSION['status']=='client-valid')
  {
      header("Location: client.php");
  }
 ?>



<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="cart.css">
  <link rel="stylesheet" type="text/css" href="client_dashboard.css">
  <title>Tap and Go - Food Corners</title>
  
</head>
<body>
<form method="POST" action="#">
   <nav class="nav-bar">
  <!---- <div class="nav-bar">------------>

  <!---- </div>----------------->
   </nav>
   <header class="search-navs">
  <!---- <div class="search-navs">--------------------------------------------->
    <div class="logo-container">
      <img style="width: 120px; height: 80px; padding-right: 1rem;" src="../team_jay/images/Tap.png">
    </div>
    <div class="logo_name">
      <h2>Tap and Go - Food Corners</h2>
    </div>
   </div>
    <div class="search_textbox">
      <input type="text" name="search_box" placeholder="Search in Tap and Go - Food Corners">
      
         <div class="btn-icons">

         <!-- <a href="search.php"><i class="fas fa-search"></i></a>
     <!--   <a href="search.php" onclick="myFunction(); return false;">LINK</a>
         <!--<a href="#search.php" onclick='MyFunction()'><i class="fas fa-search"></i></a>-->
     <!--  <button onclick="myFunction()">Click Me</button>--->
       
 <button name="btn-search"> <i style="color: #ffff" class="fas fa-search"></i></button>
<form autocomplete="off">
                 <!-- <button type="submit" name="btn-update" <i" class="fas fa-search"></button>-->
                       

         </div>
   </div>
   <div class="shop-icon">
        <a href="cart.php">
           <i class="fas fa-shopping-cart"></i>
      </a>
   </div>

   <ul class="nav-links">
    <li><a href="./client.php">Product</a></li>
              <li><a href="#">PURCHASE HISTORY</a></li>
              <li><a href="login.php">LOGIN</a></li>
           
            
                
   </ul>


<!----</div>---------------------->
</header>
 

 <style>

  .digital-container{
    
    margin:20px 97px;
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    flex-wrap: wrap;
    box-shadow: 0 0 8px 0 #E8E8E8;
  
  }
  .info p{
    font-size: 12px;
  }
   
  .sub-digital-container{
    margin: 10px;
    padding: 0px;

    
  }
  .sub-digital-container:hover{
     box-shadow: 0 0 20px 0 #E8E8E8;
  }
  .sub-digital-container .image{
    
    width:190px;
    height: 160px;

  }
  
  .sub-digital-container .info {
    width: 170px;
    height: 60px;
    padding: 10px;

  }
 
  .sub-digital-container .image img{
    width: 100%;
    height: 100%;
    
  } 

  .titles{
    margin-top: 50px;
    margin-left: 95px;
  }

  /* digital container design*/
    .digital-container{
    
    margin:20px 97px;
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    flex-wrap: wrap;
    box-shadow: 0 0 8px 0 #E8E8E8;

    
  }
  /* btn cart design*/
 
 </style>




 <div class="titles">
     <h2>STORES</h2>
 </div>

 
 <div class="digital-container">



 <?php
 

    // $selecteds= $_SESSION['value'];


   require("./dbconnection.php");
   $query="select * from login where type='admin'";
   $queryRun=mysqli_query($connection,$query);
    
   
    if(isset($_POST['btn-search'])){
          

                  if(!empty($_POST['search_box']))
                  {

                    $selected=$_POST['search_box'];
                
                     $queryRun = mysqli_query($connection,"SELECT * FROM product WHERE p_name LIKE'%selected%' order by sale desc"); 

            
         }
       }


   $checkProducts=mysqli_num_rows($queryRun)>0;

   if($checkProducts)
   {
    while($row = mysqli_fetch_assoc($queryRun))
    {
       /* $id=$row['p_id'];
        $_SESSION['product_id']=$id;*/
        $locations='store_img/';


       ?>
             <!-- <a href="display_product.php?digital=MobileS">-->
    
                 <div class="sub-digital-container">
                     <div class="image">

                   <a href="store_product.php?store_name=<?php echo $row["store_name"]?>">
                          <img src=<?php echo $locations.$row["image"];?>>            
                  </a>

                    </div>
                   <div class="info">
                     <p class="info-name"><?php echo $row['store_name'];?></p>
                    <!---<p><?php// echo $id ?></p>-->
                  </div>

                      </div>
        


       <?php


       
     }
  }


   else{

      

   }


 ?>
</div>
<
<?php include("./footer.php");?>

</body>
</html>
      



