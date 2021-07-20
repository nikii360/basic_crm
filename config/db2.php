<?php
  $servername = "localhost";
  $username = "donny";
  $password = "kinglife";
  $dbname = "crmsystem";
  $conn= new mysqli($servername,$username,$password,$dbname);
  if($conn->connect_error){
    echo "Connection Error:". $conn->connect_error();
  }
?>
