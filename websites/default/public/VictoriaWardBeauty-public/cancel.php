<?php
require 'config.php';
session_start();
$id =$_GET['id'] ;
 $cancel=$pdo->query('DELETE FROM purchaseditems WHERE idpurchaseditems = '. $_GET['id'])->rowCount()  ;
header('Location:portal.php?id='.$_SESSION['id']);
die();


       ?>
