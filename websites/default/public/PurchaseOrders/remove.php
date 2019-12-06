<!--Once a record has been selected , it will be instantly removed from the system and the user will not be able to view it any more-->
<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
require '../config.php';
$id =$_GET['id'] ;
 $same=$pdo->query('DELETE FROM purchaseditems WHERE idpurchaseditems = '. $_GET['id'])->rowCount()  ;
        echo 'purchase order remove';
        header('Location:viewPurchaseOrders.php');
        die();

}
else{
  header("location:login.php");
}
       ?>
