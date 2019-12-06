<?php
/*if the user is currently logged into the session then they will be given access to the page*/
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
  require '../functions/loadTemplate.php';
  require '../config.php';
require '../header.php';
  require '../templates/archivedReviews.html.php';

?>

  <?php
  /*Selects all the reviews which are approved within the reviews table*/
$results= $pdo->query('SELECT * FROM Reviews WHERE Approved ="Archived"');
$numrows=$results->rowCount();
if ($numrows > 0) {
  foreach($results as $row){
    echo '<tr id="wrapper">';
    echo '<td>'.
  '<a href="selectedReview.php?id=' . $row['idReviews'] .'">View</a>'.
  '</td>'.
  '<td> <a>'.$row['ReviewTitle'] .'</a></td>'.
  '<td><a>'. $row['DateReviews'].'</a></td>'.
  '<td><a>'.$row['Username'] .'</a></td>' .
'<td><a>'.$row['Approved'] .'</a></td>' ;
  echo  '</tr>' ;
}
echo'</table>';
 ;

echo
"</form>";
}
else{
  echo 'No records to show';
}
  ?>




<!--if the user selects a review to peform an action on, they can either reject,approve or archive the review-->
<?php
if(isset ($_POST['Reject'])){
  $numberOfCheckbox = count($_POST['checkbox']);
  $i = 0;
  while($i<$numberOfCheckbox){
$keyToReject= $_POST['checkbox'][$i];
 $pdo->query('UPDATE Reviews SET Approved = "Rejected" WHERE idReviews = "'.$keyToReject.'"');
$i++;
  }
  echo "Review Rejected";
}
if(isset ($_POST['Approve'])){
  $numberOfCheckbox = count($_POST['checkbox']);
  $i = 0;
  while($i<$numberOfCheckbox){
$keyToApprove = $_POST['checkbox'][$i];
 $pdo->query('UPDATE Reviews SET Approved = "Approved" WHERE idReviews = "'.$keyToApprove.'"');
$i++;
  }
  echo "Review Approved";
}
if(isset ($_POST['Archive'])){
  $numberOfCheckbox = count($_POST['checkbox']);
  $i = 0;
  while($i<$numberOfCheckbox){
$keyToApprove = $_POST['checkbox'][$i];
 $pdo->query('UPDATE Reviews SET Approved = "Archived" WHERE idReviews = "'.$keyToApprove.'"');
$i++;
  }
  echo "Review Archived";
}


}
else{
    header("location:../login.php");
}
?>
</div>
</div>
