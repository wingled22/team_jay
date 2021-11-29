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





?>

<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Tap and Go - Food Corners</title>
  <style>
  	.imgbox{
       width: 50px;
       height: 50px;

    }
    .imgbox img{
      width: 100%;
      height: 100%;
      border-radius: 50px;
    }
  </style>
  
</head>
<body>

   <nav class="nav-bar">
  <!---- <div class="nav-bar">------------>
   <ul class="nav-links">
    
            <li><a href="#">CART</a></li>
              <li><a href="logout.php">LOGOUT</a></li>
            <li><a href="./client_dashboard.php"><?php echo $name."'S ACCOUNT";?></a></li>
            <div class="imgbox">
             <!--  <li><img src="images/bra.jpg"></li>------------------------------------->
            <li><img src="default_pic/<?php echo $row['image'];?>"></li>
      
            </div>
            
                
   </ul>
  <!---- </div>----------------->
   </nav>
   <header class="search-navs">
  <!---- <div class="search-navs">--------------------------------------------->
    <div class="logo-container">
    <div class="logo">
      <h2>D</h2>
    </div>
    <div class="logo_name">
      <h2>Tap and GO - Food Corners</h2>
    </div>
   </div>
    <div class="search_textbox">
      <input type="text" placeholder="Search in Tap and Go - Food Corners">
         <div class="btn-icon">
           <form autocomplete="off">
            <a href="./search.php"><i class="fas fa-search"></i></a>
         </div>
   </div>
   <div class="shop-icon">
        <a href="cart.php">
           <i class="fas fa-shopping-cart"></i>
      </a>
   </div>
<!----</div>---------------------->
</header>

</body>

<footer>
	
</footer>

</html>