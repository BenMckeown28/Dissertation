<?php
//Artworks of Scanhead   HNU 2017
require "../config.php";
$mydb = new db(); // create a new object, class db()

$conn = $mydb->connect();

if(isset($_POST["query"]))
{

$q = $_POST["query"];

$results = $conn->prepare("SELECT * FROM Reviews WHERE ReviewTitle LIKE '%" . $q . "%'
OR DateReviews LIKE '%".$q."%'
OR Username LIKE '%".$q."%'

");


}
else
{

 $results = $conn->prepare("SELECT * FROM Reviews ");

}

$results->execute();
while($row = $results->fetch(PDO::FETCH_ASSOC))
{
	 echo '<tr onclick="javascript:showRow(this);">' .
    '<td>' . $row['ReviewTitle'] . '</td>' .
    '<td>' . $row['DateReviews'] . '</td>' .
    '<td>' . $row['Username'] . '</td>' .
	'</tr>';
}


?>
