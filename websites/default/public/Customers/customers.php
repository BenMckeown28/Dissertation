<?php
/*If user is not logged into the session then they will not be granted access */
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
/*Loads all the relevent documents for the page to load*/
require '../functions/loadTemplate.php';
require '../config.php';
  require '../header.php';

require '../templates/customers.html.php';
}
else{
  header("location:login.php");
}
?>
</div>
</div>
