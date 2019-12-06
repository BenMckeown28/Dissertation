<?php
$page = 'Home';
require 'header.php';

  $customer = $pdo->query('SELECT * FROM Customers WHERE idCustomers = '. $_GET['id'])->fetch() ;
echo '<h2> Welcome Back '.$customer['Firstname'].' !</h2>';

echo'<div class="portal"><div class="jumbotron">';

echo'<h3>General information</h3>'.
'<p>Firstname :'." ". $customer['Firstname'].'</p>'.
'<p>Surname :'." ".$customer['Surname'].'</p>'.
'<p>Address Line 1 :'." ".$customer['Address_Line_1'].'</p>'.
'<p>Address Line 2 :'." ".$customer['Address_Line_2'].'</p>'.
'<p>Address Line 3 :'." ".$customer['Address_Line_3'].'</p>'.
'<p>Postcode :'." ".$customer['PostCode'].'</p>'.
'<p>Telephone Number :'." ".$customer['Telephone_Number'].'</p>'.
'<p>Email Address :'." ".$customer['Email_Address'].'</p>'.

'</div>';

echo'<div class="jumbotron">';
echo '<h3>Personal Information</h3>'.
'<p>Username :'." ".$customer['Username'].'</p>'.
'<p>Password :'." ".$customer['Password'].'</p>'.'</div>' ;
echo'<div class="jumbotron">';
echo '<h3>Bookings</h3>';
$bookings = $pdo->query('SELECT * FROM purchaseditems WHERE username = "'.$_SESSION['username2'].'"');
?>
<table>
  <th>
    Table Row
  </th>
<th>
  Treatment name
</th>
<th>
  Treatment Price
</th>
<th>
  Category
</th>
<th>
  Estimated Time
</th>
<th>
  Date of Booking
</th>
<th>
  Time of Booking
</th>
<th>
  Status
</th>

<?php
$i=1;
foreach ($bookings as $rows){
  echo '<tr id="wrapper">'.
  '<td> <a>'. $i. '</a></td>'.
  '<td> <a>'.$rows['Treatment_name'] .'</a></td>'.
  '<td><a> £'. $rows['price'].'</a></td>'.
  '<td><a>'.$rows['Category'] .'</a></td>'.
  '<td><a>'.$rows['Estimated_Time'] .'</a></td>'.
  '<td><a>'.$rows['DateOfBooking'] .'</a></td>'.
    '<td><a>'.$rows['TreatmentTime'] .'</a></td>'.
      '<td><a>'.$rows['status'] .'</a></td>' ;
    ?>
  <td>       <button class="login btn my-2 my-sm-0" type="submit" onclick="location.href='cancel.php?id=<?php echo $rows['idpurchaseditems']; ?>'">Cancel</button></td>

<?php
   $i++;
}





echo '</table> </div>
</div>';

$sum=$pdo->query('SELECT SUM(price) AS total FROM purchaseditems WHERE username = "'.$_SESSION['username2'].'"');
$row = $sum->fetch(PDO::FETCH_ASSOC);
echo '<h2>Total of all Bookings made : £ ' . $row['total']. ' </h2>' ;



require 'footer.php';


?>
