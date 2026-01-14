
<?php


if ($_SERVER['REQUEST_METHOD'] == "POST") {
  include '../../mysqli_connect.php';



  $nomi = mysqli_real_escape_string($dbc, $_POST['nomi']);

  $query = "INSERT INTO kurs_nomi(name) VALUES ('$nomi');";
  mysqli_query($dbc, $query);

  header("Location:newsy");
}

?>