<?php
  if($_SERVER['REQUEST_METHOD']=="GET"){
    header('Location:../index');


  }?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<?php 
  if($_SERVER['REQUEST_METHOD']=="POST"){
    $login=$_POST['login'];
$parol=$_POST['parol'];
$id=$_POST['id'];
  include '../mysqli_connect.php';
  $query = "SELECT * FROM hujjatt WHERE id='$id'";

  if ($r = mysqli_query($dbc, $query)) {
    while ($row = mysqli_fetch_array($r)) {
print "<body class='container'>
    <h3 class='text-muted'>
        Yangi OʼQISH JOYIDАN MАʼLUMOTNOMА Hujjat  qo'shish
    </h3>
    <form action='editt1.php' method='post' enctype='multipart/form-data'>
        <div class='row align-items-center'>
           
            <div class='col mt-4'><label for='ism'>F.I.O</label>
                <input type='text' id='ism' class='form-control' value=\"".$row['fio']."\" placeholder='F.I.O' name='fio'>
            </div>
            <div class='col mt-4'><label for='pinfl'>pinfl</label>
                <input type='text' id='pinfl' class='form-control' placeholder='pinfl' value=\"".$row['pinfl']."\" name='pinfl'>
            </div>
            <div class='col mt-4'><label for='ish1'>Tug‘ilgan sanasi </label>
                <input type='text' id='ish1' class='form-control' value=\"".$row['t_sana']."\" placeholder='07.02.2022' name='t_sana'>
            </div>
            <div class='col mt-4'><label for='stir'> Ta'lim turi</label>
                <input type='text' id='stir' class='form-control' value=\"".$row['talim_turi']."\" placeholder='Ta`lim turi' name='talim_turi'>
            </div>
            <div class='col mt-4'><label for='summa'>Ta`lim shakli </label>
                <input type='text' id='summa' class='form-control'value=\"".$row['talim_shakli']."\" placeholder='Ta`lim shakli ' name='talim_shakli'>
            </div>
            <div class='col mt-4'><label for='ish'>Qabul turi</label>
                <input type='text' id='ish' class='form-control' value=\"".$row['qabul_turi']."\" placeholder='Qabul turi' name='qabul_turi'>
            </div>
            <div class='col mt-4'><label for='ish1'> O‘qishga kirgan yili </label>
                <input type='text' id='ish1' class='form-control' value=\"".$row['kirgan_yili']."\" placeholder='2022' name='kirgan_yili'>
            </div>
            <div class='col mt-4'><label for='ish2'>Oliy ta`lim muassasasi </label>
                <input type='text' id='ish2' class='form-control' value=\"".$row['muassasa']."\" placeholder='Oliy ta`lim muassasasi ' name='muassasa'>
            </div>
                <div class='col mt-4'><label for='ish2'>Fakultet</label>
                <input type='text' id='ish2' class='form-control' value=\"".$row['fakultet']."\" placeholder='Fakultet  ' name='fakultet'>
            </div>
                 <div class='col mt-4'> <label for='ish2'>Yo‘nalish </label>
                <input type='text' id='ish2' class='form-control' value=\"".$row['yonalish']."\" placeholder='Yo‘nalish ' name='yonalish'>
            </div>
                 <div class='col mt-4'><label for='ish2'>O‘quv kursi</label>
                <input type='text' id='ish2' class='form-control' value=\"".$row['kurs']."\" placeholder='O‘quv kursi ' name='kurs'>
            </div>
   
            </div>
              <input type='hidden' name='numbers' value='".$row['numbers']."'>

            <input type='hidden' name='login' value='{$login}'>
    <input type='hidden' name='parol' value='{$parol}'>
    <input type='hidden' name='id' value='{$id}'>
            <input type='submit' class='btn btn-primary mt-4' value='Qo`shish'>
    </form>





    </form>
    </div>
    <div class='col-md-1'></div>
    </div>

    </div>


</body>";
  }}}
?>


</html>