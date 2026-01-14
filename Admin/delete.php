 
<?php
include '../../mysqli_connect.php';

$id = $_GET['id'];



$query = "DELETE  FROM  oquv_reja WHERE id=$id;";
mysqli_query($dbc, $query);
header('newsy');

?>   