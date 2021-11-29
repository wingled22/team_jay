 <?php
   
   require("./dbconnection.php");


   
   if(isset($_POST['btn'])){



    $rating=$_POST['rating'];
    $comment=$_POST['txt_comment'];
    $p_image=$_POST['img'];
    $client_name=$_POST['c_name'];
    $product_name=$_POST['p_name'];
    $p_id=$_POST['p_id'];
    
    

    $Insertquery="INSERT into rating values(null,'$rating','$comment','$p_image','$client_name','$product_name','$p_id')";

    $sqlCreate=mysqli_query($connection,$Insertquery);

    if($sqlCreate)
    {
         echo "<script>if(confirm('Successfully Updated !')){document.location.href='cart.php'};</script>";
            exit();
    }


}

 ?>

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

<style>

  .img{
      width: 180px;
      height: 180px;
      box-shadow: 0 0 8px 0 #E8E8E8;
    }
    .img img{
      width: 100%;
      height: 100%;
      
    }
    .con{
      display: flex;
      justify-content: space-around;
    }
    .rating-average input[type=text]{
      border: none;
      background-color: transparent;
      outline: none;
      border-style: 1px solid #1111;
      width: 50px;
      padding: 1px;
      text-align:center;
    }
      textarea{
       max-width:200px; 
       max-height:115px;
       width: 300px;
       min-width:300px;
       
       height: 115px;
    }
      label{
       font-size: 13px;
    }
    .text_area{
       display: flex;
       flex-direction: column;
    }
    .rate{
      display: flex;
      align-items: center;
      flex-direction: column;
    }
    .p_name_container{
       padding: 0px 10px;
    }
    .p_name_container p{
       font-size: 12px;
    }
    
</style>


<form method="POST" action="#">
<!-- Delete -->
    <div class="modal fade" id="del<?php echo $row['c_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Rate this Product</h4></center>
                </div>
    <div class="modal-body">
				<?php
					$del=mysqli_query($connection,"select * from cart where c_id='".$row['c_id']."'");
					$drow=mysqli_fetch_array($del);
          $client=$row['client'];
				?>
        <?php
          $del=mysqli_query($connection,"select * from login where username='".$client."'");
          $drow=mysqli_fetch_array($del);
          $image=$drow['image'];
          /*$name=$drow[]*/
        ?>
				<div class="container-fluid">
					<!--<h5><center>Are you sure to delete from the list? This method cannot be undone.</center></h5> -->
                    <input type="hidden" name="c_name" value="<?php  echo $_SESSION['username']; ?>">
                    <input type="hidden" name="p_name" value="<?php echo $row['uname'];?>">
                   <!-- <input type="hidden" name="img" value="<?php //echo $row['image'];?>">-->
                    <input type="hidden" name="p_id" value="<?php echo $row['product_id'];?>">
                    <input type="hidden" name="img" value="<?php echo $drow['image'];?>">
                <div class="con">

                    <div class="img">
                       <div>
                           <img src="store_img/<?php echo $row['image'];?>">
                            </div>
                                <div class="p_name_container">
                               <p class="p_name"><?php echo $row['uname'];?></p>
                          </div>
                    </div>

                    <div class="rate">
                        <div class="rateyo" id= "rating"
                              data-rateyo-rating="0"
                              data-rateyo-num-stars="5"
                              data-rateyo-score="3">

                        </div>
                         <div class="rating-average">
                             <label>Rating:</label>
                          <input type="text" name="rating" readonly>
                        </div>

                         <div class="text_area">
                              <div>
                                 <label>Comment:</label>
                               </div>
                               <div>
                                  <textarea name="txt_comment"></textarea>
                               </div>
                        </div>
                    <div>  
                      </div>
              </div>

        </div>
                   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

<script>
    $(function () {
        $(".rateyo").rateYo({
            fullStar:true
        }).on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('rating :'+ rating);
            $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
        });
    });
</script>

             </div> 
				</div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>

                   <!-- <button type="submit" name="btn-submit" class="btn btn-default" data-dismiss="modal">Submit</button>-->
                  <!--<a href="insert.php">Submit</a>---->
                  <input style="background-color: transparent;padding: 6px 10px;border: 1px solid #1111" type="submit" name="btn" value="submit">
                

                <!-- <a href='insert.php?c_name=<?php //echo $_SESSION['username'];?>&
                  p_name=<?php //echo $row['uname'];?>&
                  p_image=<?php //echo $row['image'];?>&
                  rating=rating'>'>link to page2</a>

                -->
                  

                 <!-- <a href='page2.php?id=2489&user=tom'>link to page2</a>-->
                </div>
				
            </div>
        </div>
    </div>
</form>
<!-- /.modal -->



