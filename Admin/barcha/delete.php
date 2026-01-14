 
<?php
include '../../mysqli_connect.php';
$id = $_GET['id'];
$beriladigan_diplom_nomeri= $_GET['beriladigan_diplom_nomeri'];



$query = "SELECT * FROM diplom_sh  WHERE id=$id;";

if ($r = mysqli_query($dbc, $query)) {
	while ($row = mysqli_fetch_array($r)) {
		if ($id) {
			unlink('../../uploude/'.$row['beriladigan_diplom_nomeri'].".pdf");
		}
	}
}



$query = "DELETE  FROM   diplom_sh WHERE id=$id;";
mysqli_query($dbc, $query);
$query1 = "DELETE  FROM diplom_ilovasi  WHERE beriladigan_diplom_nomeri=$beriladigan_diplom_nomeri;";
mysqli_query($dbc, $query1);
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

?>   