 
<?php
include '../../mysqli_connect.php';

$id = $_GET['id'];



$query = "DELETE  FROM  kurs_nomi WHERE id=$id;";
mysqli_query($dbc, $query);
header('newsy');

?>   