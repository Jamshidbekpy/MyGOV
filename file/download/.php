<?php
echo "<form class='needs-validation' novalidate action='../../ru/file/download' method='get'>
    <input type='hidden' name='guid' value=''>

<input type='submit'   id='button1' > 
</form>
<script>
window.onload = function(){
document.getElementById('button1').click();
}
</script>";
?>