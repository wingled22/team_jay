<?php 

  require("./dbconnection.php");
  
  session_start();
  /*if(empty($_SESSION['status']))
  {
    $_SESSION['status']='invalid';
  }
*/

if($_SESSION['status']=='invalid'|| empty($_SESSION['status']))

  {

     $_SESSION['status']=='invalid';
  }

if(empty($_SESSION['status']))
{
     header("Location: login.php");
}

if($_SESSION['status']=='valid')
{
    header("Location: admin.php");
}



if($_SESSION['status']=='client-valid')
{
    header("Location: client.php");
}

  if(isset($_POST['login']))
  {

   
    $username=trim($_POST['user_name']);
    $password=trim($_POST['password']);
    $type=trim($_POST["type"]);
    $store_name=trim($_POST["store_name"]);
    $id=trim($_POST['id']);
    if(empty($username)|| empty($password))
    {
      echo "Please fill all fields";
    }
    else{
     // echo "nice";


      //search query

      //
      $login_query="select * from login where username='$username' and password= md5('$password')";
      $login_Sqlvalidate=mysqli_query($connection,$login_query);
      $row_validate=mysqli_fetch_array($login_Sqlvalidate);

      if(mysqli_num_rows($login_Sqlvalidate)>0)
      {
        //session valid
        
       
      if($type=='admin')
          {
             $_SESSION['status']='valid'; 
             $_SESSION['username']=$username;
             $_SESSION['store']=$store_name;
             $_SESSION['id']=$id;
             echo "Valid Credential";
             header('Location: admin.php');
             die;
          }
      else if($username==$username)
      {
           $_SESSION['username']=$username;

           $_SESSION['status']='client-valid';
           header('Location:client.php');
           
      }
    
     }
       else{

         $_SESSION['status']='invalid';
         $_SESSION['status']='client-invalid';
          echo "invalid Credential";
      }
      /*else{
        //session invalid
        $_SESSION['status']='invalid';
        echo "Invalid Credential";

        
      }*/
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
  margin: 80px 300px;
  height: 450px;
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
         <h2 class="title">Welcome <span>Tap and Go - Food Corners!</span> Please Login.</h2>
     </div>
     <div class="register-container">
       <p class="register">New Member?<a href="sign_up.php"><span> Register </a></span>here!</p>
     </div>
   </div>

<!--      
    </div>
       
  </div>--->
  <div class="wrapper">
      <form class="dale" method="post">
        <div class="row">
           <p>Phone Number or Username</p>
           <input type="text" name="user_name" id="username" onkeyup="GetDetail(this.value)" placeholder="Username" required>
        </div>
       <div class="row">
           <p>Password</p>
           <input type="password" name="password" placeholder="Password" required>
       </div>
        <div class="row">
           <input type="hidden" name="type" id="type" placeholder="type">
       </div>
        <div class="row">
           <input type="hidden" name="store_name" id="store" placeholder="store name">
       </div>
        <div class="row">
           <input type="hidden" name="id" id="id" placeholder="id">
       </div>
       <div class="row">
      <input class="login" type="submit" name="login" value="Login">
    </div>
     <div class="home">
      <div>
        <a href="index.php">Back to Home</a>
      </div>
      <div>
        <p>Do you want to be a seller?<a href="seller_register.php"><span> Click here! </a></p>
      </div>
        
    </div>
  </form>
 </div>
</div>
</body>
<script>
  
   function GetDetail(str){
    if(str.length==0){
       document.getElementById("type").value="";
        document.getElementById("username").value="";
        document.getElementById("id").value="";
       return;
    }
    else{
      var xmlhttp = new XMLHttpRequest();
      
      xmlhttp.onreadystatechange=function(){
         if(this.readyState==4 && this.status==200){
            var myObj=JSON.parse(this.responseText);
            document.getElementById("type").value=myObj[0];
            document.getElementById("store").value=myObj[1];
             document.getElementById("id").value=myObj[2];
         }
      };
      xmlhttp.open("GET","fetch.php?username=" + str,true);
      xmlhttp.send();
    }
  }
</script>
</html>

</body>
</html>

