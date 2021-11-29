<?php



   require('./dbconnection.php');

   if(isset($_POST['create']))
   {
    

     $user_type='admin';
     $username=$_POST['user_name'];
     $password=$_POST['password'];

     /*$name=$_POST['name'];*/
     $firstname="null";
     $lastname="null";
     $adress="null";
     $mobile_number=0;
     $date="2020-09-03";
     $gender="null";
     $store_name=$_POST['store_name'];
     $location='store_img/';
     $type="admin";

      $image=$_FILES['product_image']['tmp_name'];
      $name=$_FILES['product_image']['name'];

     
      $sql="select * from login where (username='$username' or password='$password');";

      $res=mysqli_query($connection,$sql);

    
            $row = mysqli_fetch_assoc($res);
            if($username==isset($row['username']))
                 {
                     echo "username already exists";
               }

         //Insert query 

                $create_query= "INSERT into login Values(null,'$username',md5('$password'),'$adress','$gender','$date','$firstname','$lastname','$mobile_number','$name','$store_name','$type')";
                $sqlCreate=mysqli_query($connection,$create_query);



                if($sqlCreate){
                   move_uploaded_file($image, $location.$name);
                  echo '<script>alert("Successfully added")</script>';
                  header("Location: ./login.php");
     

               }
                 
         }



?>
 
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!---<link rel="stylesheet" type="text/css" href="login.css">--->
<title>Register</title>
<style>

  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');
  *{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;

}
html,body{
  background-color: #F8F8F8;
}
.container{
  padding: 0px 20px 20px 20px;
  margin: 60px 300px;
  height: 500px;
  border-radius: 50px;
  position: relative;
  display: flex;
  flex-direction: column;
}
.col-1{
  display: flex;
  justify-content: space-between;
  align-items: center;
 
  padding: 10px 0;
}
.col-1 .title-container .title{
  font-size: 20px;
}
.col-1 .register-container .register{
  font-size: 11px;
}
.wrapper
{
  width: 100%;
  height: 100%;
  background-color: #ffff;
  padding: 40px;
  position: relative;

}
.wrapper .row input{
  width: 100%;
  padding: 15px;
  margin: 10px 0px;
  border-radius: 0px;
  font-size: 18px;
  outline: none;
  border: none;
  border:1px solid #E0E0E0;
  
}
.wrapper .row p{
  font-size: 18px;
  font-weight: 15px;
  color: #383838;
}
.wrapper .forgot{
  margin-top: 10px;
}
.wrapper .forgot a{
  text-decoration: none;
  color: #111;
  font-size: 18px;
}
.wrapper .row .login{
  background-color:#DD9C22;
  color: #ffff;
  font-size: 20px;
  font-weight: 20px;
  letter-spacing: 2px;
}
.register{
   font-size: 13px;
}
.register span,a{
  color: #6D00FF;
  text-decoration: none;
}
.title span{
  color: #6D00FF;
}
.home{
  display: flex;
  justify-content: space-between;
  font-size: 12px;
}

</style>
</head>
<body>

<div class="container">
   <div class="col-1">
    <div class="title-container">
         <h2 class="title">Welcome <span>Tap and Go - Food Corners!</span> Register your store.</h2>
     </div>
     <div class="register-container">
       <p class="register">New Member?<a href="sign_up.php"><span> Register </a></span>here!</p>
     </div>
   </div>

<!--      
    </div>
       
  </div>--->
  <div class="wrapper">
      <form class="dale" method="post" enctype="multipart/form-data">
          <div class="row">
           <p>Store Name</p>
           <input type="text" name="store_name" placeholder="Username" required>
            <input style="color: #111" type="file" name="product_image">
        </div>
        <div class="row">
           <p>Phone Number or Username</p>
           <input type="text" name="user_name" id="username" onkeyup="GetDetail(this.value)" placeholder="Username" required>
        </div>
       <div class="row">
           <p>Password</p>
           <input type="password" name="password" placeholder="Password" required>
       </div>
        <div class="row">
           <input type="hidden" name="type" id="type" placeholder="type" required>
       </div>
       <div class="row">
      <input class="login" type="submit" name="create" value="Register">
    </div>
     <div class="home">
      <div>
        <a href="index.php">Back to Home</a>
      </div>
        
    </div>
  </form>
 </div>
</div>

<script>
  function GetDetail(str){
    if(str.length==0){
       document.getElementById("type").value="";
        document.getElementById("username").value="";
       return;
    }
    else{
      var xmlhttp = new XMLHttpRequest();
      
      xmlhttp.onreadystatechange=function(){
         if(this.readyState==4 && this.status==200){
            var myObj=JSON.parse(this.responseText);
            document.getElementById("type").value=myObj[1];
         }
      };
      xmlhttp.open("GET","fetch.php?username=" + str,true);
      xmlhttp.send();
    }
  }
</script>
</body>
</html>

</body>
</html>

