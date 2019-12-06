<?php
/*If the user is logged in then they will be able to complete actions within the page*/
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

require '../functions/loadTemplate.php';
require '../config.php';
require '../header.php';
require '../templates/createcustomer.html.php';
/*Query to insert into the customers table with the relvent fields*/
if(isset($_POST{'submit'})){
$stmt = $pdo->prepare('INSERT INTO Customers (Firstname,Surname, Address_Line_1, Address_Line_2, Address_Line_3,PostCode,Telephone_Number,Email_Address,Username,Password)
    VALUES ( :Firstname, :Surname , :Address_Line_1,:Address_Line_2,:Address_Line_3,:PostCode,:Telephone_Number,:Email_Address,:username,:password)');
$Customer = [
'Firstname'=> $_POST['firstname'],
'Surname' => $_POST['surname'],
'Address_Line_1' => $_POST['Address1'],
 'Address_Line_2'=> $_POST['Address2'],
  'Address_Line_3'=> $_POST['Address3'],
  'PostCode'=> $_POST['postcode'],
  'Telephone_Number'=>$_POST['Telephone'],
    'Email_Address'=>$_POST['Email'],
    'username'=>$_POST['username'],
    'password'=>$_POST['password']
];
/*if the form doesnt contain one of the forms fields then the query wont be processed*/
$fields = array('firstname','surname','Address1','Address2','Address3','postcode','Telephone','Email','username','password');
$error = false; //No errors yet
foreach($fields AS $fieldname) { //Loop trough each field
  if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])) {
    echo 'Field '.$fieldname.' not entered!<br />'; //Display error with field
    $error = true; //Yup there are errors
  }
}
  if(!$error){
    $stmt->execute($Customer);
    echo "customer added";
  }
}
}
else{
  header('location:Login.php');
}

?>
