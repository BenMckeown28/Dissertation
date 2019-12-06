<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

require '../functions/loadTemplate.php';
require '../config.php';
require '../header.php';
require '../templates/treatments.html.php';
}
else{
    header("location:../login.php");
}
?>
