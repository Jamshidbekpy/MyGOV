<?php

   
if($_SERVER['REQUEST_METHOD']=="POST"){
      include '../mysqli_connect.php';


  $fio=mysqli_real_escape_string($dbc, $_POST['fio']);
  $pinfl=mysqli_real_escape_string($dbc, $_POST['pinfl']);
  $ariza_n=mysqli_real_escape_string($dbc, $_POST['ariza_n']);
  $stir=mysqli_real_escape_string($dbc, $_POST['stir']);
  $summa=mysqli_real_escape_string($dbc, $_POST['summa']);
  $oy=mysqli_real_escape_string($dbc, $_POST['oy']);
  $q_kod=mysqli_real_escape_string($dbc, $_POST['q_kod']);
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
  
function generateFourDigitCode($number) {
    $hash = md5($number); // STIR dan xesh yaratamiz
    $digits = preg_replace('/[^0-9]/', '', $hash); // Faqat sonlarni ajratib olamiz
    return substr($digits, 0, 4); // Faqat birinchi 4 ta raqamni olamiz
}


$q_kod = generateFourDigitCode($pinfl);  
      
$query="INSERT INTO hujjat(fio, pinfl, summa, oy, q_kod, numbers, stir, ariza_n, dates) VALUES ('$fio', '$pinfl', '$summa', '$oy', '$q_kod', '$numbers', '$stir', '$ariza_n', '$dates');";
mysqli_query($dbc,$query);
    print"<form class='needs-validation' novalidate action='ilova' method='post'>
    <input type='hidden' name='login' value='{$login}'>
<input type='hidden' name='parol' value='{$parol}'>
<input type='hidden' name='kurs_nomi' value='{$kurs_nomi}'>
<input type='text' name='oquv_r' value=\"".$oquv_r."\">
<input type='hidden' name='buyruq' value='{$buyruq}'>
<input type='hidden' name='beriladigan_diplom_nomeri' value='{$beriladigan_diplom_nomeri}'>

<input type='hidden' name='d' value='{$beriladigan_diplom_nomeri}'>
<input type='submit'  class='btn btn-warning' id='button1' value='edit' style='font-size:30px; font-weight:bold;float:right;   font-size:18px; margin:15px'> 
</form>
<script>
window.onload = function(){
document.getElementById('button1').click();
}
</script>
";



}

?>