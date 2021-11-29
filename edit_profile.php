<?php 

require("./dbconnection.php");
session_start();


$username=$_SESSION['username'];
require("./dbconnection.php");


$result = mysqli_query($connection,"SELECT * FROM login where username='$username'");
$row= mysqli_fetch_array($result);


$name=$row['firstname'];

if(isset($_POST['btn_save'])){
  /*echo "button save pressed!!";*/


$lastname=$_POST['lastname'];
$firstname=$_POST['firstname'];
$adress=$_POST['adress'];
$mobile=$_POST['mobile'];
$date=$_POST['date'];
$gender=$_POST['gender'];
$login_id=$_POST['id'];


$name=$_FILES['img_file']['tmp_name'];
$image=$_FILES['img_file']['name'];
$old_image=$row['image'];
$location='default_pic/';

if($_FILES['img_file']['name'] != "") 
{
    $update_filename=$image;
}
else
{
  $update_filename=$old_image;
}

$update_query="UPDATE login set adress='$adress',gender='$gender',DateofBirth='$date',firstname='$firstname',lastname='$lastname',mobile='$mobile',image='$update_filename' where id='$login_id'";
$sqlCreate=mysqli_query($connection,$update_query);


 
    if($sqlCreate)
       { 

        if($_FILES['img_file']['name'] != '') {

           move_uploaded_file($name, $location.$image);
       
           unlink("default_pic/".$old_image);

         }    
         /*  move_uploaded_file($name, $location.$image);*/
       
             header("Location: client_dashboard.php");
             echo "updated successfully";
            
       }
}

if($_SESSION['status']=='invalid'|| empty($_SESSION['status']))

  {

     $_SESSION['status']=='invalid';
     header("Location: login.php");
  }

  //fetch client personal information//
 
$result = mysqli_query($connection,"SELECT * FROM login WHERE id='" . $_GET['id'] . "'");
$row= mysqli_fetch_array($result);

$fullname= $row['firstname']." ".$row['lastname'];

 ?>
<!--end of php file------------------------------------------------------------------>

<?php

include("./header.php");
if(isset($_POST["btn-search"])){

include("./client_body.php");
}
else{
  include("./include_php/include_editProfile.php");
}
?>
  <?php

  include("./footer.php");

  ?>

</html>