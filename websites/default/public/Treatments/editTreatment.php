<?php
/*If the user is not currently logged into the system then they wont be able to view or complete any of the actions*/
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
require "../config.php";
require '../header.php';
require '../functions/loadTemplate.php';
   $Treatment = $pdo->query('SELECT * FROM Treatments WHERE idTreatments = '. $_GET['id'])->fetch()  ;
$id =$_GET['id'] ;
?>
<h2>Edit Treatment</h2>
<!--A form for the user to make any changes to a treatment -->
<div class="POForm">
            <form action="" method="POST" >

                <input class="form-control" type="hidden" name="id" value="<?php echo $Treatment['idTreatments']; ?>" />
                <label>Treatment name</label>
                <input class="form-control" type="text" name="Treatmentname" value="<?php echo $Treatment['Treatment_name']; ?>" /><br />
                <label>Treatment description</label>
                <textarea class="form-control" row="50" col="50" name="TreatmentDesc" value="<?php echo $Treatment['Treatment_description']; ?>" /></textarea><br />
                <label>Price(£)</label>
                <input class="form-control" type="text" name="price" value="<?php echo $Treatment['price']; ?>" /><br />
                <label>Estimated Time (mins)</label>
                <input class="form-control" type="text" name="price" value="<?php echo $Treatment['Estimated_Time']; ?>" /><br />
                <label>Date Added</label>
                <input class="form-control" type="text" name="Dateadded" value="<?php echo $Treatment['Date_Added']; ?>" /><br />
              <input class="form-control" type="submit" name="edit" value="Edit"  />
              </form>

</div>
<?php
/*If the user edits the treatment then the record will be changed through the database*/
if (isset($_POST['edit'])) {

       $stmt = $pdo->prepare('UPDATE Treatments
                               SET Treatment_name = :Tname,
                                  Treatment_description = :TDescription,
                                  price= :price,
                                  Estimated_Time = :Estimated_Time
                                  WHERE idTreatments = :id
                       ');

       $criteria = [
        'Tname' => $_POST['Treatment_name'],
            'TDescription'=> $_POST['TreatmentDesc'],
            'price' => $_POST['price'],
            'Estimated_Time' => $_POST['Estimated_Time'],
            'price' => $_POST['price'],
            'id'=> $_POST['id']
       ];

       $stmt->execute($criteria);

echo 'Treatment record edited';

}
}
else{
    header("location:../login.php");
}


?>
