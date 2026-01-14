<?php

   
if($_SERVER['REQUEST_METHOD']=="POST"){
      include '../mysqli_connect.php';


  $fio=mysqli_real_escape_string($dbc, $_POST['fio']);
  $pinfl=mysqli_real_escape_string($dbc, $_POST['pinfl']);
  $stir=mysqli_real_escape_string($dbc, $_POST['stir']);
  $summa=mysqli_real_escape_string($dbc, $_POST['summa']);
  $oy=mysqli_real_escape_string($dbc, $_POST['oy']);
  $ish_joyi=mysqli_real_escape_string($dbc, $_POST['ish']);
  $ish_b=mysqli_real_escape_string($dbc, $_POST['ish_b']);
  $ish_t=mysqli_real_escape_string($dbc, $_POST['ish_t']);
  $doljin=mysqli_real_escape_string($dbc, $_POST['doljin']);
  $otdel=mysqli_real_escape_string($dbc, $_POST['otdel']);
  $numbers=mysqli_real_escape_string($dbc, $_POST['numbers']);
  $numbers1=mysqli_real_escape_string($dbc, $_POST['numbers1']);
  $id=mysqli_real_escape_string($dbc, $_POST['id']);
  $summa1=mysqli_real_escape_string($dbc, $_POST['summa1']);
  $ish_joyi1=mysqli_real_escape_string($dbc, $_POST['ish1']);
$ish_b1=mysqli_real_escape_string($dbc, $_POST['ish_b1']);
$ish_t1=mysqli_real_escape_string($dbc, $_POST['ish_t1']);
$doljin1=mysqli_real_escape_string($dbc, $_POST['doljin1']);
$otdel1=mysqli_real_escape_string($dbc, $_POST['otdel1']);

  $login=mysqli_real_escape_string($dbc, $_POST['login']);
  $parol=mysqli_real_escape_string($dbc, $_POST['parol']);
 
$query="UPDATE hujjat SET fio='$fio', pinfl='$pinfl', summa='$summa', oy='$oy', stir='$stir', ish_joyi='$ish_joyi', ish_b='$ish_b', ish_t='$ish_t', doljin='$doljin', otdel='$otdel', ish_joyi1='$ish_joyi1', ish_b1='$ish_b1', ish_t1='$ish_t1',summa1='$summa1', doljin1='$doljin1', otdel1='$otdel1' WHERE id='$id'";
mysqli_query($dbc,$query);

    print"<form class='needs-validation' novalidate action='../pdf' method='post'>
    <input type='hidden' name='login' value='{$login}'>
    <input type='hidden' name='parol' value='{$parol}'>
    <input type='hidden' name='numbers' value='{$numbers}'>
    <input type='hidden' name='numbers1' value='{$numbers1}'>
<input type='submit' value=''  id='button1' style='border:none' > 
</form>
<script>
window.onload = function(){
document.getElementById('button1').click();
}
</script>
";



}

?>