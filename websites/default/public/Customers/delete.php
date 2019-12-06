<?php
/*If user is not logged into the session then they will not be granted access */
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
require '../config.php';
$id =$_GET['id'] ;
/*Query to delete the record from the customers table */
 $same=$pdo->query('DELETE FROM Customers WHERE idCustomers = '. $_GET['id'])->rowCount()  ;
        echo 'Customer deleted';
        header('Location:searchCustomer.php');
        die();
/*If the user is not logged in then they will be taken back to the login page*/
}
else{
  header("location:login.php");
}
       ?>
