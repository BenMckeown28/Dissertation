<?php

session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
require 'config.php';
require 'functions/loadTemplate.php';
require 'header.php';
require 'templates/home.html.php';
}
else{
  header("location:Login.php");
}

?>
