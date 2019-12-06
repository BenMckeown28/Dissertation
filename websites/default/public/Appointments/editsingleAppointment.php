<?php
/*user is not able to edit record if they are not logged into the servers session */
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
require "../config.php";
require '../header.php';
require '../functions/loadTemplate.php';
?>
</table>
<?php
   $appointment = $pdo->query('SELECT * FROM Appointments WHERE idAppointments = '. $_GET['id'])->fetch()  ;
$id =$_GET['id'] ;
?>
<h2>Edit Appointment</h2>
<!-- Form for user to fill out before editing a record -->
<div class="POForm">
            <form action="" method="POST" >

                <input type="hidden" name="id" value="<?php echo $appointment['idAppointments']; ?>" />
                <label>Treatment</label>
                <input type="text" name="Tname" value="<?php echo $appointment['Treatment_name']; ?>" /> <br />
                <label>Treatment Description</label>
                <input type="text" name="Tdesc" value="<?php echo $appointment['Treatment_description']; ?>" /><br />
                <label>Customers firstname</label>
                <input type="text" name="firstname" value="<?php echo $appointment['Customers_firstname']; ?>" /><br />
                <label>Customers surname</label>
                <input type="text" name="surname" value="<?php echo $appointment['Customers_surname']; ?>" /><br />
                <label>Time of appointment</label>
                <input type="text" name="time" value="<?php echo $appointment['Appointment_time']; ?>" /><br />
                <label>Date of appointment</label>
                <input type="text" name="date" value="<?php echo $appointment['Appointment_date']; ?>" /><br />
              <input type="submit" name="edit" value="Edit"  />
              </form>
</div>

<?php
/*If user submits the form it will make any relevent changes to the table*/
if (isset($_POST['edit'])) {

       $stmt = $pdo->prepare('UPDATE Appointments
                               SET Appointment_time = :Atime,
                                  Appointment_date = :Adate
                                  WHERE idAppointments = :id
                       ');

       $criteria = [
        'Atime' => $_POST['time'],
            'Adate'=> $_POST['date'],
            'id'=>$_POST['id']
       ];

/*System will output an error message if fields are missing*/
       $stmt->execute($criteria);
$date= $_POST['date'];
$time = $_POST['time'];
$first = $_POST['firstname'];
$surname = $_POST['surname'];
echo $first . ' '.$surname . ' ' . 'appointment rescheduled to be on the'. ' '. $date . ' ' . 'at' . ' ' . $time ;

}

}
else{
  header("location:../login.php");
}
?>
