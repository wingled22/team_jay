 <style>
  .info-1 .box{
     display: flex;
     flex-direction: column;
  }
  .info-1 .box input{
    position: relative;
    top: 5px;
    padding: 10px;
    border:1px solid #1111;

  }
  .info-1 .box select{
    padding: 10px;
    border: 1px solid #1111;
  }

  </style>


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
     <h2>Edit Profile</h2>
         <!----<p><?php //echo $_GET['id'];?></p>---------------------->
     <!----<p><?php //echo $_SESSION['id'];?></p>-->

  </div>
<form class="edit_profile" method="post" enctype="multipart/form-data">
 <div class="row-container">

 <div class="img-container">
  <div class="image_box">
         <img src="default_pic/<?php echo $row['image'];?>">
   </div>
   <div class="btn_file">
     <input class="image" type="file" name="img_file">
   </div>
 </div>

  <div class="info-1">
    
    <div class="box">
      <label>Last Name</label>
      <input type="text" name="lastname" placeholder="Last Name" value="<?php echo $row["lastname"];?>">
     <!-- <p><?php echo $fullname;?></p>----------->
   </div>
    <div class="box">
     <label>First Name</label>
     <input type="text" name="firstname" placeholder="FirstName" value="<?php echo $row["firstname"];?>">
    <!--- <p><?php //echo $row["mobile"];?></p>--->
   </div>

   <div class="box">
      <label>Adress</label>
       <input type="text" name="adress" placeholder="Adress" value="<?php echo $row["adress"];?>">
     <!-- <p><?php/// echo $row["adress"];?></p>---------->
   </div>
   <div class="box">
      <label>Mobile Number</label>
      <input type="text" name="mobile" placeholder="Mobile Number" value="<?php echo $row["mobile"];?>">
   </div>
  

   <div class="box">
     <label>Birthday</label>
     <input type="date" name="date" value="<?php echo $row["DateofBirth"];?>">
     <!-----<p><?php// echo $row['DateofBirth'];?></p>--------------------------->
  </div>
  
</select>

    <!---<p><?php //echo $row['gender'];?></p>-------------------------->
  </div>

  <div class="box">
     <input type="hidden" name="id" value="<?php echo $row['id'];?>">
  </div>
 </div>



<div class="btns">
   <div class="btn">
      <!--<a href="./edit_profile.php?id=<?php// echo $row['id'] ?>">Save Changes</a>-->
      <input type="submit" name="btn_save" value="Save Chages">
      <!--
        <a href="addCart.php?id=<?php //echo $id?>">-->
     <!-- <a href="page2.php?varname=<?php// echo $var_value ?>">Page2</a==-->
   </div>
</div>
</div>
</form>

</section>

</body>
