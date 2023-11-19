<?php

$server = 'localhost';
$dbuser ='root';
$dbpassword ='';
$database= 'milano';


  $connect = mysqli_connect($server, $dbuser, $dbpassword, $database);


  if(!$connect){
   /*echo "Connected";
  }else{*/
    die(mysql_error($connect));
    echo "Connection failed";
  }


?>