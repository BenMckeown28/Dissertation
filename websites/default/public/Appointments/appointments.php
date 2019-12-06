

<?php
/* If the user is logged in then they will be granted access to the page */
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

require '../config.php';
require '../functions/loadTemplate.php';
require '../header.php';
require '../templates/appointments.html.php';
}
/* If the user is not currently logged into the session, then they will not be granted access to the page */
else{
  header("location:../login.php");
}

?>
