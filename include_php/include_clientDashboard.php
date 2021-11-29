
<section class="parent-container">
  
<div class="row_1-container">
  <div class="hello">
     <p><?php echo "Hello ".$_SESSION['username']."!";?></p>
  </div>
  <div class="verified">
     <p>Verified Account</p>
  </div>
  <div class="navigation-links">
    <li><a href="#">My Profile</a></li>
    <li><a href="./history.php">Orders Completed</a></li>
   <!-- <li><a href="./wishlist.php">My Wishlist</a></li>---->
  </div>
  
  <!--<p><?php //echo $_SESSION['username']; ?></p>----->
</div>

<div class="row_2-container">
  <div class="titles">
     <h2>My Profile</h2>
  </div>
  
 <div class="row-container">

  <div class="info-1">
    
    <div class="box">
      <label>Fullname</label>
      <p><?php echo $fullname;?></p>
   </div>
   <div class="box">
      <label>Adress</label>
      <p><?php echo $row["adress"];?></p>
   </div>
   <div class="box">
     <label>Mobile Number</label>
     <p><?php echo $row["mobile"];?></p>
   </div>

   <div class="box">
     <label>Birthday</label>
     <p><?php echo $row['DateofBirth'];?></p>
  </div>
  
  <div class="box"></div>
  <input type="hidden" name="id" value="<?php echo $row['id'];?>">
 </div>

<div class="button">
   <div class="btn_edit">
      <a href="./edit_profile.php?id=<?php echo $row['id'] ?>">Edit Profile</a>
      <!--
        <a href="addCart.php?id=<?php //echo $id?>">-->
     <!-- <a href="page2.php?varname=<?php// echo $var_value ?>">Page2</a==-->
   </div>
   <div class="btn_edit">
      <a href="./ChangePassword.php">Change Password</a>
   </div>

   
</div>
</div>




</section>

</body>

