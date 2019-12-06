<?php
$page = 'treatments';
require 'header.php';
if (isset($_SESSION['loggedin2']) && $_SESSION['loggedin2'] == true){


require 'config.php';

?>
  <section class="jumbotron text-center">
      <h1 class="jumbotron-heading">Payment</h1>
    </section>
<div class="contact">


<form action"shoppingcart.php" method="post">
<h2>Payment</h2>
<input  type="radio" value="Credit card" /> <label>Credit card</label><br />
<input  type="radio" value="Debit card" /><label>Debit card</label><br />
<input  type="radio" value="Paypal" /><label>Paypal</label><br />
<label>Name on card</label><br />
<input class="form-control" type="text" name="nameoncard" /><br />
<a>(Full name as displayed on card)</a><br />
<label>Credit card Number</label><br />
<input class="form-control" type="text" name="creditcardnumber" /><br />
<label>Expiration</label><br />
<input class="form-control" type="text" name="Expiration" /><br />
<label>CVV</label><br />
<input class="form-control" type="text" name="CVV" /><br />
<input class="form-control" type="submit" name="purchase" value="Confirm order" />
</form>






<div class="cart">

<h2>Your Cart</h2>

<?php
$cart= $pdo->query('SELECT * FROM pending_orders');
foreach ($cart as $cart){
  ?>
<ul>
<li><h4> <?php echo $cart['order_treatment']."-". $cart['Category'] ?></li></h4>
<li><p> Price of treatment: £ <?php echo $cart['Treatment_price']?></li></p>
<li><p> Date of appointment: <?php echo $cart['DateofBooking']?></li></p>
<li><p>Time of appointment: <?php echo $cart['TreatmentTime']?></li></p>
</ul>
<form action="shoppingcart.php" method="POST">
<input type="hidden" name="id" value=" <?php echo $cart['idpending_orders']?>" />
<a href="delete2.php?id='<?php echo $cart['idpending_orders'] ?>.'">Delete</a>
</form>
<?php
}
 ?>
 <h4>Total: £<?php

$sum=$pdo->query('SELECT SUM(Treatment_price) AS total FROM pending_orders');
$row = $sum->fetch(PDO::FETCH_ASSOC);
echo $row['total'];

 ?></h4>
</div>

</div>
<?php

if (isset($_POST['remove'])) {
$id = $_POST['id'];
$item = $pdo->query('DELETE FROM pending_orders WHERE idpending_orders = "'.$id.'"');




}



if(isset($_POST['purchase'])){

  $selecttreatments= $pdo->query('SELECT * FROM pending_orders');
foreach($selecttreatments as $row){

  $purchaseditems = $pdo->prepare('INSERT INTO purchaseditems (Treatment_name,price,Category,Estimated_Time,username,DateOfBooking,TreatmentTime,status)
  VALUES(:treatmentnamePI,:price,:Category,:Estimated_Time,:username,:DateOfBooking,:TreatmentTime,:status)');

  $criteria =[
    'treatmentnamePI' => $row[2],
    'price'=> $row['Treatment_price'],
    'Category'=>$row['Category'],
    'Estimated_Time'=>$row['Estimated_Time'],
    'username'=>$_SESSION['username2'],
    'DateOfBooking'=>$row['DateofBooking'],
    'TreatmentTime'=>$row['TreatmentTime'],
    'status'=>"pending"
  ];
  $purchaseditems->execute($criteria);
  $deleteTreatments = $pdo->query('DELETE FROM pending_orders');
}




}






}
else{

  header('location:index.php');
}
require 'footer.php';
?>
