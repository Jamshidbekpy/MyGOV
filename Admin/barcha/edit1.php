 
<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include '../../mysqli_connect.php';


    $fio=mysqli_real_escape_string($dbc, $_POST['fio']);
    $t_yil=mysqli_real_escape_string($dbc, $_POST['t_yil']);
    $pasport=mysqli_real_escape_string($dbc, $_POST['pasport']);
    $jins=mysqli_real_escape_string($dbc, $_POST['jins']);
    $oquv_r=mysqli_real_escape_string($dbc, $_POST['oquv_r']);
    $kurs_nomi=mysqli_real_escape_string($dbc, $_POST['kurs_nomi']);
    $kurs_bolanishi=mysqli_real_escape_string($dbc, $_POST['kurs_bolanishi']);
    $kurs_tugashi=mysqli_real_escape_string($dbc, $_POST['kurs_tugashi']);
    $viloyat=mysqli_real_escape_string($dbc, $_POST['viloyat']);
    $tuman=mysqli_real_escape_string($dbc, $_POST['tuman']);
    $talim_m=mysqli_real_escape_string($dbc, $_POST['talim_m']);
    $tugatgan_o_y=mysqli_real_escape_string($dbc, $_POST['tugatgan_o_y']);
    $diplom_seriyasi=mysqli_real_escape_string($dbc, $_POST['diplom_seriyasi']);
    $diplom_boyicha_m=mysqli_real_escape_string($dbc, $_POST['diplom_boyicha_m']);
    $bitiruv_ishi_m=mysqli_real_escape_string($dbc, $_POST['bitiruv_ishi_m']);
    $beriladigan_diplom_nomeri=mysqli_real_escape_string($dbc, $_POST['beriladigan_diplom_nomeri']);
    $baho=mysqli_real_escape_string($dbc, $_POST['baho']);
    $buyruq=mysqli_real_escape_string($dbc, $_POST['buyruq']);

    $id = $_POST['id'];

    $login=$_POST['login'];
    $parol=$_POST['parol'];

    $query = "UPDATE  diplom_sh SET     fio='$fio', t_yil='$t_yil', pasport='$pasport', jins='$jins', oquv_r='$oquv_r',  kurs_nomi='$kurs_nomi', kurs_bolanishi='$kurs_bolanishi', kurs_tugashi='$kurs_tugashi', viloyat='$viloyat', tuman='$tuman', talim_m='$talim_m',  tugatgan_o_y='$tugatgan_o_y', diplom_seriyasi='$diplom_seriyasi', diplom_boyicha_m='$diplom_boyicha_m', bitiruv_ishi_m='$bitiruv_ishi_m', beriladigan_diplom_nomeri='$beriladigan_diplom_nomeri',baho='$baho',buyruq='$buyruq' WHERE id='$id'";

    mysqli_query($dbc, $query);
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
";
}
?>