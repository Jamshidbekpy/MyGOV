
<?php
    if ($_SERVER['REQUEST_METHOD'] == "GET") {

      header("Location:../index");
    }?>
<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Hujjat to'ldirish</title>
</head>
<body>
    

<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $login = $_POST['login'];
        $parol = $_POST['parol'];

        include '../mysqli_connect.php';
       

        $sql = "SELECT * FROM admin where login='" . $login . "' and parol='" . $parol . "';";

        $result = mysqli_query($dbc, $sql);

        if (mysqli_num_rows($result) > 0) {
            print"<form class='needs-validation' novalidate action='newsy' method='post'>
          <input type='hidden' name='login' value='{$login}'>
          <input type='hidden' name='parol' value='{$parol}'>
      <input type='submit' value=''  id='button1' style='border:none' > 
      </form>
      <script>
      window.onload = function(){
      document.getElementById('button1').click();
      }
      </script>
      ";
        }
      else{
        header('Location:index.php');


      }
      }
?>
    <script>
      function myf(){
var a=document.getElementById('validationCustom0v').value;
        if(a=="Buxoro"){

          document.getElementById('tuman').value="<option>Shofirkon</option>";
        }
      }
      
    </script>
         <!-- <div class='col-md-4 mb-3'><label for='mavzu_name'>Qayta tayyorlanadigan fan</label>
          <select id='mavzu_name' class='custom-select w-100' name='qayta_ta_f'>";

          $query = 'SELECT * FROM qayta_ta_f';
          if($_POST['qayta_ta_f']==''){
          
            $r = mysqli_query($dbc, $query);
            while ($row = mysqli_fetch_array($r)) {
               print" <option value=\"".$row['name']."\">{$row['name']}</option>";
            }
          }
          else{
          
            print" <option  value=".$_POST['qayta_ta_f']." >{$_POST['qayta_ta_f']}</option>";
          }
          
          print " </select>
          
           
          </div>  -->
    </body>
</html>