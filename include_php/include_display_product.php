

<!--categories------------------------------------------------------------>
   <div class="categories-container">
      <div class="category">
         <ul>
            
         </ul>
      </div>
     
      <div class="image">
      <img class="img" src="images/lazada.jpg">
      </div>   
   </div>
   <!--load e-store------------------------------------------------------->
   <div class="promo">
      <div class="load">
         <img src="images/load-store.png" alt="dale" width="30" height="30">
          <h3>Load & eStore</h3>    
      </div>
      <div class="load">
         <img src="images/load-store.png" alt="dale" width="30" height="30">
        <h3>Vouchers</h3>
      </div>
   </div>

 

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
    padding: 5px;
    
    
  }
  .sub-digital-container:hover{
     box-shadow: 0 0 20px 0 #E8E8E8;
  }
  .sub-digital-container .image{
    
    width:180px;
    height: 150px;

  }
  
  .sub-digital-container .info {
    width: 170px;
    height: 65px;
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
  /*buttons style*/
  .price-container{
  position: relative;
  top: -10px;
  }
                                     
 .addCart{
                        
  display: flex;
  justify-content: space-around;
  text-decoration: none;
  
 }
 .addCart a{
   text-decoration: none;
   background-color: #ff1057;
   color: #ffff;
   border-radius: 50px;
   padding: 4px 14px;
   font-size: 10px;
 }
  .addCart a:hover{
  background-color: #111;
  color: #ffff;
  }
  .addCart input{
    border: none;
    border-radius: 50px;
    font-size: 10px;
    background-color: #ff944d;
    padding: 4px 2px;
    color: #ffff;
  }
  .addCart input:hover{
    background-color: #111;
    color: #ffff;

  }
          
 </style>
 <div class="title">

<h2><?php echo $_GET['digital'];?></h2>
</div>
   <div class="digital-container">



 <?php
 
  $digital =$_GET['digital'];
 

   require("./dbconnection.php");
   $query="select * from product where category='$digital'";
   $queryRun=mysqli_query($connection,$query);

   $checkProducts=mysqli_num_rows($queryRun)>0;

   if($checkProducts)
   {
 
    while($row = mysqli_fetch_assoc($queryRun))
    {
        $id=$row['p_id'];

        //$_SESSION['product_id']=$id;
        // $_SESSION['counter'][] = $row;

$_SESSION['counter'] = array();

$_SESSION['array']=$_SESSION['counter'];

       ?>
             <!-- <a href="display_product.php?digital=MobileS">-->
    
                 <div class="sub-digital-container">
                     <div class="image">

                <a href="addCart.php?id=<?php echo $id?>">
                      <!--<a href="addCart.php">=---->
                           <img src="img/<?php echo $row['image'];?>">
                           <?php

                       //echo $_SESSION['counter']="The variable is :".$id;
                    // $_SESSION['counter']=
                            //echo  $_SESSION['product_id'];
                         //  $_SESSION['counter'] = array();

                           ?>
                      </a>

                    </div>
                   <div class="info">
                     <p class="info-name"><?php echo $row['p_name'];?></p>
                   <!-- <p><?php //echo $id ?></p>-->
                  </div>
                 
                       <div class="price-container">
                         <div class="price">
                           <h4><span class="p-sign">&#8369</span><?php echo $row['price'];?></h4>
                        </div>
                      </div>
                     <div class="addCart">
                               
                            <a style="background-color: #0a0506" href="wishlist_process.php?id=<?php echo $id?> &user=<?php echo $username;?> ">Add Wishlist</a>
                           
                            <a href="addCart.php?id=<?php echo $id?>">Add to Cart</a>
                           
                          
                    </div>

                  </div>

       <?php


       
     }
  // var_dump($_SESSION);
  }
   else{

   }

 ?>

</div>
