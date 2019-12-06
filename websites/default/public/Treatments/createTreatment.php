<?php
/*User cannot be granted access if they are not logged into the session*/
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

require '../functions/loadTemplate.php';
require '../config.php';
require '../header.php';
require '../templates/createtreatment.html.php';

/*If the user submits the form, the record is added to treatments*/
if(isset($_POST{'submit'})){
$stmt = $pdo->prepare('INSERT INTO Treatments (Treatment_name,Treatment_description,price,date_added,Category,Estimated_Time )
    VALUES ( :Treatment_name,:Treatment_description,:price,:date_added,:Category,:Estimated_Time)');
    $date= date('m/d/y');
$Customer = [
'Treatment_name'=> $_POST['treatmentname'],
'Treatment_description' => $_POST['Tdesc'],
'price' => $_POST['price'],
'Category'=>$_POST['category'],
'Estimated_Time'=>$_POST['esttime'],
'date_added' => $date

];
/*If there are any fields which are missing then the system will output an error message*/
$fields = array('treatmentname','Tdesc','price','category','esttime');
$error = false; //No errors yet
foreach($fields AS $fieldname) { //Loop trough each field
  if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])) {
    echo 'Field '.$fieldname.' missed!<br />'; //Display error with field
    $error = true; //Yup there are errors
  }
}
  if(!$error){
    $stmt->execute($Customer);
    echo "Treatment added";
  }
}
}
else{
    header("location:../login.php");
}

?>
