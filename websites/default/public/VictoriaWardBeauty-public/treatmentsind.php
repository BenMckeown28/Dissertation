<?php
$page = 'treatments';
require "config.php";
  require 'header.php';

 $Treatment = $pdo->query('SELECT * FROM Treatments WHERE idTreatments = '. $_GET['id'])->fetch() ;
$id=$_GET['id'] ;
$date= date('d-m-y');
$time= date("h:i");
?>

<div class="reviewform">
<div class="col-xs-6">
<form action="treatmentsind.php?id=<?php echo $id ?>" method=POST >
<h2><?php echo $Treatment['Treatment_name'] ."-". $Treatment['Category'] ; ?></h2>
<p> <?php echo $Treatment['Treatment_description'] ;?></p>
<p>Cost of Treatment : £ <?php echo $Treatment['price'] ;?></p>
<p>Esitmated Time of Treatment : <?php echo $Treatment['Estimated_Time'] ;?></p>

<label>Date of booking</label>
<input class="form-control" type="date" name="date" min ='<?php echo $date ?>' /><br />
<label>Time of booking</label>
<input class="form-control" type="time" name="time" min= '<?php echo $time ?>'/> <br />
<input class="form-control" type="submit" name="add" value="Add to Cart" />
</form>
</div>
</div>

<?php

if (isset($_POST['add'])) {


    if(isset($_SESSION['loggedin2'])==true){

  $stmt = $pdo->prepare('INSERT INTO pending_orders (username,order_treatment,Treatment_price,DateofBooking,TreatmentTime,Estimated_Time,Category)
      VALUES (:username,:order_treatment,:treatmentprice,:dateofbooking,:TreatmentTime,:Estimated_Time,:Category)');


$criteria = [
'username'=>$_SESSION['username2'],
'order_treatment'=> $Treatment['Treatment_name'],
'treatmentprice'=>$Treatment['price'],
'Estimated_Time'=>$Treatment['Estimated_Time'] ,
'Category'=>$Treatment['Category'],
'dateofbooking'=>$_POST['date'],
'TreatmentTime'=>$_POST['time']
];

$fields = array('date', 'time');
$error = false;
foreach($fields as $fieldname){
  if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])) {
    echo 'Field '.$fieldname.' not entered!<br />'; //Display error with field
    $error = true; //Yup there are errors
  }
}

  if(!$error){
  $stmt->execute($criteria);

echo 'Booking has been made for'." ". $Treatment['Treatment_name'] ." ". 'for' . " " . $_SESSION['username2'] ." ". 'at'." ". $_POST['time'] ." ". 'on' ." ". $_POST['date'];
}
?>


<?php
}
else{
  echo 'Must be logged in to server to add item';
}
}

require 'footer.php';
?>
