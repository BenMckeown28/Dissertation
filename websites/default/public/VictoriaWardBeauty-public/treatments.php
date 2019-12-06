<?php
$page = 'treatments';
require 'header.php';
require 'config.php';
?>
    <main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Treatments</h1>
          <p class="lead text-muted">A Full list of all the treatments Victoria Ward Beauty Therapy has to offer</p>

        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container">
          <h2>Waxing</h2>
  <div class="row">
          <?php

$waxing=$pdo->query('SELECT * FROM Treatments WHERE Category = "Waxing"');
foreach($waxing as $row){

  echo '<div class="col-md-4">
    <div class="card mb-4 shadow-sm">

      <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect class="rectimg" width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
      <div class="card-body">
        <a href="treatmentsind.php?id='.$row['idTreatments'].'" class="card-text">'.$row['Treatment_name']. '</a>
        <div class="d-flex justify-content-between align-items-center">
          <div class="btn-group">
          </div>
        </div>
      </div>
    </div>
  </div>' ;

}

           ?>

          <h2>Eyelash & Eybrow Treatments </h2>
          <div class="row">

            <?php

  $Eyelash=$pdo->query('SELECT * FROM Treatments WHERE Category = "Eyelash & Eyebrow Treatments"');
  foreach($Eyelash as $row){

    echo '<div class="col-md-4">
      <div class="card mb-4 shadow-sm">
        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect class="rectimg" width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
        <div class="card-body">
          <a href="treatmentsind.php?id='.$row['idTreatments'].'"  class="card-text">'.$row['Treatment_name']. '</a>
          <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
            </div>
          </div>
        </div>
      </div>
    </div>';

  }

             ?>
    <div class="row">
    <h2>Hand/Foot & Gel Treatments</h2>
    <div class="row">

      <?php

    $handfoot=$pdo->query('SELECT * FROM Treatments WHERE Category = "Hand/Foot & Gel Treatments"');
    foreach($handfoot as $row){

    echo '<div class="col-md-4">
    <div class="card mb-4 shadow-sm">
    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect class="rectimg" width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
    <div class="card-body">
    <a href="treatmentsind.php?id='.$row['idTreatments'].'"  class="card-text">'.$row['Treatment_name']. '</a>
    <div class="d-flex justify-content-between align-items-center">
      <div class="btn-group">
      </div>
    </div>
    </div>
    </div>
    </div>
    '
    ;

    }

       ?>









            <h2>Massage</h2>
            <div class="row">
<?php


$handfoot=$pdo->query('SELECT * FROM Treatments WHERE Category = "Massage"');
foreach($handfoot as $row){

      echo '<div class="col-md-4">
        <div class="card mb-4 shadow-sm">
          <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect class="rectimg" width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
          <div class="card-body">
            <a href="treatmentsind.php?id='.$row['idTreatments'].'"  class="card-text">'.$row['Treatment_name']. '</a>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
              </div>
            </div>
          </div>
        </div>
      </div>' ;

    }
?>

    <div class="row">
          <h2>Facials</h2>
          <div class="row">

<?php
$facials=$pdo->query('SELECT * FROM Treatments WHERE Category = "Facials"');
foreach($facials as $row){

      echo '<div class="col-md-4">
        <div class="card mb-4 shadow-sm">
          <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect class="rectimg" width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
          <div class="card-body">
            <a href="treatmentsind.php?id='.$row['idTreatments'].'"  class="card-text">'.$row['Treatment_name']. '</a>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
              </div>
            </div>
          </div>
        </div>
      </div>' ;

    }

?>
    <div class="row">
          <h2 class="h2">Holistic Treatments</h2>
              <div class="row">
          <div class="row">

            <?php
            $holistic=$pdo->query('SELECT * FROM Treatments WHERE Category = "Holistic Treatments"');
            foreach($holistic as $row){

                  echo '<div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                      <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect class="rectimg" width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                      <div class="card-body">
                        <a href="treatmentsind.php?id='.$row['idTreatments'].'"  class="card-text">'.$row['Treatment_name']. '</a>
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="btn-group">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>' ;

                }

            ?>
</div>
</div>
          </div>
        </div>
      </div>

    </main>

<?php
require 'footer.php';
?>
