
<?php
/* If the user is logged into a current session then they will be granted access to the page */
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
require "../config.php";
require '../header.php';
require "../templates/bookappointment.html.php";

$treatment=$pdo->prepare('SELECT * FROM Treatments ORDER BY Treatment_name');

$date= date('Y-m-d');
$time= date("h:i");
$treatment->execute();
?>
<div class="POForm">
<form action="BookAppointment.php" method="post">

  <label>Select Treatment </label>
  <!--
    <input type="text" id="test" name="query" value="" /> -->
  <select class="form-control" id= 'list' name="Treatments" onchange="get_dept(this.value);">
<?php
foreach($treatment as $row){
  echo '<option name="option" value="'.$row['Treatment_name'].'">'.$row['Treatment_name'].'</option>';}?>

<!-- Form for the admin to book an appointment -->
  </select> <br />

    <label>Customer Firstname</label>
    <input class="form-control"  type="text" name="firstname" value="" /> </br>
    <label>Customer Surname</label>
    <input class="form-control"  type="text" name="Surname" value=""  /> </br>
    <label>Address line 1</label>
    <input class="form-control"  type="text" name="Add1" value=""  /> </br>
      <label>Address line 2</label>
      <input class="form-control"  type="text" name="Add2" value=""  /> </br>
        <label>Address line 3</label>
        <input class="form-control"  type="text" name="Add3" value=""  /> </br>
  <label>Postcode</label>
  <input class="form-control"  type="text" name="postcode" value=""  /> </br>
    <label>Telephone number</label>
    <input class="form-control"  type="text" name="Tnum" value=""  /> </br>
      <label>Email address</label>
      <input class="form-control"  type="text" name="Email" value=""  /> </br>


      <label>Date</label>
      <input class="form-control"  type="date" name="date" min ='<?php echo $date ?>' /><br />
      <label>Time</label>
      <input class="form-control"  type="time" name="time" min= '<?php echo $time ?>'/> <br /><br />
      <input class="form-control"  type="submit" name="submit" value="Assign" />
    </div>



</form>














<!-- if the user submits the form, the system will insert the new record into the table if all fields are filled out -->

<?php
if(isset($_POST['submit']) && isset($_POST['firstname'])){
  $stmt = $pdo->prepare('INSERT INTO Appointments (Treatment_name ,Customers_firstname, Customers_surname, Appointment_time, Appointment_date )
      VALUES (:Tname, :Cfirstname , :Csurname , :Atime , :Adate)');


$criteria = [
'Tname'=> $_POST['Treatments'],
'Cfirstname'=> $_POST['firstname'],
'Csurname'=> $_POST['Surname'],
'Atime'=>$_POST['time'],
'Adate'=> $_POST['date']
];

$fname = $_POST['firstname'];
$sname= $_POST['Surname'];
$tname = $_POST['Treatments'];
$time = $_POST['time'];
$date = $_POST['date'];
?>


<!--Error message if user does not input all the relevent fields-->
<script>


alert("<?php  echo $tname .' '. 'Appointment booked for' . ' ' . $fname . ' ' . $sname . ' ' . 'at' . ' ' . $time . ' '. 'on the' .' '. $date ;
  $stmt->execute($criteria); ?> ")

</script>


<?php
}

}
else{
  header("location:../login.php");
}

?>
