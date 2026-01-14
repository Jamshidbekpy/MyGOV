
<?php


if ($_SERVER['REQUEST_METHOD'] == "POST") {
  include '../../mysqli_connect.php';



  $nomi = mysqli_real_escape_string($dbc, $_POST['nomi']);
  $login = mysqli_real_escape_string($dbc, $_POST['login']);
  $parol = mysqli_real_escape_string($dbc, $_POST['parol']);
  $q =explode(" ",$nomi);
  $q1=count($q);
  $qisqa=$q[0].$q1;
  
  $soat = mysqli_real_escape_string($dbc, $_POST['soat']);
  $malumot = mysqli_real_escape_string($dbc, $_POST['malumot']);

  $query = "INSERT INTO qayta_ta_f(name, qisqa, malumot,soat) VALUES ('$nomi','$qisqa','$malumot','$soat');";
  mysqli_query($dbc, $query);
  $query1 = "ALTER TABLE diplom_ilovasi ADD $qisqa int(3)";
  mysqli_query($dbc, $query1);
  print"<form class='needs-validation' novalidate action='newsy' method='post'>
    <input type='hidden' name='login' value='{$login}'>
<input type='hidden' name='parol' value='{$parol}'>
<input type='submit'  class='btn btn-warning' id='button1' value='edit' style='font-size:30px; font-weight:bold;float:right;   font-size:18px; margin:15px'> 
</form>
<script>
window.onload = function(){
    document.getElementById('button1').click();
  }
</script>
";}


?>