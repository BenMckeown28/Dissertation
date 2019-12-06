
<!--Confirms the purchase order made by a user on the publi website-->
<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
require '../config.php';
$id =$_GET['id'] ;
$confirm = $pdo->query('UPDATE Purchase_Orders SET status WHERE idPurchase_Orders = 2  ');
}
else{
  header("location:login.php");
}
       ?>
