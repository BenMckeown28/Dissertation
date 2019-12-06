<?php
if($_SESSION['loggedin']==true){
$results = $pdo->query('SELECT * FROM User');

}
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title></title>

    <!-- Bootstrap CSS CDN -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../style.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.0/css/all.css" integrity="sha384-Mmxa0mLqhmOeaE8vgOSbKacftZcsNYDjQzuCOm6D02luYSzBG8vpaOykv9lFQ51Y" crossorigin="anonymous">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>

<body>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <!-- Popper.JS -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
     <!-- Bootstrap JS -->
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<div class="wrapper">
  <nav id="sidebar">
<div class="sidebar-header">
  <h3>Menu</h3>
</div>
<br />
  <ul class="list-unstyled components">
    <li><a href="../Home.php"><i class="fas fa-home"></i>      Home</a></li>

    <li >
<a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-users"></i>      Customers</a>
<ul class="collapse list-unstyled" id="pageSubmenu">
  <li>
    <a href="../Customers/createCustomer.php">Create Customer</a>
  </li>
  <li>
    <a href="../Customers/searchCustomer.php">Search Customer</a>
  </li>
</ul>
</li>

    <li>
    <a href="../Appointments/appointments.php"><i class="far fa-calendar-check"></i></i>      Appointments</a></li>

    <li>

  <a href="#page2Submenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-home"></i>    Purchase orders</a>

      <ul class="collapse list-unstyled" id="page2Submenu">
          <li>
              <a href="../PurchaseOrders/viewPurchaseOrders.php">View Pending Purchase Orders</a>
          </li>
          <li>
              <a href="../PurchaseOrders/viewApprovedOrders.php">View Approved Purchase Orders</a>
          </li>

      </ul>

    </li>



  <li><a href="../Reviews/reviews.php"><i class="far fa-calendar-check"></i></i>      Reviews</a></li>
    <li >
                   <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-home"></i>Treatments</a>
                   <ul class="collapse list-unstyled" id="homeSubmenu">
                       <li>
                           <a href="../Treatments/createTreatment.php">Create Treatment</a>
                       </li>
                       <li>
                           <a href="../Treatments/searchTreatment.php">Search Treatment</a>
                       </li>

                   </ul>
               </li>





  </ul>


  </nav>


<div id="content">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <button type="button" id="sidebarCollapse" class="btn">
        <i class="fas fa-align-left"></i>
        <span>Toggle sidebar</span>
      </button>
      <button type="button" id="home" class="btn">
        <i class="fas fa-home"></i>
        <span  class="glyphicon glyphicon-home"><a href="../Home.php">Home</a></span>
      </button>
<img class="logo" src="../images/logo.png" />
<a class="log">Logged in as
  <?php
if ($_SESSION['loggedin'] = true){
  foreach($results as $rows){
  echo $rows['username'] ;
}}
else{
  $_SESSION['loggedin'] = false ;
} ?> </a>

<button type="button" class="btn">

  <span><a href="../logout.php">Logout</a></span>
    <i class="fas fa-sign-out-alt"></i>
</button>
    </div>
  </nav>

<script>
$(document).ready(function () {

  $('#sidebarCollapse').on('click', function () {
      $('#sidebar').toggleClass('active');
  });

});
</script>
