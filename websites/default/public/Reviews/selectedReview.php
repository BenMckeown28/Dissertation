<?php
/*If the user is logged into the system they will be given access to the page*/
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
require "../config.php";
require '../header.php';
   $review = $pdo->query('SELECT * FROM Reviews WHERE idReviews = '. $_GET['id'])->fetch()  ;
$id =$_GET['id'] ;
?>
<h2><?php echo $review['ReviewTitle'] .'-'. $review['idReviews']?> </h2>

<!--Form to view the review -->


<div class="POForm">
            <form action="" method="POST" >

                <input type="hidden" name="id" value="<?php echo $review['idReviews']; ?>" />
                <label>Review Title</label>
                <input class="form-control"  type="text" name="firstname" value="<?php echo $review['ReviewTitle']; ?>" />
                <br />
                <label>Review Content</label>
                <textarea class="form-control" row="50" col="50"  name="surname" /> <?php echo $review['ReviewDesc']; ?> </textarea>
                    <br />
                <label>Date posted</label>
                <input class="form-control"   type="text" name="addline1" value="<?php echo $review['DateReviews']; ?>" />
    <br />
                <label>Posted by</label>
                <input class="form-control"  type="text" name="addline2" value="<?php echo $review['Username']; ?>" />
    <br />
                <label>Status</label>
                <input class="form-control"   type="text" name="addline2" value="<?php echo $review['Approved']; ?>" />

              </form>
            </div>
<?php
}
else{
    header("location:../login.php");
}
?>
