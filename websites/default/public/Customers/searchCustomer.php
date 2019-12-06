
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<?php
/*User must be logged into the server in order to view page*/
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

require '../functions/loadTemplate.php';
require '../config.php';
require '../header.php';

?>


<h2>Search Customer</h2>
<div class="search-bar">
<!--User is able to search through records for relevent record-->

<?php
echo '
<form action="searchCustomer.php" method="post">
<div class="search">
  <input id="search" onkeyup="showHint(this.value)" autocomplete="off" name="query" type="text" placeholder="Search " />
  <input id="submit" name="submit" type="submit" value="Search" />
  <input id="submit" name="clear" type="submit" value="clear" />
  <input id="submit" name="reset" type="submit" value="Reset"  />
  </div>
</form>
';
?>
</div>
<tbody id="tbodyid">

<?php

/*Selects all the customers records within the database and orders all the records by surname*/
  require '../templates/searchcustomer.html.php';
$results = $pdo->query('SELECT * FROM Customers ORDER BY Surname');
$i=1;

/*Displays all the records in there relevent headers*/
  foreach($results as $row){
    echo '<tr id="wrapper">'.
    '<td> <a>'. $i. '</a></td>'.
    '<td> <a>'.$row['Firstname'] .'</a></td>'.
    '<td><a>'. $row['Surname'].'</a></td>'.
    '<td><a>'.$row['Address_Line_1'] .'</a></td>'.
    '<td><a>'.$row['Address_Line_2'] .'</a></td>'.
    '<td><a>'.$row['Address_Line_3'] .'</a></td>'.
    '<td><a>'.$row['PostCode'] .'</a></td>'.
    '<td><a>'.$row['Telephone_Number'] .'</a></td>'.
    '<td><a>'.$row['Email_Address'] .'</a></td>'.
    '<td><a>'.$row['Username'] .'</a></td>'.
    '<td><a>'.$row['Password'] .'</a></td>'.
    '<td>'.'<ul class="actions">';
        echo '<li>.<a href="delete.php?id=' . $row['idCustomers'] .'">Delete</a>.</li>';
    echo '<li>.<a href="editCustomer.php?id=' . $row['idCustomers'] .'">Edit</a>.</li>';

         echo '</ul>.</td>';
  echo  '</tr>' ;
  $i++;
  }

/*If the user presses the reset button, the system will automatically re load all the files*/
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
/*Selects all the customers details within the customers table and orders them by Surname*/
require '../templates/searchcustomer.html.php';
$results = $pdo->query('SELECT * FROM Customers ORDER BY Surname');
$i=1;


foreach($results as $row){
  echo '<tr id="wrapper">'.
  '<td> <a>'. $i. '</a></td>'.
  '<td> <a>'.$row['Firstname'] .'</a></td>'.
  '<td><a>'. $row['Surname'].'</a></td>'.
  '<td><a>'.$row['Address_Line_1'] .'</a></td>'.
  '<td><a>'.$row['Address_Line_2'] .'</a></td>'.
  '<td><a>'.$row['Address_Line_3'] .'</a></td>'.
  '<td><a>'.$row['PostCode'] .'</a></td>'.
  '<td><a>'.$row['Telephone_Number'] .'</a></td>'.
  '<td><a>'.$row['Email_Address'] .'</a></td>'.
    '<td><a>'.$row['Username'] .'</a></td>'.
      '<td><a>'.$row['Password'] .'</a></td>'.
  '<td>'.'<ul class="actions">';
      echo '<li>.<a href="delete.php?id=' . $row['idCustomers'] .'">Delete</a>.</li>';
  echo '<li>.<a href="editCustomer.php?id=' . $row['idCustomers'] .'">Edit</a>.</li>';

       echo '</ul>.</td>';
echo  '</tr>' ;
$i++;
}

}

/*If the user was to submit the search it will search for any of the records in all its fields if it contains the
phrase*/
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
  require '../templates/searchcustomer.html.php';
$raw_results= $pdo->query('SELECT * FROM Customers WHERE
Firstname  LIKE "'.'%'.$query.'%'.'"
OR Surname LIKE "'.'%'.$query.'%'.'"
OR Address_Line_1 LIKE "'.'%'.$query.'%'.'"
OR Address_Line_2 LIKE "'.'%'.$query.'%'.'"
OR Address_Line_3 LIKE "'.'%'.$query.'%'.'"
OR PostCode LIKE "'.'%'.$query.'%'.'"
OR Telephone_Number LIKE "'.'%'.$query.'%'.'"
OR Email_Address LIKE "'.'%'.$query.'%'.'"
 '
);
$i=1;
foreach($raw_results as $row){
  echo '<tr id="wrapper">'.
  '<td> <a>'.$i .'</a></td>'.
  '<td> <a>'.$row['Firstname'] .'</a></td>'.
  '<td><a>'. $row['Surname'].'</a></td>'.
  '<td><a>'.$row['Address_Line_1'] .'</a></td>'.
  '<td><a>'.$row['Address_Line_2'] .'</a></td>'.
  '<td><a>'.$row['Address_Line_3'] .'</a></td>'.
  '<td><a>'.$row['PostCode'] .'</a></td>'.
  '<td><a>'.$row['Telephone_Number'] .'</a></td>'.
  '<td><a>'.$row['Email_Address'] .'</a></td>'.
    '<td><a>'.$row['Username'] .'</a></td>'.
      '<td><a>'.$row['Password'] .'</a></td>'.
  '<td>'.'<ul class="actions">';
      echo '<li>.<a href="delete.php?id=' . $row['idCustomers'] .'">Delete</a>.</li>';
  echo '<li>.<a href="editCustomer.php?id=' . $row['idCustomers'] .'">Edit</a>.</li>';

       echo '</ul>.</td>';
echo  '</tr>' ;
$i++;

}



}
/*If the user presses the clear button, the entire table will be removed*/
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
/*If the user is currently not logged in, they will be re directed to the log in page*/
else{
  header("location:../login.php");
}
?>
</tbody>

</table>
