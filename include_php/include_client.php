
<!--categories------------------------------------------------------------>



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
    padding: 0px 0 10px 0;
    box-shadow: 0px 0px 16px rgba(17, 17, 26, 0.1);
 		
 	}
 	.sub-digital-container:hover{
 		 box-shadow: 0 0 20px 0 #E8E8E8;
 	}
 	.sub-digital-container .image{
 		
 		width:180px;
 		height: 185px;

 	}
 	
 	.sub-digital-container .info {
    width: 170px;
    height: 30px;
    padding: 0px 5px;

 	}
 
 	.sub-digital-container .image img{
 		width: 100%;
 		height: 100%;
 		
 	} 

 	.titles{
 		margin-top: 50px;
 		margin-left: 95px;
 	}
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

 
    </body>