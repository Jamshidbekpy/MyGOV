<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Ilova to'ldirish</title>
</head>
<body>
    
<?php
   if ($_SERVER['REQUEST_METHOD'] == "POST") {
       include '../mysqli_connect.php';
    $dn= $_POST['d'];
    $login=$_POST['login'];
$parol=$_POST['parol'];
$buyruq=$_POST['buyruq'];

$oquv_r=$_POST['oquv_r'];

$kurs_nomi=mysqli_real_escape_string($dbc, $_POST['kurs_nomi']);
$beriladigan_diplom_nomeri=$_POST['beriladigan_diplom_nomeri'];

    echo "<h1 class='text-warning text-center'>$dn maskur diplom uchun ilova yaratamiz</h1>";
        $query = 'SELECT * FROM qayta_ta_f';

        if ($r = mysqli_query($dbc, $query)) {
            print "<form action='#' method='get'>
            <table class='table container'>";
        while ($row = mysqli_fetch_array($r)) {

print "<tr><td class='w-75'><label for='{$row['qisqa']}'>{$row['name']}</label> </td><td class='w-25'><input  class='form-control w-25' id='{$row['qisqa']}' name='{$row['qisqa']}' max='100' min='0' type='number' maxlength='3' ></td></tr>";

        }
    print "</table>
    <input type='hidden' name='login' value='{$login}'>
    <input type='hidden' name='parol' value='{$parol}'>
    
<input type='hidden' name='buyruq' value='{$buyruq}'>
<input type='hidden' name='beriladigan_diplom_nomeri' value='{$beriladigan_diplom_nomeri}'>
<input type='hidden' name='kurs_nomi' value='{$kurs_nomi}'>

<input type='hidden' name='oquv_r' value=\"".$oquv_r."\">
    <input value='$dn' type='hidden' name='bdn'>
    <div class='container'><button class='btn btn-primary' type='submit'>Ilova shakillantrish</button></div>
    </form>";
    }
   }
   else if($_SERVER['REQUEST_METHOD']=="GET"){
    include '../mysqli_connect.php';
$dn=$_GET['bdn'];
$login=$_GET['login'];
$parol=$_GET['parol'];

$oquv_r=$_GET['oquv_r'];

$kurs_nomi=mysqli_real_escape_string($dbc, $_GET['kurs_nomi']);
$buyruq=$_GET['buyruq'];
$beriladigan_diplom_nomeri=$_GET['beriladigan_diplom_nomeri'];

$query = 'SELECT * FROM qayta_ta_f';
if ($r = mysqli_query($dbc, $query)) {
$t="";
while ($row = mysqli_fetch_array($r)) {
$a=$_GET["{$row['qisqa']}"];
$b=$row['qisqa'];
$t.=$b." ";
$query2="UPDATE diplom_ilovasi SET $b='$a' WHERE beriladigan_diplom_nomeri='$dn'";
mysqli_query($dbc, $query2); 
}

}
print"<form class='needs-validation' novalidate action='login' method='post'>
<input type='hidden' name='login' value='{$login}'>
<input type='hidden' name='parol' value='{$parol}'>
<input type='hidden' name='kurs_nomi' value='{$kurs_nomi}'>
<input type='text' name='oquv_r' value=\"".$oquv_r."\">
<input type='hidden' name='buyruq' value='{$buyruq}'>
<input type='hidden' name='beriladigan_diplom_nomeri' value='{$beriladigan_diplom_nomeri}'>
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
       

