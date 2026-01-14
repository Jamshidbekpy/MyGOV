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
  $summa1=mysqli_real_escape_string($dbc, $_POST['summa1']);
    $ish_joyi1=mysqli_real_escape_string($dbc, $_POST['ish1']);
  $ish_b1=mysqli_real_escape_string($dbc, $_POST['ish_b1']);
  $ish_t1=mysqli_real_escape_string($dbc, $_POST['ish_t1']);
  $doljin1=mysqli_real_escape_string($dbc, $_POST['doljin1']);
  $otdel1=mysqli_real_escape_string($dbc, $_POST['otdel1']);
  $login=mysqli_real_escape_string($dbc, $_POST['login']);
  $parol=mysqli_real_escape_string($dbc, $_POST['parol']);

function encryptDateToUUID($date) {
  $hash = md5($date); // MD5 orqali xesh yaratamiz
    return substr($hash, 0, 4) . '-' . 
           substr($hash, 4, 4) . '-' . 
           substr($hash, 8, 4) . '-' . 
           substr($hash, 12, 4) . '-' . 
           substr($hash, 16, 4) . '-' . 
           substr($hash, 20, 4) . '-' . 
           substr($hash, 24, 4);
}

$currentDate = date('Y-m-d H:i:s');
$numbers = encryptDateToUUID($currentDate);
$currentDate1 = date('H:i:s');
$numbers1 = encryptDateToUUID($currentDate1); 
function generateFourDigitCode($number) {
    $hash = md5($number); // STIR dan xesh yaratamiz
    $digits = preg_replace('/[^0-9]/', '', $hash); // Faqat sonlarni ajratib olamiz
    return substr($digits, 0, 4); // Faqat birinchi 4 ta raqamni olamiz
}

$ariza_n=time();
$ariza_n=2*$ariza_n;
$ariza_n1=2*$ariza_n+1121;
$q_kod = generateFourDigitCode($pinfl);  
$q_kod1 = generateFourDigitCode($stir); 
$query="INSERT INTO hujjat(fio, pinfl, summa, oy, q_kod, numbers, stir, ariza_n, dates, ish_joyi, ish_b, ish_t, q_kod1, numbers1, ariza_n1, doljin, otdel, ish_joyi1, ish_b1, ish_t1, summa1, doljin1, otdel1) VALUES ('$fio', '$pinfl', '$summa', '$oy', '$q_kod', '$numbers', '$stir', '$ariza_n', '$currentDate','$ish_joyi','$ish_b', '$ish_t', '$q_kod1', '$numbers1', '$ariza_n1','$doljin', '$otdel','$ish_joyi1','$ish_b1', '$ish_t1', '$summa1','$doljin1', '$otdel1');";
mysqli_query($dbc,$query);
    print"<form class='needs-validation' novalidate action='../pdf' method='post'>
    <input type='hidden' name='numbers' value='{$numbers}'>
    <input type='hidden' name='login' value='{$login}'>
    <input type='hidden' name='parol' value='{$parol}'>
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