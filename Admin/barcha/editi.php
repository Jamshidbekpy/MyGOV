<?php
    if ($_SERVER['REQUEST_METHOD'] == "GET") {

      header("Location:../index");
    }?>
<html lang="en">
<head>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Ilova edit</title>
</head>
<body>
  <?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $login=$_POST['login'];
  $parol=$_POST['login'];
  $id=$_POST['id'];
  $dn=$_POST['d'];
  echo "<h1 class='text-warning text-center'>$dn maskur diplom uchun ilova yaratamiz</h1>";
  include '../../mysqli_connect.php';
  print "<form action='editi1' method='post'>
  <table class='table container'>";
 

  $query = 'SELECT * FROM qayta_ta_f';

  if ($r = mysqli_query($dbc, $query)) {
    
  while ($row = mysqli_fetch_array($r)) {
    
   
print "<tr><td class='w-75'><label for='{$row['qisqa']}'>{$row['name']}</label> </td><td class='w-25'><input  class='form-control w-25' id='{$row['qisqa']}' ";

$query1 = "SELECT * FROM diplom_ilovasi where beriladigan_diplom_nomeri='$dn'";
if ($r1 = mysqli_query($dbc, $query1)) {
  
  while ($row1 = mysqli_fetch_array($r1)) {
 print " value='{$row1[$row['qisqa']]}'";

  }}

print " name='{$row['qisqa']}'></td></tr>";

  }
print "</table>
<input value='$dn' type='hidden' name='bdn'>
<div class='container'><button class='btn btn-primary' type='submit'>Ilova shakillantrish</button></div>
</form>";
}}


  ?>
</body>

</html>