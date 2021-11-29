

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
   <nav class="nav-bar">
  <!---- <div class="nav-bar">------------>
   
  <!---- </div>----------------->
   </nav>
   <header style="z-index: 1000" class="search-navs">
  <!---- <div class="search-navs">--------------------------------------------->
    <div class="logo-container">
    
      <img style="width: 120px; height: 80px; padding-right: 1rem;" src="../team_jay/images/Tap.png">
    </div>
    </div>
    <div class="logo_name">
      <h2>Tap and Go - Food Corners</h2>
    </div>
   </div>
   <form method="post" action="#">
    <div class="search_textbox">
      <input type="text" name="search_box" placeholder="Search in Tap and Go - Food Corners">
         <div class="btn-icons">
       
 <button name="btn-search"> <i style="color: #ffff" class="fas fa-search"></i></button>
         </div>
   </div>
   </form>
   <div class="shop-icon">
        <a href="cart.php">
           <i class="fas fa-shopping-cart"></i>
      </a>
   </div>
<ul class="nav-links">
    <li><a href="./client.php">Home</a></li>
            <li><a href="./cart.php">CART</a></li>
              <li><a href="logout.php">LOGOUT</a></li>
            <li><a href="./client_dashboard.php"><?php echo $name."'S ACCOUNT";?></a></li>
            <div class="img-boxes">
             <!--  <li><img src="images/bra.jpg"></li>------------------------------------->
            <li><img style="width: 30px; height: 30px; " src="default_pic/<?php echo $row['image'];?>"></li>
      
            </div>           
   </ul>

  

<!----</div>---------------------->
</header>