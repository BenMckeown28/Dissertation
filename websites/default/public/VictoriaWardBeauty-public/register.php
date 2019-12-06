<?php
require 'config.php';
 ?>
<head>
  <link rel="stylesheet" href="../style.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<div class="loglogo">
  <img class="logolog" src="/images/logo.png" />
</div>

  <div class="content">
    <form action="register.php" method="post">
      <label>Firstname</label><br />
      <input class="form-control" type="text" name="firstname" /><br /><br />
        <label>Surname</label><br /><br />
        <input class="form-control" type="text" name="surname" /><br /><br />
          <label>Address Line 1</label><br />
          <input class="form-control" type="text" name="add1" /><br /><br />
            <label>Address Line 2</label><br />
            <input class="form-control" type="text" name="add2" /><br /><br />
              <label>Address Line 3</label><br />
              <input class="form-control" type="text" name="add3" /><br /><br />
                <label>Postcode</label><br />
                <input class="form-control" type="text" name="postcode" /><br /><br />
                  <label>Telephone Number</label><br />
                  <input class="form-control" type="text" name="Telephone_Number" /><br /><br />
                    <label>Email Address</label><br />
                    <input class="form-control" type="text" name="Email_Address" /><br /><br />
                      <label>Username</label><br />
                      <input class="form-control" type="text" name="Username" /><br /><br />
                        <label>Password</label><br />
                        <input class="form-control" type="text" name="Password" /><br /><br />
                        <input class="form-control" type="submit" name="register" value="Register" />
    </form>
  </div>




<?php
if(isset($_POST['register'])){
$insert= $pdo->prepare('INSERT INTO Customers (Firstname,Surname,Address_Line_1,Address_Line_2,Address_Line_3,PostCode,Telephone_Number,Email_Address,Archived,Username,Password)
    VALUES ( :Firstname, :Surname , :Address_Line_1 , :Address_Line_2 ,:Address_Line_3,:PostCode,:Telephone_Number,:Email_Address,:Archived,:Username,:Password)');

    $register=[
      'Firstname'=> $_POST['firstname'],
      'Surname' => $_POST['surname'],
      'Address_Line_1' => $_POST['add1'],
       'Address_Line_2'=> $_POST['add2'],
        'Address_Line_3'=> $_POST['add3'],
        'PostCode'=> $_POST['postcode'],
        'Telephone_Number'=>$_POST['Telephone_Number'],
          'Email_Address'=>$_POST['Email_Address'],
          'Archived'=> "No",
          'Username'=>$_POST['Username'],
          'Password'=>$_POST['Password']
    ];

$fields = array('firstname','surname','add1','add2','add3','postcode','Telephone_Number','Email_Address');
$error = false;
foreach($fields as $fieldname){
  if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])) {
    echo 'Field '.$fieldname.' not entered!<br />'; //Display error with field
    $error = true; //Yup there are errors
}
}
if(!$error){
  $insert->execute($register);
  echo "customer added";
}
}


?>
