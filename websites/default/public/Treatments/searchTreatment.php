<?php

session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

require '../functions/loadTemplate.php';
require '../config.php';
require '../header.php';


?>
<h2>Search Treatments</h2>


<div class="search">
<form action="searchTreatment.php" method="post">
  <input id="myinput" onkeyup="searchFunction()" autocomplete="off" name="query" type="text" placeholder="Type here" />
    <input id="submit" name="submit" type="submit" value="Search" />
  <input id="submit" name="clear" type="submit" value="clear" />
  <input id="submit" name="reset" type="submit" value="Reset"  />

</form>

</div>
<tbody id="tb">
<?php
  require '../templates/searchtreatment.html.php';
$same = $pdo->query('SELECT * FROM Treatments ');
$i=1;
foreach($same as $row){

  echo '<tr id="wrapper">'.'<td><a>'.$i.'</a>
  </td>'.
  '<td> <a>'.$row['Treatment_name'] .'</a></td>'.
  '<td><a>'.$row['price'] .'</a></td>'.
    '<td><a>'.$row['Date_Added'] .'</a></td>'.
  '<td>'.'<ul class="actions">';
    echo '<li>.<a href="deleteTreatment.php?id=' . $row['idTreatments'] .'">Delete</a>.</li>';
  echo '<li>.<a href="editTreatment.php?id=' . $row['idTreatments'] .'">Edit</a>.</li>';

       echo '</td>';
echo  '</tr>' ;
$i++;
}
?>


<?php

if(isset($_POST['reset'])){
  ?>
  <script>
  var Parent = document.getElementById("tableid");
  while(Parent.hasChildNodes())
  {
     Parent.removeChild(Parent.firstChild);
  }

  </script>
  <?php
  require '../templates/searchtreatment.html.php';
$same = $pdo->query('SELECT * FROM Treatments ');
$i=1;
foreach($same as $row){

  echo '<tr id="wrapper">'.'<td><a>'.$i.'</a>
  </td>'.
  '<td> <a>'.$row['Treatment_name'] .'</a></td>'.
  '<td><a>'.$row['price'] .'</a></td>'.
    '<td><a>'.$row['Date_Added'] .'</a></td>'.
  '<td>'.'<ul class="actions">';
    echo '<li>.<a href="deleteTreatment.php?id=' . $row['idTreatments'] .'">Delete</a>.</li>';
  echo '<li>.<a href="editTreatment.php?id=' . $row['idTreatments'] .'">Edit</a>.</li>';

       echo '</td>';
echo  '</tr>' ;
$i++;
}
}




if(isset($_POST['submit'])){

  $query = $_POST['query'];
  $query = htmlspecialchars($query);
?>
<script>
var Parent = document.getElementById("tableid");
while(Parent.hasChildNodes())
{
   Parent.removeChild(Parent.firstChild);
}

</script>
<?php
  require '../templates/searchTreatment.html.php';
  $raw_results= $pdo->query('SELECT * FROM Treatments WHERE
  Treatment_name  LIKE "'.'%'.$query.'%'.'"
  OR Treatment_description LIKE "'.'%'.$query.'%'.'"
  OR price LIKE "'.'%'.$query.'%'.'"
   '
  );
  $results=$raw_results ;
$i=1;

foreach($results as $row){
  echo '<tr id="wrapper">'.
  '<td> <a>'.$i .'</a></td>'.
  '<td> <a>'.$row['Treatment_name'] .'</a></td>'.
  '<td><a>'.$row['price'] .'</a></td>'.
    '<td><a>'.$row['Date_Added'] .'</a></td>'.
    '<td>'.'<ul class="actions">';
    echo '<li>.<a href="deleteTreatment.php?id=' . $row['idTreatments'] .'">Delete</a>.</li>';
  echo '<li>.<a href="editTreatment.php?id=' . $row['idTreatments'] .'">Edit</a></li>';

       echo '</ul>.</td>';
echo  '</tr>' ;
$i++;
}
}
if(isset($_POST['clear'])){
?>
<script>
var table = document.getElementById('table');
var row = document.getElementsByTagName('tbody')[0];
function deleteRow () {
    row.parentNode.removeChild(row);
};
deleteRow ();
</script>

<?php
}
}
else{
    header("location:../login.php");
}
?>
</tbody>
</table>
<?php

?>
