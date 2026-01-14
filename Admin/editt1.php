<?php

   
if($_SERVER['REQUEST_METHOD']=="POST"){
      include '../mysqli_connect.php';


 $fio=strtoupper(mysqli_real_escape_string($dbc, $_POST['fio']));

  $pinfl=mysqli_real_escape_string($dbc, $_POST['pinfl']);
  $t_sana=mysqli_real_escape_string($dbc, $_POST['t_sana']);
  $talim_turi=mysqli_real_escape_string($dbc, $_POST['talim_turi']);
  $talim_shakli=mysqli_real_escape_string($dbc, $_POST['talim_shakli']);
  $qabul_turi=mysqli_real_escape_string($dbc, $_POST['qabul_turi']);
  $kirgan_yili=mysqli_real_escape_string($dbc, $_POST['kirgan_yili']);
  $muassasa=mysqli_real_escape_string($dbc, $_POST['muassasa']);
  $fakultet=mysqli_real_escape_string($dbc, $_POST['fakultet']);
  $yonalish=mysqli_real_escape_string($dbc, $_POST['yonalish']);
  $kurs=mysqli_real_escape_string($dbc, $_POST['kurs']);
  $login=mysqli_real_escape_string($dbc, $_POST['login']);
  $parol=mysqli_real_escape_string($dbc, $_POST['parol']);
  $id=mysqli_real_escape_string($dbc, $_POST['id']);
  $numbers=mysqli_real_escape_string($dbc, $_POST['numbers']);
$query="UPDATE hujjatt SET fio='$fio', pinfl='$pinfl',t_sana='$t_sana', talim_turi='$talim_turi', talim_shakli='$talim_shakli', qabul_turi='$qabul_turi',kirgan_yili='$kirgan_yili', muassasa='$muassasa', fakultet='$fakultet', yonalish='$yonalish',dates=NOW(), kurs='$kurs' WHERE id='$id'";
mysqli_query($dbc,$query);

    print"<form class='needs-validation' novalidate action='../pdff' method='post'>
    <input type='hidden' name='login' value='{$login}'>
    <input type='hidden' name='parol' value='{$parol}'>
    <input type='hidden' name='numbers' value='{$numbers}'>
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