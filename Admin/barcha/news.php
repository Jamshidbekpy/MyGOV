
<?php


if ($_SERVER['REQUEST_METHOD'] == "POST") {
  include '../../mysqli_connect.php';



  $nomi = mysqli_real_escape_string($dbc, $_POST['nomi']);
  $qisqa = mysqli_real_escape_string($dbc, $_POST['qisqa']);
  $qisqa = mysqli_real_escape_string($dbc, $_POST['soat']);
  $malumot = mysqli_real_escape_string($dbc, $_POST['malumot']);

  $query = "INSERT INTO qayta_ta_f(name, qisqa, malumot,soat) VALUES ('$nomi','$qisqa','$malumot','$soat');";
  mysqli_query($dbc, $query);
  $query1 = "ALTER TABLE diplom_ilovasi ADD $qisqa int(3)";
  mysqli_query($dbc, $query1);
  header("Location:newsy.php");
  $query = 'SELECT * FROM qayta_ta_f';

  if ($r = mysqli_query($dbc, $query)) {



  }
}

?>