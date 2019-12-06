<?php

$page='contact';
require 'header.php';
  require 'config.php' ;

 ?>
 <head>
   <style>
     #map {
       width: 100%;
       height: 400px;
       background-color: grey;
     }
   </style>
 </head>
   <h2 class="header">Contact Us </h2>
 <div class="contact2">




<form action ="contact.php" method="post">
  <label>Name</label><br />
  <input class="form-control" type="text" name="name"  /> <br />
  <label>Email</label><br />
  <input class="form-control" type="text" name="email" /> <br />
  <label>Subject</label><br />
  <input class="form-control" type="text" name="subject" value="" /> <br />
  <label>Enquiry</label><br />
  <textarea class="form-control" name="Enquiry" rows="5"  cols="30"></textarea><br />
  <input class="form-control" type="submit" name="submit" value="Submit Enquiry" />
</form>

<div class="map">
<ul>




<h3>Find us here:</h3>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5809.410599600181!2d-1.3958450763991759!3d52.25144288255785!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487725385eb5e545%3A0x8fb7cd91dbe5399c!2sSoutham!5e0!3m2!1sen!2suk!4v1555333639929!5m2!1sen!2suk" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</ul>
</div>
</div>

<?php
if (isset($_POST['submit'])) {
  $to      = 'benmckeown1998@gmail.com';
  $subject = 'Test';
  $message = 'hello';
  $headers = 'From: benmckeown1998@gmail.com' . "\r\n" .
      'Reply-To: webmaster@example.com' . "\r\n" .
      'X-Mailer: PHP/' . phpversion();

  mail($to, $subject, $message, $headers);


  $stmt = $pdo->prepare('INSERT INTO Enquiries (Name,Email,Subject,Enquirey)
      VALUES (:Name,:Email,:Subject,:Enquirey)');


      $criteria = [
      'Name'=> $_POST['name'],
      'Email'=> $_POST['email'],
      'Subject'=> $_POST['subject'],
      'Enquirey'=> $_POST['Enquiry']
];
  $stmt->execute($criteria);


}


require 'footer.php'; ?>
