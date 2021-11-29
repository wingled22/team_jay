
<?php

   require('./dbconnection.php');
   session_start();


$username=$_SESSION['username'];


$result = mysqli_query($connection,"SELECT * FROM login where username='$username'");
$row= mysqli_fetch_array($result);

if(isset($_POST['btn_changePassword'])){

$username=$_POST['username'];
$current=$_POST['current_password'];
$new=$_POST['new_password'];
$retype_password=$_POST['retype_password'];

$current_password=$row['password'];
$password=md5($current);


if($current_password != $password){
    echo "<script>alert('Current Password is Incorrect!!');window.location.href = './admin.php';</script>";
}

else if($new !=$retype_password){
   
      echo "<script>alert('Password Mismatch!');window.location.href = './admin.php';</script>";
}

else{

/* unfinished ***************************************/
$update_query="update login set username='$username',password=md5('$new') where id='".$row['id']."'";
$sqlCreate=mysqli_query($connection,$update_query);


    if($sqlCreate)
       { 

     
         echo "<script>alert('Password Change successfully');window.location.href = './admin.php';</script>";
          

       }

   }
 }




        $stores=$_SESSION['store'];
        $id=$_SESSION['id'];
        $query = "SELECT * FROM login where id='$id'";
        $query_run = mysqli_query($connection, $query);
        $row=mysqli_fetch_array($query_run);
    


if($_SESSION['status']=='invalid'|| empty($_SESSION['status']))
{
     $_SESSION['status']=='invalid';
     header("Location: login.php");
 }

if($_SESSION['status']=='client-valid')
  {
      header("Location: client.php");
  }

  if(isset($_POST['save']))
   {
      
      $product=$_POST['product_name'];
      $price=$_POST['price'];
      $category="null";
      $stock=$_POST['stock'];
      $id=['id'];//
      $store=$_POST['store_name'];
      $sale=0;
     //image code
      
      $locate='store_img/';
      $image=$_FILES['product_image']['tmp_name'];
      $name=$_FILES['product_image']['name'];
    

  
    $create_query= "INSERT into product values(null,'$product','$price','$category','$stock','$name','$sale','$store')";
    $sqlCreate=mysqli_query($connection,$create_query);//store the submitted data in database

   if($sqlCreate){ 
         move_uploaded_file($image, $locate.$name);
         echo '<script>alert("Successfully added")</script>';


   }
   else{
      echo "not added";
   }
 }


  
if(isset($_POST['btn_store'])){

  
    $store=$_POST['store_name'];
    $store_id=$_POST['id'];
    $old_image=$_POST['old_image'];
    $image=$_FILES['store_image']['name'];
    $name=$_FILES['store_image']['tmp_name'];
    $location='store_img/';
    
   if($_FILES['store_image']['name'] != "") 
// No file was selected for upload, your (re)action goes here
{
  $filename=$image=$_FILES['store_image']['name'];
  $update_image=$image;
}
else
{
  $update_image=$old_image;
}  

$update_query="UPDATE login set store_name='$store',image='$update_image' where id='$store_id'";
$sqlCreates=mysqli_query($connection,$update_query);

 
 
    if($sqlCreates)
       { 

        if($_FILES['store_image']['name'] != '') {
          move_uploaded_file($name, $location.$image);
       
          unlink("store_img/".$old_image);

         }   
           echo '<script>alert("saved changes")</script>';
           header("Location:admin.php");
       } 

}
             
?>

<!DOCTYPE html>
<html>
<head>
   
	<title>admin</title>
  <link rel="stylesheet" href="bootstrap/bootstrap.css" >
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');


    *{
      padding: 0px;
      margin:0px;
      box-sizing: border-box;
    }
		body{
			font-family: 'Poppins', sans-serif;
		}
		/* form{
			 display: flex;
			 align-items: center;
			 padding: 10px;
       width: 100%;
       flex-wrap: wrap;
      overflow-x: hidden;
}*/

		.row{
			
      margin-top: 10px;
      padding: 5px 30px;

		}
		.row input[type=text],input[type=file]{
			position: relative;
			border: none;
			padding: 4px;
      width: 100%;
      border: 1px solid #111;
      overflow: auto;

		}
    .rows input[type=text],input[type=file]{
      position: relative;
      border: none;
      padding: 4px;
      width: 445px;
      border: 1px solid #111;
      overflow: auto;

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
         width: 150px;height: 100px; object-fit: cover;

        }
        .btn{
          width: 100px;
        }
        .img{
          width: 130px;
       }
       .column{
          width: 140px;
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
          justify-content: space-between;
          align-items: center;
          background-color: #111;
          padding: 10px;
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
      .btns{
        background-color: red;
        width: 120px;
        position: relative;
        top: -15px;
        left: 30px;
        border: none;
        padding: 5px;
        color: #fff;
        background-color: blue;
      }
     table{
        width: 100%;

     }
     
     th,tr,td{
        text-align: center;
        border: 1px solid #1111;
        padding: 5px;
     }
     .store_section{
        position: relative;
        top: -30px;
        background-color: #111;
        color: #ffff;
        padding: 10px;

     }
     .btn-edit-store{
        position: relative;
        left: -20px;
        background-color: #ffff;
     }
     .image-box{
        width: 200px;
        height: 200px;
     }
    .image-box img{
      width: 100%;
      height: 100%;
    }
    .row label{
      color: #111;
    }
     .head button{
          border: none;
          padding: 8px;
          border-radius: 5px;
          color: #111;
          background-color:#ffff;
          position: relative;
          left:350px;
          cursor: pointer;
       }
	</style>
</head>
<body>
<header>
  <div class="header-container">
    <div class="header-1">
       <h3 style="color:#ffff;position: relative;left: 10px"><?php echo $row['store_name'] ?></h3>   
    </div>
    <div class="head">
         <button type="button" data-toggle='modal' data-target="#editPassword">Change Password</button>
    </div>
    <div class="header-2">  
        <button type="button" class="btn btn-edit-store" data-toggle="modal" data-target="#editStore">
          Edit Store
      </button>
    
       <a href="logout.php">Logout</a>
     </div>

<!---modal changePassword----------->
     <div class="modal fade" id="editPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <form method="post" enctype="multipart/form-data">
             

             <?php 

       // $stores=$_SESSION['store'];
        $id=$_SESSION['id'];
        $query = "SELECT * FROM login where id='$id'";
        $query_run = mysqli_query($connection, $query);
        $row=mysqli_fetch_array($query_run);
        $location='store_img/';
        $id=$row['id'];

        ?>


             <div class="row">
                <label>Username</label>
                <input type="text" name="username" placeholder="Store Name" value="<?php echo $row['username']; ?>" required>
             </div>
             <div class="row">
              <label>Current Password</label>
               <input type="text" name="current_password" required>
             </div>
             <div class="row">
              <label>New Password</label>
               <input type="text" name="new_password" required>
             </div>
             <label style="position: relative;left: 15px">Retype Password</label>
             <div class="row">
               <input type="text" name="retype_password" required>
             </div>

            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn" name="btn_changePassword">Save</button>
      </div>
    </div>
  </div>
  </form>

</div>
</div>
<!--modal change password end--->
<!-- Modal edit store-->
<div class="modal fade" id="editStore" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Store Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <form method="post" enctype="multipart/form-data">
             

             <?php 

       // $stores=$_SESSION['store'];
        $id=$_SESSION['id'];
        $query = "SELECT * FROM login where id='$id'";
        $query_run = mysqli_query($connection, $query);
        $row=mysqli_fetch_array($query_run);
        $location='store_img/';
        $id=$row['id'];

        ?>


             <div class="rows">
                <input type="text" name="store_name" placeholder="Store Name" value="<?php echo $row['store_name']; ?>">
             </div>
             <div style="margin-top: 10px" class="image-box">
                <img src="store_img/<?php echo $row['image'];?>">
             </div>
             <input type="hidden" name="old_image" value="<?php echo $row['image'];?>">
             <input type="hidden" name="id" value="<?php echo $id;?>">
             <div class="rows">
                <input style="border: none;" type="file" name="store_image">
             </div>
             
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn" name="btn_store">Save</button>
      </div>
    </div>
  </div>
  </form>

</div>
</div>
</header>
  
<main>
  
<a href="admin.php">
    <button type="button" class="btns" >
      Back to home
    </button>
</a>




<div class="container-fluid">

            <?php
               $stores=$_SESSION['store'];
               $query = "SELECT b.buy, b.price, b.quantity, b.image, b.product_id ,b.uname, b.status FROM buy b inner join product p on b.product_id = p.p_id where p.store_name = '$stores'";
               $query_run = mysqli_query($connection, $query);
               $location='store_img/';
                
   

                if(isset($_POST['search']))
                {
                  if(!empty($_POST['categorys'])){

                    $selected=$_POST['categorys'];

                    echo 'you have chosen:'. $selected;

                    $query_run = mysqli_query($connection,"SELECT * FROM product where category='$selected'"); 
                      $location='store_img/';

                      $all="All Products";
                      if($selected==$all){

                        $query = "SELECT * FROM product";
                        $query_run = mysqli_query($connection, $query);
                        $location='img/';
                
                      }
               
                  }
                  else{
                     echo "please select a value";
                  }
            
                }

            ?>
                <table cellspacing="0">
                    <thead>
                        <tr>
                            <th>Product Id</th>
                            <th>Product Name </th>
                            <th>Price </th>
                            <th>Image</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Actions</th>
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
                                <td class="column"><?php  echo $row['buy']; ?></td>
                                <td class="column"><?php  echo $row['uname']; ?></td>
                                <td class="column"><?php  echo $row['price']; ?></td>
                                <td style="padding: 4px" class="img"><img src=<?php echo $location.$row["image"];?>></td>
                                <td class="column"><?php  echo $row['quantity']; ?></td>

                       


                              <!-- <td><?php //echo '<img src="data:img/design.jpg,'.base64_encode( $row['image'] ).'"/>';?></td>-->
                               <!--<td><?php  //echo $row['image']; ?></td>-->
                               	<td><?php  echo $row['status']; ?></td>
                                <td class="btn">
                                   <a style="background-color: #1affd1;width: auto;" href="AdminOrderStatusCancel.php?buyID=<?php echo $row["buy"]; ?>">Cancel</a>

                                </td>
                                <td class="btn">
                                    <a style="background-color: #ff5c33;width: auto" href="AdminOrderStatusDone.php?buyID=<?php echo $row["buy"]; ?>">Mark As Done</a>
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
</main>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>



