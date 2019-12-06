<?php
/*user is not able to edit record if they are not logged into the servers session */
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
require "../config.php";
require '../header.php';
require '../functions/loadTemplate.php';
?>
</table>

<?php

$PO=$pdo->query('SELECT * FROM Appointments');
require "../templates/editAppointments.html.php";



foreach($PO as $row){
  echo '<tr id="wrapper">'.
  '<td> <a>'.$row['Treatment_name'] .'</a></td>'.
  '<td><a>'. $row['Customers_firstname'].'</a></td>'.
  '<td><a>'.$row['Customers_surname'] .'</a></td>'.
  '<td><a>'.$row['Appointment_time'] .'</a></td>'.
  '<td><a>'.$row['Appointment_date'] .'</a></td>'
;
  echo '<td><a href="editsingleAppointment.php?id=' . $row['idAppointments'] .'">Edit</a></td>';
  echo '</tr>' ;

}

}
else{
  header("location:../login.php");
}
?>
