<?php
session_start();
require '../config.php';



?>

<!doctype html>
<html lang="en">

<head>
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v3.8.5">
  <title>Victoria Ward </title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/carousel/">
  <link rel="stylesheet" href="style.css" <!-- Bootstrap core CSS -->
  <link href="/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css" />
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="carousel.css" rel="stylesheet">
</head>

<body>
  <header>
    <nav class="logo">
      <img src="logo.png" />

    </nav>

    <nav class="navbar navbar-expand-md navbar-dark  bg-dark">


      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <?php

           ?>
          <li class="<?php
if($page == 'index') {echo 'active' ;}
           ?>">
            <a class=" nav-link" href="index.php">Home </a>
          </li>
          <li class="<?php
if($page == 'treatments') {echo 'active' ;}
           ?>">
            <a class="nav-link" href="treatments.php">Treatments</a>
          </li>
          <li class="<?php
if($page == 'price') {echo 'active' ;}
           ?>">
            <a class="nav-link" href="Price_list.php">Price List</a>
          </li>
          <li class="<?php
if($page == 'review') {echo 'active' ;}
           ?>">
            <a class="nav-link" href="reviews.php">Reviews</a>
          </li>

          <li class="<?php
if($page == 'about') {echo 'active' ;}
           ?>">
            <a class="nav-link" href="about.php">About</a>
          </li>

          <li class="<?php
if($page == 'image') {echo 'active' ;}
           ?>">
            <a class="nav-link" href="gallery.php">Images</a>
          </li>
          <li class="<?php
if($page == 'contact') {echo 'active' ;}
           ?>">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
        </ul>


<?php


if (isset($_SESSION['loggedin2'])== true) {
  $total=$pdo->query('SELECT * FROM pending_orders ');
  $totalrowcount = $total->rowCount();
  ?>
  <div class="count">
    <a> <?php echo $totalrowcount ?></a>
  </div>

  <?php
echo    '<i class="fas fa-shopping-cart"></i><a class="write nav-link" href="shoppingcart.php">Shopping cart</a>';
  echo
   '<i class="fas fa-user"></i>
<div class="logged">
   <a class="nav-link">Logged in as';

          $results = $pdo->query('SELECT * FROM Customers WHERE Username = "'.$_SESSION['username2'].'"');
          foreach($results as $row){
                    echo '<a class="write">'.$row['Username'].'</a>' ;

        }
          ?>

        </div>
    <button class="login btn my-2 my-sm-0" type="submit" onclick="location.href='logout.php'">Logout</button>
      <button class="login btn my-2 my-sm-0" type="submit" onclick="location.href='portal.php?id=<?php echo $row['idCustomers']; ?>'">Portal</button>

      <?php
    }
if (!isset($_SESSION['loggedin2']) || $_SESSION['loggedin2'] != true){
         ?>



       </a>

        <button class="login btn my-2 my-sm-0" type="submit" onclick="location.href='login.php'">Login   </button>

      </div>
      <?php
}
      ?>
    </nav>
  </header>

  <main role="main">

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="bd-placeholder-img" style="display:flex; justify-content:center;" src="images/blur.jpg"  height="500px" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" />

          <div class="container">
            <div class="carousel-caption text-left">
              <h1>Register with us today!</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-lg btn-primary" href="register.php" role="button">Sign up today</a></p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img class="bd-placeholder-img" src="images/blur2.jpg"   height="500px" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#777"/></svg>
          <div class="container">
            <div class="carousel-caption">
              <h1>Learn more about me!</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-lg btn-primary" href="about.php" role="button">Learn more</a></p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img class="bd-placeholder-img" src="images/blur3.jpg"  height="500px" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#777"/></svg>
          <div class="container">
            <div class="carousel-caption text-right">
              <h1>Browse our image gallery!</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-lg btn-primary" href="gallery.php" role="button">Browse gallery</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
      <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    </div>
