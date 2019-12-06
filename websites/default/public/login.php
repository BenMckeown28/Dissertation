<?php
session_start();
require 'functions/loadTemplate.php';
require 'config.php';
require 'templates/login.html.php';
?>

<head>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>



<?php

if(isset($_POST['submit'])){
$stmt=$pdo->prepare('SELECT * FROM User WHERE username = :username AND password = :password');
$user=$pdo->query('SELECT username FROM User');
$pass=$pdo->query('SELECT password FROM User');
$validUser = [
'username' => $_POST['username'],
'password' =>  $_POST['password']
];
$stmt->execute($validUser);
// will find rows which are related to admins through the letter A
if ($stmt->rowCount() > 0)
 {
$_SESSION['loggedin'] = true;
$_SESSION['username'] = $_POST['username'];
// confirmation that the admin has logged in
  header('location:Home.php');
  echo 'You are now logged in';

}
else{
  echo "Invalid username or password, please input a valid username and password";
}
}




?>
