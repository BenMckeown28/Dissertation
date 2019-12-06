<?php
$page='index';
require 'header.php';
?>

    <!-- Marketing messaging and featurettes
  ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

<?php
$topfive = $pdo->query('SELECT  * ,
             COUNT("Treatment_name") as a
    FROM     purchaseditems
    WHERE status = "approved"
    GROUP BY Treatment_name
    ORDER BY a DESC
    LIMIT    5

');

?>

  <h2 style="text-align:center; margin-top:5%;">Most popular treatments:</h2>


<div class="recommended">

<div class="row">

<?php
foreach ($topfive as $row){

echo '<ul>'.

'<li>'.$row['Treatment_name'].'</li>';
echo ' <svg class="bd-placeholder-img card-img-top" width="85%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect class="rectimg" width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
';

echo '<li> Price : £'.$row['price'].'</li>';
echo '<li> Treatment Category : '.$row['Category'].'</li>';
echo '<li> Estimated Time of Treatment :'.$row['Estimated_Time'].'</li>';



echo '</ul>';

}



?>

</div>

</div>





      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
          <img src="images/about.png" class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: ">
          <title>Placeholder</title>
          <h2>About</h2>
          <p>Here you will be able to read all about my business and what I have to offer.You will read about my background history within the beauty therapy departments and what treatments I have to offer.</p>
          <p><a class="btn" href="about.php" role="button">View details &raquo;</a></p>
        </div>
        <!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img src="images/treatment.png" class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: ">
          <h2>Treatments</h2>
          <p>Within this section you will be able to view a full list of all the Treatments which I have to offer. All the treatments shown will come with their own induvidual price lists and a short description of what is to offer.</p>
          <p><a class="btn " href="treatments.php" role="button">View Treatments &raquo;</a></p>
        </div>
        <!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img src="images/img.png" class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: ">
          <h2>Image Gallery</h2>
          <p>Here is some images of some of the treatments/products I use within my beauty therapy. Please make sure to check this out!</p>
          <p><a class="btn" href="gallery.php" role="button">View Images &raquo;</a></p>
        </div>
        <!-- /.col-lg-4 -->
      </div>
      <!-- /.row -->


      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">Massages... <span class="text-muted">Relax</span></h2>
          <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
        </div>
        <div class="col-md-5">
          <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500" src="images/Facial_image.png"
          />

        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7 order-md-2">
          <h2 class="featurette-heading">Facials... <span class="text-muted"></span></h2>
          <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
        </div>
        <div class="col-md-5 order-md-1">
          <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500" src="images/Facial_image_2.jpg"
          />
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">Waxing... <span class="text-muted"></span></h2>
          <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
        </div>
        <div class="col-md-5">
          <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500" src="images/Hot_Stone_image.png"
          />
        </div>
      </div>

      <hr class="featurette-divider">

      <!-- /END THE FEATURETTES -->

    </div>
    <!-- /.container -->


  <?php
require 'footer.php';
  ?>
