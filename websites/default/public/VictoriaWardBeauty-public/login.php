<?php
session_start();
require 'config.php';


?>
<head>
  <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<div class="loglogo">
  <img class="logolog" src="logo.png" />
</div>

  <div class="content">
<div class="loginform">

<h2>Login</h2>
<form action="Login.php" method="POST">

  <label>Username:</label>
  <input class="form-control" type="text" name="username" id="username" /> <br /><br />
  <label>Password:</label>
  <input class="form-control" type="password" name="password" id="password" /><br /><br />
  <input class="form-control" type="submit" name="submit" value="Log in" /></br>
<a href="register.php">Dont have an account? Register here</a>
</form>
</div>
</div>

<?php
if(isset($_POST['submit'])){
$stmt=$pdo->prepare('SELECT * FROM Customers WHERE username = :username AND password = :password');
$user=$pdo->query('SELECT Username FROM Customers');
$pass=$pdo->query('SELECT Password FROM Customers');
$validUser = [
'username' => $_POST['username'],
'password' =>  $_POST['password']
];
$stmt->execute($validUser);


// will find rows which are related to admins through the letter A
if ($stmt->rowCount() > 0)
 {
$_SESSION['loggedin2'] = true;
$_SESSION['username2'] = $_POST['username'];

$id= $pdo->query('SELECT * FROM Customers WHERE username = "'.$_SESSION['username2'].'" ');

foreach($id as $row){

$_SESSION['id'] = $row['idCustomers'];
}
// confirmation that the admin has logged in
  header('location:index.php');
  echo 'You are now logged in';

}
else{
  echo "Invalid username or password, please input a valid username and password";
}
}




?>
