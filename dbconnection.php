<?php 

  $dbhost="localhost";
  $dbuser="root";
  $dbpassword="";
  $database="team_jay";

  $connection=mysqli_connect($dbhost,$dbuser,$dbpassword,$database);

  if(mysqli_connect_error())
  {
  	echo "Error unable to connect to MYSQL!";
  	echo "Message:".mysqli_connect_error()."<br>";

  }
  /*else
  {
    echo "connected successfuly";
  }*/
?>