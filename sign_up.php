<?php



   require('./dbconnection.php');

   if(isset($_POST['create']))
   {
    
    
     $user_type='admin';
     $username=$_POST['user_name'];
     $password=$_POST['password'];

     /*$name=$_POST['name'];*/
     $firstname=$_POST['firstname'];
     $lastname=$_POST['lastname'];
     $adress=$_POST['adress'];
     $mobile_number=$_POST['mobile_number'];
     $date=$_POST['date'];
     $gender=$_POST['gender'];
     $store_name="none";
     $type="none";


     $location='img/';




     //image code
    
    
 



      $sql="select * from login where (username='$username' or password='$password');";

      $res=mysqli_query($connection,$sql);

    
            $row = mysqli_fetch_assoc($res);
            if($username==isset($row['username']))
                 {
                     echo "username already exists";
               }

     else
         {
            /*$image=$_FILES[$images]['tmp_name'];
            $name=$_FILES[$images]['name'];*/

             $substring=substr($firstname,0);
             $string= $substring[0]; 

             echo $string;

             if($string=="a" || $string=="A"){

                   $images='A.png';
             }

             if($string=="b" || $string=="B"){
                   $images='B.png';
             }
              if($string=="c" || $string=="C"){
              
                 $images='C.png';
             }
             
              if($string=="d" || $string=="D"){
              
                 $images='D.png';
             }
             
              if($string=="e" || $string=="E"){
                 $images='D.png';
             }
              if($string=="f" || $string=="F"){
                 $images='F.png';
             }
             
              if($string=="g" || $string=="G"){
                  $images='G.png';
             }
              if($string=="h" || $string=="H"){
                 $images='H.png';
             }
             
              if($string=="i" || $string=="I"){
                 $images='I.png';
               
             }
              if($string=="j" || $string=="J"){
                $images='J.png';
             }
             
              if($string=="k" || $string=="K"){
                 $images='K.png';
             }
              if($string=="l" || $string=="L"){
                 $images='L.png';
             }
              if($string=="m" || $string=="M"){
                 $images='M.png';
             }
              if($string=="n" || $string=="N"){
                 $images='N.png';
             }
              if($string=="o" || $string=="O"){
                 $images='O.png';
             }
             
              if($string=="p" || $string=="P"){
                 $images='P.png';
             }
               if($string=="q" || $string=="Q"){
                 $images='Q.png';
             }
               if($string=="r" || $string=="R"){
                  $images='R.png';
             }
               if($string=="s" || $string=="S"){
                $images='S.png';
             }
               if($string=="t" || $string=="T"){
                  $images='T.png';
             }
               if($string=="u" || $string=="U"){
                  $images='U.png';
             }
               if($string=="v" || $string=="V"){
                  $images='V.png';
             }
               if($string=="w" || $string=="W"){
                  $images='W.png';
             }
               if($string=="x" || $string=="X"){
                 $images='X.png';
             }
               if($string=="y" || $string=="Y"){
                  $images='Y.png';
             }
               if($string=="z" || $string=="Z"){
                $images='Z.png';
             }

            
         //Insert query 

                $create_query= "INSERT into login Values(null,'$username',md5('$password'),'$adress',
                '$gender','$date','$firstname','$lastname','$mobile_number','$images','$store_name','$type')";
                $sqlCreate=mysqli_query($connection,$create_query);



                if($sqlCreate){
                  /*move_uploaded_file($location.$images);
                  echo "uploaded";*/

                  echo '<script>alert("Successfully added")</script>';
                  /*header("Location: ./login.php");*/
     

               }
                 
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
.wrapper .row{
  display: flex;
  justify-content: space-between;
  flex-direction: column;
}
.wrapper .row input{
  width: 300px;
  padding: 3px;
  margin: 0px 0px;
 
  
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
.child-container{
  display: flex;
  justify-content: space-around;
 
  padding: 0 0 30px 0;
}
fieldset{
  padding: 10px;

}

.first-row{
 
  display: flex;
  justify-content: center;
  flex-direction: column;
}
</style>
</head>
<body>

<div class="container">
   <div class="col-1">
      <div class="title-container">
         <h2 class="title">Welcome <span>Tap and Go - Food Corners!</span> Please Register.</h2>
     </div>
     <div class="register-container">
       <p class="register">Already have an account??<a href="login.php"><span> Login </a></span>here!</p>
     </div>
   </div>


  <div class="wrapper">
 
     
    <form class="dale" method="post">
      <div class="child-container">
         <div class="first-row">
          <div class="row">
            <label>First Name</label>
            <input type="text" name="firstname" placeholder="firstname" required>
          </div>
          <div class="row">
            <label>Last Name</label>
            <input type="text" name="lastname" placeholder="lastname">
          </div>

     <div class="row">
          <label>Adress</label>
          <input type="text" name="adress" placeholder="Adress" required>
     </div>
      <div class="row">
          <label>Mobile Number</label>
          <input type="text" name="mobile_number" placeholder="Mobile Number" required>
     </div>
      <div class="row">
          <label>Date of Birth</label>
          <input type="date" name="date">
     </div>
      </div>



   <div class="second-row">
  <!--  <fieldset>
        <legend>Personal Information</legend>0--->
    
     
     <div class="row">
    <div class="row">
            <label>Username</label>
             <input type="text" name="user_name" placeholder="Username" required>
          </div>

          <div class="row">
             <label>Password</label>
             <input type="password" name="password" placeholder="Password" required>
         </div>

        <div class="rows">
       <input class="login" type="submit" name="create" value="Sign Up">
     </div>
     <style>
       
       .rows input,.Home a{
          border: none;
          position: relative;
          top: 25px;
       }
     </style>

    <div class="Home">
        <a style="font-size: 13px;" href="index.php">Back to Home</a>
    </div>

    </div>
     
   
  <!---- </fieldset>---------------------->
   </div>
</div>

 
  </form>
 </div>
</div>
</body>
</html>
 
