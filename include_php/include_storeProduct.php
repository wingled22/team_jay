

<?php

    require("dbconnection.php");
    
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

</head>
<style>
	.container{
		display: flex;
		justify-content: space-around;
		align-items: center;
		flex-wrap: wrap;
	    width: 100%;
	}
	.box{
		padding: 10px;
		box-shadow: 0px 0px 16px rgba(17, 17, 26, 0.1);
	}
	.row{
		padding: 10px 0px 20px 0;
	}
	p{
		font-size: 13px;
		text-transform: capitalize;
	}
	.row-2{
		display: flex;
		align-items: ;
		justify-content: space-between;
	}
	.row_image{
		width: 200px;
		height: 200px;	
	}
	.row_image img{
		width: 100%;
		height: 100%;
	}
	.rate{
		padding: 5px 0 10px 0;
		position: relative;
		left: -6px;
		display: flex;
		align-items: center;
		justify-content: space-between;

	}
	.percentages{
		position: relative;
		left: -32px;
		
	}
	.btns{
		display: flex;
		align-items: center;
		justify-content: space-around;
	}
	.btn{
		padding: 7px 70px;
		font-size: 12px;
	}
	a{
		text-decoration: none;
		color: #ffff;
	}
	.wish{
		background-color: red;
		
	}
	/*color sa CART*/
	.carts{
		background-color: green;
		
	}
	/*color sa BUY*/
	.buy{
		padding: 7px 90px;
		font-size: 12px;
		background-color: #8B16E9;
		
	}
	/*style="text-align: center;"-- MAO NI PARA MA TUNGA SA STORE NAME*/
	/*ibutang ang style sa sud sa h1*/
</style>

<body>


<h1><?php echo $_GET['store_name'];?></h1>
<div class="container">
	 <?php
	       $store_name=$_GET['store_name'];
           $fetch_query="SELECT * FROM product where store_name='$store_name' order by sale desc";
           $fetch_query_Run=mysqli_query($connection,$fetch_query);
           $image_storage="image_storage/";
        ?>

    <?php
       if(mysqli_num_rows($fetch_query_Run)>0){
           
          while ($row=mysqli_fetch_assoc($fetch_query_Run)) 
           { 
              
        $id=$row['p_id'];
        $_SESSION['product_id']=$id;
      /* work here*/

      $result="SELECT(
SELECT count(*) from rating where rating=1 and p_id='$id') AS count_1,(

SELECT count(*) from rating where rating=2 and p_id='$id') AS count_2,(
SELECT count(*) from rating where rating=3 and p_id='$id') As count_3,(
SELECT count(*) from rating where rating=4 and p_id='$id') As count_4,(
SELECT count(*) from rating where rating=5 and p_id='$id') AS count_5";


$Run=mysqli_query($connection,$result);
$data=mysqli_fetch_assoc($Run);

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


          ?>
          <div class="sub-container">
          	<div class="box">
          	   <div class="row_image">
          	           <a href="addCart.php?id=<?php echo $row['p_id'];?>">
          	 	      <img src="store_img/<?php echo $row['image'];?>">
          	 	  </a>
          	   </div>
          	   <div class="row">
          	 	  <p><?php echo $row["p_name"]; ?></p>
          	    </div>
          	    <div class="row-2">
          	    	<div class="price">
          	    		<h3><?php echo $row['price'];?></h3>
          	    	</div>
          	    	<div class="stock">
          	    		<p><?php echo "stock: ", $row['stock'];?></p>
          	    	</div>
          	    </div>
          	    <div class="row-3">
          	     <div style="padding: 5px 0px" class="rate">
                           <div class="rateyo" id= "rating"
                                 data-rateyo-rating="<?php echo round($average); ?>"
                               data-rateyo-num-stars="5"
                               data-rateyo-score="3">

                           </div>
                        <div class="percentages">
                             <p style="font-size: 9px"><?php echo round($average);?><span style="font-size: 9px">/5</span></p>
                        </div>
                        <div class="sold">
                        	<p style="font-size: 9px"><?php echo "Total Sold: ", $row['sale'];?></p>
                        </div>
                      </div>
                    <div class="btns">
                    	<!--<div class="btn wish">
                              <a href="wishlist_process.php?id=<?php echo $row['p_id']?> &user=<?php echo $username;?>">Wishlist</a>
                    	</div>-->
                    	<div class="btn carts">
                    		<a href="addCart.php?id=<?php echo $row['p_id'];?>">
                    			Add Cart
                    		</a>
                    	</div>
                    </div>
                 
          	    </div>
          	    <div class="btn buy">
                    		<a href="buy.php?id=<?php echo $row['p_id'];?>">
                    			Buy
                    		</a>
                    	</div>
          	 </div>
          </div>

    
<?php

        }
      }
  else{

          echo "no record found";
      }

?>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
<script>
  
    $(function () {
        $(".rateyo").rateYo({
            fullStar:true,
            readOnly: true,
            starWidth:"13px"

        }).on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('rating :'+ rating);
            $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
        });
    });
</script>

</body>
</html>
