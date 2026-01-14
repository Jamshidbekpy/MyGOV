 
<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include '../../mysqli_connect.php';


    $name = mysqli_real_escape_string($dbc, $_POST['name']);
  

    $id = $_POST['id'];



    $query = "UPDATE muassasa SET name='$name' WHERE id='$id'";

    mysqli_query($dbc, $query);


    header('Location:newsy');
}
?>