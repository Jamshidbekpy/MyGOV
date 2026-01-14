 
<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include '../../mysqli_connect.php';


    $name = mysqli_real_escape_string($dbc, $_POST['name']);
    $malumot = mysqli_real_escape_string($dbc, $_POST['malumot']);
    $soat = mysqli_real_escape_string($dbc, $_POST['soat']);
    $login = mysqli_real_escape_string($dbc, $_POST['login']);
    $parol = mysqli_real_escape_string($dbc, $_POST['parol']);
  

    $id = $_POST['id'];



    $query = "UPDATE  qayta_ta_f SET name='$name', malumot='$malumot', soat='$soat' WHERE id='$id'";

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