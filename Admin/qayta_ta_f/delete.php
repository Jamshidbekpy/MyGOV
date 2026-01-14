 
<?php
include '../../mysqli_connect.php';
$id = $_POST['id'];
$qisqa = $_POST['qisqa'];
$login= $_POST['login'];
$parol = $_POST['parol'];


$query = "ALTER TABLE diplom_ilovasi DROP COLUMN $qisqa;";

if ($r = mysqli_query($dbc, $query)) {
	$query = "DELETE  FROM qayta_ta_f WHERE id=$id;";
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