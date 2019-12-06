<?php
/*Table to view all the reviews within the system
If user is not logged in then they will not be given access to the page*/
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
  require '../functions/loadTemplate.php';
  require '../config.php';
require '../header.php';
  require '../templates/reviews.html.php';

?>

  <?php
  /*Selects all the records from the reviews table where the status is set to pending*/
$results= $pdo->query('SELECT * FROM Reviews WHERE Approved ="pending"');
$numrows=$results->rowCount();
if($numrows > 0){
  foreach($results as $row){
    echo '<tr id="wrapper">';
    echo '<td>'.
  '<a href="selectedReview.php?id=' . $row['idReviews'] .'">View</a>'.
  '</td>'.
    '<td> <a>'.$row['ReviewTitle'] .'</a></td>'.
    '<td><a>'. $row['DateReviews'].'</a></td>'.
    '<td><a>'.$row['Username'] .'</a></td>' ;
    echo "<td>".
    "<form method='post' action='viewReviews.php'>
  ".
    "<input type='hidden' name='id' value= ".$row['idReviews']." />".

    "<input type='checkbox' name='checkbox[]' value=".$row['idReviews']." />".
"</td>" ;
  echo  '</tr>' ;
}
echo'</table>';
echo '<div class="revbuttons">'.'<ul class="container">'
 ;


echo'<td>'.'<li>'.'<input class="submit" type="submit" name="Reject" value="Reject"'.'</li>'.'</td>';
echo'<td>'.'<li>'.'<input class="submit"  type="submit" name="archived" value="Archive"'.'</li>'.'</td>';
echo'<td>'.'<li>'.'<input class="submit" type="submit" name="Approve" value="Approve"'.'</li>'.'</td>';
echo '</ul>'.'</div>'.
"</form>";
}
else{
  echo 'no records to show';
}
  ?>




<?php
/*Actions which the user can do when they are viewing the page*/
if(isset ($_POST['Reject'])){
  $numberOfCheckbox = count($_POST['checkbox']);
  $i = 0;
  while($i<$numberOfCheckbox){
$keyToReject = $_POST['checkbox'][$i];
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



if(isset ($_POST['archived'])){
  $numberOfCheckbox = count($_POST['checkbox']);
  $i = 0;
  while($i<$numberOfCheckbox){
$keyToArchive = $_POST['checkbox'][$i];
 $pdo->query('UPDATE Reviews SET Approved = "Archived" WHERE idReviews = "'.$keyToArchive.'"');
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
