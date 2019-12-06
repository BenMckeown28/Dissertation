<?php
require 'config.php';
$id =$_GET['id'] ;
 $same=$pdo->query('DELETE FROM pending_orders WHERE idpending_orders = '. $_GET['id'])->rowCount()  ;
header('Location:shoppingcart.php');
die();


       ?>
