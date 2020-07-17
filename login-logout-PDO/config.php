<?php 

$host='localhost';
$db= 'users';
$user='root';
$password='';

//$conn = new mysqli('localhost','root','','users');



try{
  $pdo = new PDO('mysql:host='.$host.';dbname='.$db , $user,$password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 // echo 'connection ok';

}catch(PDOException $e){
  echo 'Exception:'. $e->getMessage().$e->getLine();
}
?>