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
<?php if($_SERVER['REQUEST_METHOD']=="POST"){
$login=$_POST['login'];
$parol=$_POST['parol'];
print "<body class='container'>
    <h3 class='text-muted'>
        Yangi Hujjat  qo'shish
    </h3>
    <form action='news.php' method='post' enctype='multipart/form-data'>
        <div class='row align-items-center'>
           
            <div class='col mt-4'><label for='ism'>F.I.O</label>
                <input type='text' id='ism' class='form-control' placeholder='F.I.O' name='fio'>
            </div>
            <div class='col mt-4'><label for='pinfl'>pinfl</label>
                <input type='text' id='pinfl' class='form-control' placeholder='pinfl' name='pinfl'>
            </div>
            
            <div class='col mt-4'><label for='stir'>STIR</label>
                <input type='text' id='stir' class='form-control' placeholder='stir' name='stir'>
            </div>
            <div class='col mt-4'><label for='summa'>Ish haqi oylik</label>
                <input type='text' id='summa' class='form-control' placeholder='summa' name='summa'>
            </div>
            <div class='col mt-4'><label for='ish'>Ish joyi</label>
                <input type='text' id='ish' class='form-control' placeholder='Ish joyi' name='ish'>
            </div>
            <div class='col mt-4'><label for='ish1'>Ishga kirgan vaqti</label>
                <input type='text' id='ish1' class='form-control' placeholder='07.02.2022' name='ish_b'>
            </div>
            <div class='col mt-4'><label for='ish2'>Ishdan bo'shagan vaqti</label>
                <input type='text' id='ish2' class='form-control' placeholder='До сих пор' name='ish_t'>
            </div>
            
            <div class='col mt-4'><label for='doljin'>            Должность  </label>
    


<input list='browsers' name='doljin' id='browser' class='form-control'>
  <datalist id='browsers'>
    <option value='Бухгалтер'>
    <option value='Бўлим бошлиғи'>
    
  </datalist>
</div>

<div class='col mt-4'><label for='otdel'> Отдел </label>
 <input list='browsers1'  id='browser1' class='form-control' name='otdel'>
  <datalist id='browsers1'>
    <option value='Бўлинма мавжуд эмас'>
  </datalist>
 </div>


<div class='col mt-4'><label for='summa1'>Ikkinchi Ish haqi oylik</label>
                <input type='text' id='summa1' class='form-control' placeholder='summa1' name='summa1'>
            </div>
            <div class='col mt-4'><label for='ish1'>Ikkinchi Ish joyi</label>
                <input type='text' id='ish1' class='form-control' placeholder='Ikkinchi Ish joyi' name='ish1'>
            </div>
            <div class='col mt-4'><label for='ish_b1'> Ikkinchi Ishga kirgan vaqti</label>
                <input type='text' id='ish_b1' class='form-control' placeholder='07.02.2022' name='ish_b1'>
            </div>
            <div class='col mt-4'><label for='ish_t2'>Ishdan bo'shagan vaqti</label>
                <input type='text' id='ish_t2' class='form-control' placeholder='До сих пор' name='ish_t1'>
            </div>
            
            <div class='col mt-4'><label for='doljin'>            Должность  </label>
    


<input list='browsers' name='doljin1' id='browser' class='form-control'>
  <datalist id='browsers'>
    <option value='Бухгалтер'>
    <option value='Бўлим бошлиғи'>
    
  </datalist>
</div>

<div class='col mt-4'><label for='otdel1'> Отдел </label>
 <input list='browsers1'  id='browser1' class='form-control' name='otdel1'>
  <datalist id='browsers1'>
    <option value='Бўлинма мавжуд эмас'>
  </datalist>
 </div>






            <div class='col mt-4'><label for='oy'>Nechi oylik ish haqida malumot kerak</label>
                <input type='text' id='oy' class='form-control' value='6' name='oy'>
             
            </div>
            <input type='hidden' name='login' value='{$login}'>
    <input type='hidden' name='parol' value='{$parol}'>
            <input type='submit' class='btn btn-primary mt-4' value='Qo`shish'>
    </form>





    </form>



    </div>
    <div class='col-md-1'></div>
    </div>

    </div>


</body>";
}
?>


</html>