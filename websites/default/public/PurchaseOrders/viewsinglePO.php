<?php
/*if the user is logged into the system then they will be able to peform certain actions*/
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
require "../config.php";
require '../header.php';
   $PO = $pdo->query('SELECT * FROM purchaseditems WHERE idpurchaseditems = '. $_GET['id'])->fetch()  ;
$id =$_GET['id'] ;


?>
<h2> Purchase Order </h2>

<div class="POForm">
 <!--Form to view the record-->

            <form action="" method="POST" >
              <input type="hidden" name="id" value="<?php echo $PO['idpurchaseditems']; ?>" />
                <label>Treatment Name</label>
                <input readonly type="text" name="firstname" value="<?php echo $PO['Treatment_name']; ?>" /><br /><br />
                <label>Price of treatment</label>
                <input readonly type="text" name="surname" value="£<?php echo $PO['price']; ?>" /><br /><br />
                <label>Category</label>
                <input readonly type="text" name="addline1" value="<?php echo $PO['Category']; ?>" /><br /><br />
                <label>Estimated Time of Treatment</label>
                <input readonly type="text" name="addline2" value="<?php echo $PO['Estimated_Time']; ?>" /><br /><br />
                <label>Username of customer who bought Treatment</label>
                <input readonly type="text" name="addline3" value="<?php echo $PO['username']; ?>" /><br /><br />
                <label>Date of booking of Treatment</label>
                <input readonly type="text" name="postcode" value="<?php echo $PO['DateOfBooking']; ?>" /><br /><br />
                <label>Treatment Time</label>
                <input readonly type="text" name="telephonenumber" value="<?php echo $PO['TreatmentTime']; ?>" /><br /><br />
                <label>Status</label>
                <select name="status">
                  <option>
                    pending
                  </option>
                  <option>
                    approved
                  </option>
                </select>
                <input type="submit" name="Approve" value="approve" />

              </form>
</div>

<?php

if (isset($_POST['Approve'])) {

       $stmt = $pdo->prepare('UPDATE purchaseditems
                               SET status = :status
                                  WHERE idpurchaseditems = :id
                       ');

       $criteria = [
    'status'=>$_POST['status'],
            'id'=>$_POST['id']
       ];

       $stmt->execute($criteria);

echo 'Record has been edited';
}


}
else{
    header("location:../login.php");
}
?>
