

 <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');
        body{
            font-family: 'Poppins', sans-serif;
        }
       /* form{
            display: flex;
            justify-content:space-between;
            align-items: center;
            padding: 10px;
            
        }*/
        .row{
            margin-left: 30px;
            
        }
        .row input[type=text]{
            position: relative;
            border: none;
            padding: 3px;
            width: 150px;
            
        }
        .row .login{
            position: relative;
            top: 9px;
            
        }
        .row label{
            color: #ffff;
        }
        td {
           
           text-align: center;
           
          
        }
      
       .column{
         
         width: 300px;
       }
        .column i{
            font-size: 24px;
        }
        
        th{
            padding: 5px;
            font-size: 12px;
        }
        .delete{
            background-color: red;
            border: none;
            padding: 5px;
            color: #ffff;
        }
        .edit{
            background-color: blue; border: none; padding: 5px 15px;color: #ffff;
        }
        .row .login{
            background-color:#ffff;padding: 10px;border-radius: 10px;margin-right: 100px;
        }
        .row .login:hover{
            background-color: #111; color: #ffff;
        }
        img{
            width: 150px;height: 150px; object-fit: cover;
            
        }
        .btn{
            width: 100px;
        }
        .img{
            width: 130px;
        }
       
        .btn a{
            text-decoration: none;color: #ffff; padding: 10px;border-radius: 10px;display: inline-block;width: 50px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0
        }
        .btn a:hover{
            color: #111;
        }
        
        main{
            position: relative;
            top: 30px;
        }
        .header-container {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            background-color: #D0D0D0;
            height: 40px;
        }
        .header-1{
            margin-right: 70px;
        }
        .header{
            margin-right: 40px;
            
        }
        .header a{
            text-decoration: none;
            color: #ffff;
            
        }
        select{
            width: 100px;
            border: none;
            padding: 3px;
        }
        input[type=submit]{
            position: relative;
            top: 10px;
        }
        .textboxes{
            display: flex;
            align-items: center;
            
            
        }
        .textboxes input[type=text] {
            padding: 5px;
            font-size: 16px;
            text-align: center;
            border: .5px solid #1111;
            width: 50px;
            align-items: center;
            
        }
        .textboxes input[type=submit]{
            position: relative;
            top:-1px;
            
        }
        .btn-delete i{
            color: #111;
        }
        .total{
            display: flex;
            justify-content: flex-end;
            padding: 10px 0;
            
        }
        .total h3{
            margin-right: 100px;
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
            <li><a href="./client_dashboard.php">My Profile</a></li>
            <li><a href="./MyOrders.php">My Orders</a></li>
            <li><a href="#">My Wishlist</a></li>
        </div>
        
        <!--<p><?php //echo $_SESSION['username']; ?></p>----->
    </div>
    
    <div class="row_2-container">
        <div class="titles">
            <h2>My Wishlist</h2>
        </div>
    
        <form method="POST" action="#">
        
            <div class="container-fluid">
            
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        
                            <?php
                                $query = "SELECT * FROM wishlist where client='$username'";
                                $query_run = mysqli_query($connection, $query);
                                
                                $location='img/';
                        
                            ?>
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name </th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                  
                                        while($row = mysqli_fetch_assoc($query_run))
                                        {
                                            ?>
                                            <tr>
                                                <td class="column"><img src=<?php echo $location.$row["image"];?>> </td>
                                                <td class="column"><?php  echo $row['product_name']; ?></td>
                                                <td class="column">
                                                    <?php
                                                        $num_format = number_format($row['price'], 2,'.',',');
                                                        echo "&#8369; ",$num_format;
                                                    ?>
                                                </td>
                                            <td class="column">
                                                   <label><?php echo $row['stock'];?></label>

                                            </td>
                                            
                                            
                              
                                     <div class="textboxes">
                                     
                                          <input type="hidden" name="product_id" value="<?php echo $product_id;?>">
                                              <input type="hidden" name="stock" value="<?php echo $stock;?>">
                                                        <input type="hidden" name="stock" value="<?php echo $row['product_id'];?>">
                                                        <input type="hidden" name="stock2" value="<?php echo $row['stock2'];?>">
                                                
                                                    </div>
                            

                                                <td>
                                                    <div class="column">
                                                        <div class="btn-delete">
                                                            <a href="wishlist_delete.php?p_id=<?php echo $row["w_id"]; ?>">
                                                                <i class="far fa-trash-alt"></i>
                                                            </a>
                                                        </div>
                                                        </a>
                                                    </div>

                                                </td>
                                        
                                            </tr>
                                        
                                            <?php
                                        }
                                    }
                                
                                    else {
                                        echo "No Record Found";
                                    }
                                ?>
                            
                                </tbody>
                            </table>
                    
                        </div>
                    </div>
                </div>
        
            </div>

    </div>
    </form>
    
    </div>




</section>

</body>

