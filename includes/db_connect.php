<?php

function dbConnect(){
  $servername = 'localhost';
  $username = 'YOUR_USERNAME_DATABASE';
  $password = 'YOUR_PASSWORD_DATABASE';
  $db = 'YOUR_DB_NAME';

  $mysqli = new mysqli($servername,$username,$password,$db);

  // Check connection
  if ($mysqli ->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli ->connect_error;
    exit();
  }
  return $mysqli;
}

function dbClose($mysqli){
  $mysqli -> close();
}
  
?>