
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<style>

  .image-box{
    width: 100%;
    height: 100%;
  }
  .image-box img{
     width: 100px;
     height: 100px;
  }
  td{
    width: 200px;
    text-align: center;
  }
  th{
    text-align: center;
  }


</style>

<body>
  <form method="POST" action="#">
<div class="container-fluid">
  <div style="height:10px;"></div>
  <div class="well" style="margin:auto; padding:auto; width:100%;">
  <!--<span style="font-size:25px; color:blue"><center><strong>PHP/MySQLi CRUD Operation using Bootstrap</strong></center></span> -->
    <span class="pull-left">
      <h2>Purchase History</h2>
    </span>
    <div style="height:10px;"></div>
    <table class="table table-striped table-bordered table-hover">
      <thead>
        <th>Image</th>
        <th>Product Name</th>
        <th>Price</th>
        <th>Action</th>
      </thead>
      <tbody>
      <?php
        include('dbconnection.php');
        $client_name=$_SESSION['username'];
        
        $query=mysqli_query($connection,"select * from `buy` where client='$client_name'");

        $sum=0;
        while($row=mysqli_fetch_array($query)){

        $result=$row['price']*$row['quantity'];
        $product_id=$row['buy'];
        $stock=$row['stock'];

        $sum+=$result;
          ?>
          <tr>
            <td>
              <div class="image-box">
                  <img src="store_img/<?php echo $row['image'];?>">
                  <input type="hidden" name="product_id" value="<?php echo $product_id;?>">
                  <input type="hidden" name="stock" value="<?php echo $stock;?>">
                  <input type="hidden" name="stocks" value="<?php echo $row['product_id'];?>">
                  <input type="hidden" name="stock_id" value="<?php echo $row['product_id'];?>">
                  <input type="hidden" name="wish_id" value="<?php echo $row['product_id'];?>">
                  <input type="hidden" name="stock2" value="<?php echo $row['stock2'];?>">
                     
              </div>
            </td>
            <td><?php echo ucwords($row['uname']); ?></td>
           <?php

                     $_SESSION['stock']=$row['stock'];
                     $_SESSION['id']=$row['product_id'];

                  ?>
            <td><?php echo $row['price'];?></td>
           
            <td>
              <!--<a href="#edit<?php// echo $row['userid']; ?>" data-toggle="modal" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a> || 
              <a href="#del<?php //echo $row['userid']; ?>" data-toggle="modal" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
              <?php //include('button.php'); ?>-->
                <button type="submit" name="btn-update"></button>
               <!--<a class="edit" href="delete__process.php?id=<?php echo $row["buy"];?>">Delete</a>-->
                <?php
                          $_SESSION['quantity']=$row["quantity"];
                          $_SESSION['var_result']=$_SESSION['stock'];
                          $_SESSION['var_id']= $_SESSION['id']
                        
                ?>

              <!-- <a class="delete" href="#del<?php echo $row['buy']; ?>"data-toggle="modal">Rate</a>-->

                   <a class="delete" href="#del<?php echo $row['buy']; ?>"data-toggle="modal">Rate</a>
            
            
                <?php include('buttons.php'); ?>
            </td>
          </tr>
          <?php
        }
      
      ?>
       </tbody>
     </table>
    </div>
 <!-- <?php// include('add_modal.php'); ?>--->
  </div>
</form>




</div>
 <style>
   .total{
      
      display: flex;
      justify-content: flex-end;
      padding: 20px;
      margin-top: 10px;

   }
   .total .label h3{
     position: relative;
     right: 100px;
   }

 </style>
</body>
</html>
