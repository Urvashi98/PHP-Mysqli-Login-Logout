<?php 

$conn = new mysqli('localhost','root','','users');
if(!$conn){
  die("Connection failed: " . $conn->connect_error);
}
else{ 
  //  echo 'Connection OK';
}
?>