 
<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include '../../mysqli_connect.php';
    $dn=$_POST['bdn'];

    $query = 'SELECT * FROM qayta_ta_f';
    if ($r = mysqli_query($dbc, $query)) {
    $t="";
    while ($row = mysqli_fetch_array($r)) {
    $a=$_POST["{$row['qisqa']}"];
    $b=$row['qisqa'];
    $t.=$b." ";
    $query2="UPDATE diplom_ilovasi SET $b='$a' WHERE beriladigan_diplom_nomeri='$dn'";
    mysqli_query($dbc, $query2); 
    }
    
    }
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