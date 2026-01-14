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
    <title>Diplom to'ldirish</title>
</head>
<body>
  <?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $login=$_POST['login'];
  $parol=$_POST['login'];
  $id=$_POST['id'];
  include '../../mysqli_connect.php';
  $query = "SELECT * FROM diplom_sh  WHERE id=$id;";

  if ($r = mysqli_query($dbc, $query)) {
    while ($row1 = mysqli_fetch_array($r)) {
      if (!empty('../../uploude/'.$row1['beriladigan_diplom_nomeri'].".pdf")) {
        echo "";
      }
      else{
        unlink('../../uploude/'.$row1['beriladigan_diplom_nomeri'].".pdf");
      }
  


    
      print "<div class='container'>


      <form class='needs-validation' novalidate action='edit1' method='post'>
      <input type='hidden' name='login' value='{$login}'>
<input type='hidden' name='parol' value='{$parol}'>
      <div class='form-row'>
        <div class='col-md-4 mb-3'>
          <label for='validationCustom01'>FIO</label>
          <input type='text' class='form-control' id='validationCustom01' name='fio'  value=\"".$row1['fio']."\" required>
          <div class='valid-feedback'>
            yaxshi!
          </div>
        </div>
        <div class='col-md-4 mb-3'>
          <label for='validationCustom02'>Tug'ilgan vaqti</label>
          <input type='date' class='form-control' id='validationCustom02' name='t_yil' value='{$row1['t_yil']}' required>
          <div class='valid-feedback'>
            yaxshi!
          </div>
        </div>  <div class='col-md-4 mb-3'>
        <label for='validationCustom022'>Pasport</label>
        <input type='text' class='form-control' id='validationCustom022' name='pasport' value='{$row1['pasport']}' required>
        <div class='valid-feedback'>
          yaxshi!
        </div>
      </div>

      <div class='row'>
     
     
     
        <div class='col-md-4 mb-3'><label for='mavzu_name'>O'quv reja</label>
                    <select id='mavzu_name' class='custom-select w-100' name='oquv_r'>";
        include '../../mysqli_connect.php';
        $query = 'SELECT * FROM oquv_reja';

        $r = mysqli_query($dbc, $query);
        while ($row = mysqli_fetch_array($r)) {
             print" <option  value=\"".$row['name']."\">{$row['name']}</option>";
        }
       print " </select>
      
       
      </div> 
    
      <div class='col-md-4 mb-3'><label for='mavzu_name'>Qayta tayyorlash kurs nomi</label>
      <select id='mavzu_name' class='custom-select w-100' name='kurs_nomi'>";
include '../../mysqli_connect.php';
$query = 'SELECT * FROM kurs_nomi';

$r = mysqli_query($dbc, $query);
while ($row = mysqli_fetch_array($r)) {
print" <option value=\"".$row['name']."\">{$row['name']}</option>";
}
print " </select>


</div> 
      


      </div>
      <div class='form-row'>
      <div class='col-md-4 mb-3 '>
        <label for='validationCustom0e'>Erkak
        <input type='radio' class='form-control' checked id='validationCustom0e' name='jins' value='erkak'></label>
        <label for='validationCustom011'>Ayol
        <input type='radio' class='form-control' id='validationCustom011' name='jins' value='Ayol'></label>
      
        </div>  
        <div class='col-md-4 mb-3'>
        <label for='validationCustom02'>Kurs boshlanish vaqti</label>
        <input type='date' class='form-control' id='validationCustom02' name='kurs_bolanishi' value='{$row1['kurs_bolanishi']}' required>
        <div class='valid-feedback'>
          yaxshi!
        </div></div>
        <div class='col-md-4 mb-3'>
        <label for='validationCustom02'>Kurs tugash vaqti</label>
        <input type='date' class='form-control' id='validationCustom02' name='kurs_tugashi' value='{$row1['kurs_tugashi']}' required>
        <div class='valid-feedback'>
          yaxshi!
        </div></div>
        <div class='col-md-4 mb-3'>
          <label for='validationCustom0v'>Viloyat</label>
          <select class='custom-select' onchange='myf()' id='validationCustom0v' name='viloyat'  value='{$row1['viloyat']}' required>
     
          <option selected value='Toshkent' >Toshkent</option>
          <option value='Toshkent viloyati' >Toshkent viloyati</option>
          <option value='Buxoro' >Buxoro</option>
          <option value='Samarqand' >Samarqand</option>
          <option value='Jizzax' >Jizzax</option>
          <option value='Navoiy' >Navoiy</option>
          <option value='Qashqadaryo' >Qashqadaryo</option>
          <option value='Farg`ona' >Farg`ona</option>
          <option value='Namangan' >Namangan</option>
          <option value='Andijon' >Andijon</option>
          <option value='Surxondaryo' >Surxondaryo</option>
          <option value='Xorazm' >Xorazm</option>
          <option value='Sirdaryo' >Sirdaryo</option>
          <option value='Qoraqalpog`iston Respublikasi' >Qoraqalpog`iston Respublikasi</option>
          </select>
          <div class='invalid-feedback'>
          Viloyat Tanlanmadi
          </div>
        </div>
        <div class='col-md-4 mb-3'>
        <label for='validationCustom0t'>Tuman</label>
      
        <input type='text' class='form-control' id='validationCustom0t' value=\"".$row1['tuman']."\" name='tuman' required>
      
  
        <div class='invalid-feedback'>
        Tuman Tanlanmadi
        </div>
      </div>
        <div class='col-md-4 mb-3'>
        <label for='validationCustom0tm'>Ta'lim muassasasi</label>
        <input type='text' class='form-control' id='validationCustom0tm' name='talim_m' value=\"".$row1['talim_m']."\"  required>
        <div class='invalid-feedback'>
          Muassasa kiritilmadi.
        </div>
      </div>
   
    <div class='col-md-4 mb-3'>
    <label for='validationCustom0toy'>Tugatgan oliy yurti</label>
    <input type='text' class='form-control' name='tugatgan_o_y' id='validationCustom0toy'  value=\"".$row1['tugatgan_o_y']."\" required>
    <div class='invalid-feedback'>
    tugantgan oliy yurti kiritilmadi.
    </div>
  </div>
  <div class='col-md-4 mb-3'>
  <label for='validationCustom0ds'>Diplom seriyasi</label>
  <input type='text' class='form-control' name='diplom_seriyasi' id='validationCustom0ds' value='{$row1['diplom_seriyasi']}' required>
  <div class='invalid-feedback'>
  tugantgan oliy yurti kiritilmadi.
  </div>
</div>
<div class='col-md-4 mb-3'>
<label for='validationCustom0dbm'>Diplom boyicha mutaxasisligi</label>
<input type='text' class='form-control' name='diplom_boyicha_m' value=\"".$row1['diplom_boyicha_m']."\" id='validationCustom0dbm' required>
<div class='invalid-feedback'>
tugantgan oliy yurti kiritilmadi.
</div>
</div>
<div class='col-md-3 mb-3'>
<label for='validationCustom0bi'>Bitiruv ishi</label>
<input type='text' class='form-control' name='bitiruv_ishi_m' id='validationCustom0bi'  value=\"".$row1['bitiruv_ishi_m']."\" required>
<div class='invalid-feedback'>
tugantgan oliy yurti kiritilmadi.
</div>

</div> 
<div class='col-md-2 mb-3'>
<label for='validationCustom0bdnb'>Himoya bahosi</label>
<input type='text' class='form-control' name='baho' value='{$row1['baho']}' id='validationCustom0bdnb' required>
<div class='invalid-feedback'>
baho kiritilmadi.
</div>
</div><div class='col-md-3 mb-3'>
<label for='validationCustom0bdn'>Beriladigan diplom nomeri</label>
<input type='text' class='form-control' name='beriladigan_diplom_nomeri' readonly value='{$row1['beriladigan_diplom_nomeri']}' id='validationCustom0bdn' required>
<div class='invalid-feedback'>
tugantgan oliy yurti kiritilmadi.
</div>
</div>
<div class='col-md-3 mb-3'>
<label for='validationCustom0bdnb'>Yakunlash buyrug'i nomeri</label>
<input type='text' class='form-control' name='buyruq' value='{$row1['buyruq']}' id='validationCustom0bdnb' required>
<div class='invalid-feedback'>
raqam kiritilmadi.
</div>
</div>
<input type='hidden' name='id' value='{$row1['id']}'>
      </div><input type='submit'   class='btn btn-warning ' value='edit' style='font-size:30px; font-weight:bold;float:right;   font-size:18px; margin:15px'> 
      
      
      </form>
      
      <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';
        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');
          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
      </script>";
      }
    }
  
  
}



  ?>
</body>

</html>