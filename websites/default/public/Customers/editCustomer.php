<?php
/*If user is not logged into the session then they will not be granted access */
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
require "../config.php";
require '../header.php';

   $customer = $pdo->query('SELECT * FROM Customers WHERE idCustomers = '. $_GET['id'])->fetch()  ;
$id =$_GET['id'] ;
?>
<h2>Edit Customer</h2>

<!--Form to make changes to a customers record-->
<div class="POForm">
            <form action="" method="POST" >

                <input type="hidden" name="id" value="<?php echo $customer['idCustomers']; ?>" />
                <label>Firstname</label>
                <input class="form-control"  type="text" name="firstname" value="<?php echo $customer['Firstname']; ?>" /><br /><br />
                <label>Surname</label>
                <input class="form-control"  type="text" name="surname" value="<?php echo $customer['Surname']; ?>" /><br /><br />
                <label>Address Line 1</label>
                <input class="form-control"  type="text" name="addline1" value="<?php echo $customer['Address_Line_1']; ?>" /><br /><br />
                <label>Address Line 2</label>
                <input class="form-control"  type="text" name="addline2" value="<?php echo $customer['Address_Line_2']; ?>" /><br /><br />
                <label>Address Line 3</label>
                <input class="form-control"  type="text" name="addline3" value="<?php echo $customer['Address_Line_3']; ?>" /><br /><br />
                <label>PostCode</label>
                <input class="form-control"  type="text" name="postcode" value="<?php echo $customer['PostCode']; ?>" /><br /><br />
                <label>Telephone Number</label>
                <input class="form-control"  type="text" name="telephonenumber" value="<?php echo $customer['Telephone_Number']; ?>" /><br /><br />
                <label>Email Address</label>
                <input class="form-control"  type="text" name="emailaddress" value="<?php echo $customer['Email_Address']; ?>" /><br /><br />
              <input type="submit" name="edit" value="Edit"  />
              </form>

</div>
<?php
/*If the user submits the form, it will make any chnges to the record*/
if (isset($_POST['edit'])) {

       $stmt = $pdo->prepare('UPDATE Customers
                               SET Firstname = :Fname,
                                  Surname= :Sname,
                                  Address_Line_1 = :Addline1,
                                  Address_Line_2= :Addline2,
                                  Address_Line_3 = :Addline3,
                                  PostCode = :Postcode,
                                  Telephone_Number = :Telephonenumber,
                                  Email_Address = :Email


                                  WHERE idCustomers = :id
                       ');

       $criteria = [
        'Fname' => $_POST['firstname'],
            'Sname'=> $_POST['surname'],
            'Addline1' => $_POST['addline1'],
            'Addline2'=> $_POST['addline2'],
            'Addline3' => $_POST['addline3'],
            'Postcode' => $_POST['postcode'],
            'Telephonenumber' => $_POST['telephonenumber'],
            'Email' => $_POST['emailaddress'],
            'id'=> $_POST['id']
       ];

       $stmt->execute($criteria);

echo 'customer record edited';

}

}
/* User will be sent back to login page if they are not logged into the session*/
else{
  header("location:../login.php");
}
?>
