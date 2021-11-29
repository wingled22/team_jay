

<style>
  .rate{
    display: flex;
    align-items: center;
    justify-content: space-between;
  }
  .percentage{
     position: relative;
     left: -65px;
  }
  .product-rating-container{
    position: relative;
    left: 40px;
    padding: 5px 0;
  }
  .display-container{
    box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0.05);
    margin: 10px 10px 0px;
  }
  .sub-container{
     display: flex;
     align-items: center;
     
     padding: 15px 20px;
  }
  .comment{
    position: relative;
    left: 80px;
    padding: 0px 0px 10px;
  }
</style>
<main>


<body>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">


  <form method="POST" action="#">
 <!--<p><?php //echo "admin: " .$_SESSION['username'];?></p>  -->

<!--<h2><php echo $_GET['id'];?></h2>---->


<?php

if(isset($_GET['id'])!=""){

  $_SESSION['link'] = $_GET['id'];
  $id=$_SESSION['link'];
  //echo "<script>document.writeln(someVarname);</script>";
}

else{
  echo "no";
}

//average rating query//

$result="SELECT(
SELECT count(*) from rating where rating=1 and p_id='$id') AS count_1,(

SELECT count(*) from rating where rating=2 and p_id='$id') AS count_2,(
SELECT count(*) from rating where rating=3 and p_id='$id') As count_3,(
SELECT count(*) from rating where rating=4 and p_id='$id') As count_4,(
SELECT count(*) from rating where rating=5 and p_id='$id') AS count_5";


$Run=mysqli_query($connection,$result);
$data=mysqli_fetch_assoc($Run);
/*echo $data['count_1'];
echo $data['count_2'];
echo $data['count_3'];
echo $data['count_4'];
echo $data['count_5'];*/

$rating_1=$data['count_1'];
$rating_2=$data['count_2'];
$rating_3=$data['count_3'];
$rating_4=$data['count_4'];
$rating_5=$data['count_5'];

$one=1   * $rating_1;
$two=2   * $rating_2;
$three=3 * $rating_3;
$four=4  * $rating_4;
$five=5  * $rating_5;

$numberOfStar_result=$rating_1+$rating_2+$rating_3+$rating_4+$rating_5;
$rating_sum_result=$one+$two+$three+$four+$five;

/*echo $rating_sum_result;
echo $numberOfStar_result;
*/
if($rating_sum_result!=0 && $numberOfStar_result!=0)
{
   $average=$rating_sum_result/$numberOfStar_result;
}
else
{
    $average=0;
}



/*
echo $one;
echo $two;
echo $three;
echo $four;
echo $five;
*/


//product query//
$query="select * from product where p_id='$id'";
$queryRun=mysqli_query($connection,$query);
$checkProducts=mysqli_num_rows($queryRun)>0;

if($checkProducts)
{
    $row = mysqli_fetch_assoc($queryRun);

//$quantity=9;
   $stock=$row['stock'];
    $id=$row['p_id'];



?>

            <div class="cart-container">
                  <form class="dale" method="post">
                    <?php

                          $_SESSION['product_name']=$row['p_name'];
                          $_SESSION['price']=$row['price'];
                          $_SESSION['image']=$row['image'];
                          $_SESSION['client']=$_SESSION['username'];
                          $_SESSION['stocks']=$stock;
                          $_SESSION['id']=$id;

                         

                    ?>
             <div class="subCart-container">

                     <div class="image">
                           <img src="store_img/<?php echo $row['image'];?>">
                    </div>
                     <div class="info">
                        <p class="info-name"><?php echo $row['p_name'];?></p>
                   <!-- <p><php echo $id ?></p>--->
                     </div>
                 
                     <div style="display: flex;justify-content: space-between;align-items: center;" class="price-container">
                           <div style="padding: 10px 0px;" class="price">
                             <h4><span class="p-sign">&#8369</span><?php echo $row['price'];?></h4>
                            </div>
                      <div style="margin-right: 10px; font-size: 12px;" class="stock">
                               <label>Stock: </label>
                                <label><?php echo $stock ?></label>
                             <input type="hidden" name="stock2" value="<?php echo $stock ;?>">
                                <br>
                          </div>
                     </div>

 <!---working here---->
 
                     <div class="rating-container">   
                        <div style="padding: 5px 0px" class="rate">
                           <div class="rateyo" id= "rating"
                               data-rateyo-rating="<?php echo round($average); ?>"
                               data-rateyo-num-stars="5"
                               data-rateyo-score="3">

                           </div>
                        <div class="percentage">
                            <p style="font-size: 12px"><?php echo round($average);?><span style="font-size: 12px">/5</span></p>
                        </div>
                        <div class="sold">
                            <p style="font-size: 12px"><?php echo "Total sold: ", $row['sale'];?></p>

                      </div>
                      
                     </div>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
<script>

  $(document).scroll(function() {
  
  var y = $(this).scrollTop();
  if (y <1) {
    $('.rate').fadeIn();
    $('.percentage').fadeIn();

  } else if(y>410) {
    $('.rate').fadeOut();
     $('.percentage').fadeOut();
  }
});

    $(function () {
        $(".rateyo").rateYo({
            fullStar:true,
            readOnly: true,
            starWidth:"16px"

        }).on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('rating :'+ rating);
            $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
        });
    });
</script>



                    <!----textbox-------------------------->
                 <style>
                   .text input[type=text]
                   {
                     width: 100%;
                   }
                 </style>
                   <div class="text">  
                  <input type="text" name="quantity" placeholder="quantity">
                   </div>

                    <!---->
                  <div class="btns-con">
                    <div class="btn">  
                       <input class="cart" type="submit" name="buy" value="BUY">
                   </div>
        </form>
       
     </div>

  <?php
}
else{

}
?>
    
</body>

</main>


<!-----------------working here------------------------------->



<div style="padding: 2px 10px" class="rating_title">
   <h3>Product Ratings</h3>    
</div>

 <div class="product-rating-container">  
    <div class="rating_percentage">
      <div>
      <p style="font-size: 20px;color: #ff6600"><?php echo round($average);?><span style="font-size: 20px;color:#ff6600"> out of 5</span></p>
      </div>
   
         <div class="rateyo" id= "rating"
            data-rateyo-rating="<?php echo round($average); ?>"
            data-rateyo-num-stars="5"
            data-rateyo-score="3">

        </div>
        
    </div>
    </div>
 <?php
 
   $query="select * from rating where p_id='$id'";
   $queryRun=mysqli_query($connection,$query);


   $checkProducts=mysqli_num_rows($queryRun)>0;

   if($checkProducts)
   {
    while($row = mysqli_fetch_assoc($queryRun))
    {
        $id=$row['p_id'];
        $_SESSION['product_id']=$id;


    ?>

   <div class="display-container">
    <div class="sub-container">
     <div class="display">
       <div class="imgbox">
         <img src="default_pic/<?php echo $row['profile_img'];?>">
       </div>
     </div>
     <div class="row-2">
        <div style="margin-left: 10px" class="profile_name">
           <p><?php echo $row['client_name'];?></p>
       </div>   
       <div>
           <div class="ratings">
           <div class="rateyo" id= "rating"
            data-rateyo-rating="<?php echo $row['rating']; ?>"
            data-rateyo-num-stars="5"
            data-rateyo-score="3">
          </div>

        </div>
       </div>
     </div>   
</div>
<div class="comment">
       <p><?php echo $row['comment'];?></p>
    </div>

</div>
    
 
       <?php


       
     }
  }


   else{

      

   }


 ?>
