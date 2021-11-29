<?php 

require("./dbconnection.php");
session_start();

$username=$_SESSION['username'];


$result = mysqli_query($connection,"SELECT * FROM login where username='$username'");
$row= mysqli_fetch_array($result);


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

$result = mysqli_query($connection,"SELECT * FROM login WHERE username='$client_name'");
$row= mysqli_fetch_array($result);

$fullname= $row['firstname']." ".$row['lastname'];

/*$_SESSION['id']=$_POST['id'];*/


 ?>
<!--end of php file------------------------------------------------------------------>

<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" href="css/all.min.css">
   <link rel="stylesheet" type="text/css" href="client_dashboard.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Tap and Go - Food Corners</title>
  <style>

     .field{
        margin-top: 20px;
       
     }
 
    .fields{
      
      display: flex;
      flex-direction: column;
      width: 400px;
      margin-left: 30px;
      margin-top: 20px;

    }
   .field .fields input{
      padding:10px; 
       border: none;
       border: 1px solid #1111;

   }
   .btn_save{
     margin:0px 50px 0 0;
     
   }
   .btn_save input{
     margin-top: 30px;
     margin-left:30px;
     padding: 10px 50px;
     color: #ffff;
     background: #ff1057;
     border: none;
   }
  </style>
  
</head>
<body>
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
      <input type="text" placeholder="Search in Tap and Go - Food Corners">
         <button name="btn-search"> <i style="color: #ffff" class="fas fa-search"></i></button>

                 <!-- <button type="submit" name="btn-update" <i" class="fas fa-search"></button>-->
                       

         </div>
   </div>
   <div class="shop-icon">
        <a href="cart.php">
           <i class="fas fa-shopping-cart"></i>
      </a>
   </div>

   <ul class="nav-links">
    
            <li><a href="client.php">HOME</a></li>
            <li><a href="history.php">COMPLETED</a></li>
              <li><a href="logout.php">LOGOUT</a></li>
            <li><a href="./client_dashboard.php"><?php echo $_SESSION['username']."'S ACCOUNT";?></a></li>
            <div class="imgbox">
               <li><img src="default_pic/<?php echo $row['image'];?>"></li>
            </div>
            
                
   </ul>
<!----</div>---------------------->
</header>

<section class="parent-container">
  
<div class="row_1-container">
  <div class="hello">
     <p><?php echo "Hello ".$_SESSION['username']."!";?></p>
  </div>
  <div class="verified">
     <p>Verified Account</p>
  </div>
  <div class="navigation-links">
    <li><a href="client_dashboard.php">My Profile</a></li>
    
  </div>
  
  <!--<p><?php //echo $_SESSION['username']; ?></p>----->
</div>

<div class="row_2-container">
  <div class="titles">
     <h2>Change Password</h2>
  </div>
<form class="field_container" method="post">
  <div class="field">
    <div class="fields">
      <label>Username</label>
      <input type="text" name="username" placeholder="Please enter your username" value="<?php echo $row['username'];?>">
    </div>
    <div class="fields">
      <label>Current Password</label>
      <input type="text" name="current_password" placeholder="Please enter your current password">
   </div>
   <div class="fields">
      <label>New Password</label>
      <input type="text" name="new_password" placeholder="Please enter your new password">
   </div>
   <div class="fields">
     <label>Retype Password</label>
     <input type="text" name="retype_password" placeholder="Please retype your password">
   </div>
     <div class="btn_save">
    <input type="submit" name="btn_save" value="SAVE CHANGES">
  </div>
  </div>

 
</div>
</form>

</section>

</body>


     <footer>
     <div class="footer-container">
       <div class="footer-box">
          <div class="header">
              <p>Customer Care<p>
          </div>
        <div class="member">  
         <p>Help Center</p>
         <p>How to Buy</p>
         <p>Shipping and Delivery</p>
         <p>International Product Policy</p>
         <p>How to return</p>
         <p>Question</p>
         <p>Contact Us</p>
       </div>

       </div>
       <div class="footer-box">
         <div class="header">
           <p>Tap and Go - Food Corners<p>
          </div>
          <div class="member">
             <p>Help Center</p>
             <p>How to Buy</p>
             <p>Shipping and Delivery</p>
             <p>International Product Policy</p>
             <p>How to return</p>
             <p>Question</p>
             <p>Contact Us</p>
          </div>
         </div>
         <div class="footer-box">
         <div class="header">
           <div class="sub">
             <img style="width: 120px; height: 80px; padding-right: 1rem;" src="../team_jay/images/Tap.png">
            </div>
           <div class="sub2">
             <h2>Tap what you want!</h2>
             <p>Go wild and eat!</p>
           </div>
          </div>
         </div>

       </div>
     </div>
     <div class="reserved">
       <p>@Tap and Go - Food Corners 2021<p>
     </div>
   </footer>




</html>