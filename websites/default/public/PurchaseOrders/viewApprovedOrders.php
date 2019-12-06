<?php
/*If the user is logged in then they will be able to make actions towards to the page*/
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

require "../config.php";
require '../functions/loadTemplate.php';
require '../header.php';
?>
</table>

<?php
/*Only purchased orders which are approved by the admin will show within the table*/
$PO=$pdo->query('SELECT * FROM purchaseditems WHERE status = "approved" ');
require "../templates/viewPurchaseOrders.html.php";



foreach($PO as $row){
  echo '<tr id="wrapper">'.
  '<td> <a>'.$row['Treatment_name'] .'</a></td>'.
  '<td><a> £'. $row['price'].'</a></td>'.
  '<td><a>'.$row['Category'] .'</a></td>'.
  '<td><a>'.$row['Estimated_Time'] .'</a></td>'.
  '<td><a>'.$row['username'] .'</a></td>'.
  '<td><a>'.$row['DateOfBooking'] .'</a></td>'.
  '<td><a>'.$row['TreatmentTime'] .'</a></td>'.
    '<td><a>'.$row['status'] .'</a></td>'.
  '<td>.<ul class="actions">';


    echo '<li>.<a href="viewsinglePO.php?id=' . $row['idpurchaseditems'] .'">View </a>.</li>';
      echo '<li>.<a href="remove.php?id=' . $row['idpurchaseditems'] .'">Remove </a>.</li>';



  echo '</ul></td>'.'</tr>' ;

}

}
/*If the user is not currently logged into the system then they will be taken back to the login page*/
else{
    header("location:../login.php");
}
?>
