<?php
$page ='review';
require 'header.php';
  require 'config.php' ;


  $reviews = $pdo->query('SELECT * FROM Reviews WHERE Approved = "Approved" ');


echo '<br /><br /><h2>Reviews</h2> <br />' ;
foreach ($reviews as $rows){
  echo '<div class="card">';
  echo '<div class="card-body">';
  echo '<div class="row">';
  echo '<div class="col-md-2">';
  echo '<img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid" style="width:100px; height:100px;"   />';
  echo '</div>';
  echo    '<div class="col-md-10">';
  echo '<div class="clearfix"></div>';
echo '<ul>'.'<li>'.'<h3>'.$rows['ReviewTitle'].'</h3>'.'</li>'
.'<li>'.$rows['ReviewDesc'].'</li>'.
'<div class="float-right">'
.'<li> <a> Posted by:'.$rows['Username'].'</a> </li>'
.'<li> <a> Posted on:'.$rows['DateReviews'].' </a> </li>'.'
</div>'.
'</ul> <br /><br /><br />';
echo '  </div>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
}


 ?>



<i class="fas fa-user"></i>
<div class="reviewform">
<div class="col-xs-6">

 <h2>Submit a review:</h2>
 <form action="reviews.php" method="post">
   <div class="form-group">
<label>Firstname</label>
<input class="form-control" type="text" name="firstname" /><br />
</div>
   <div class="form-group">
<label>Surname</label>
<input class="form-control"type="text" name="surname" /><br />
</div>
<label>Email</label>
<input class="form-control"type="text" name="email" /><br />
   <label>Review Title</label>
<input class="form-control"type="text" name="title" /><br />
   <label>Review Content</label>
<textarea class="form-control" cols="90" rows="20" name="review" ></textarea><br />
<input class="form-control" type="submit" name="submit" />
 </form>

</div>

</div>





<?php


if (isset($_POST['submit'])) {



  if(isset($_SESSION['loggedin2'])==true){
$string = $_POST['title'];
$string2 =$_POST['review'];

$trimmed = file('bannedwordlist.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);


if(0 < count(array_intersect(array_map('strtolower', explode(' ', $string)), $trimmed)) OR 0 < count(array_intersect(array_map('strtolower', explode(' ', $string2)), $trimmed)) )
{
  echo 'contains offensive language, review was not published';
  false;
}



else{
  $stmt=$pdo->prepare('INSERT INTO Reviews(ReviewTitle,DateReviews,Username,ReviewDesc,Approved)
  VALUES (:ReviewTitle,:DateReviews,:username,:ReviewDesc,:Approved)');


$date= date('d/m/y');
$review = [
'ReviewTitle'=>$_POST['title'],
'DateReviews'=>$date,
'username'=>$_SESSION['username2'],
'ReviewDesc'=>$_POST['review'],
'Approved'=>'pending'
];



$stmt->execute($review);
echo 'Thank you for your time , the review is now being moderated';
}
}
else{
  echo 'Please login to leave a review';
}
}








require 'footer.php'; ?>
