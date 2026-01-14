
<?php
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$mpdf1 = new \Mpdf\Mpdf();

$infor="<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>


    <title></title>
 <style>
 #b_date{
 font-size:10px;
 }
 .table1, .table1 td{
   border: 0.5px solid black;
  border-collapse: collapse;
  font-size:14px;
 }
 
 </style>
</head>
<body>";
 if ($_SERVER['REQUEST_METHOD'] == "POST") {
  
    include 'mysqli_connect.php';
    $login=mysqli_real_escape_string($dbc, $_POST['login']);
    $parol=mysqli_real_escape_string($dbc, $_POST['parol']);
   $numbers= $_POST['numbers'];
   
  $query = "SELECT * FROM hujjatt Where numbers='$numbers'";

  if ($r = mysqli_query($dbc, $query)) {

    while ($row = mysqli_fetch_array($r)) {
     
    $datess=explode(" ",$row['dates']);
    $datesss=$datess[0];
 

$infor.="<br><table width='100%' style='margin-top:-20px'>
        <tr>
            <td width='83.5%'></td> 
            <td ><b id='b_date' ><i>{$row['dates']}</i></b></td>
        </tr>
        
    </table>
<hr style='margin-top:-3px; color:black'>
<table width='100%'>
        <tr>
            <td width='30%' style='text-align:center;color:#007AC4'><img src='./images/logotype.svg' id='logo'  width='150px'  ></td> 
            <td width='30%' style='text-align:center'><img src='./images/th.jpg' id='gerb'  ></td> 
            <td width='40%' style='text-align:center'>
            O‘zbekiston Respublikasi<br>
 Oliy ta’lim,<br>
 fan va<br>
 innovatsiyalar vazirligi<br>
           </td> 
            
        </tr>
        
    </table>
<br><br>
<table width='100%' style='font-size:12px' >
        <tr>
            <td width='50%' style='text-align:left'>
      <p class='h12'>№ {$row['numbers']}<br>
Document creation date: {$datesss} <br>
Application number: {$row['ariza_n']}<br>
</td>
            <td width='50%' style='text-align:right'>
            Document issued: {$row['fio']}<br>
PINFL: {$row['pinfl']}
            </td> 

      
        
    </table><br>
<div style='text-align:center;color:#333333; font-family:Arial Nova Light;font-weight: bold;'>OʼQISH JOYIDАN MАʼLUMOTNOMА<br>
 СПРАВКА С МЕСТА УЧЕБЫ</div>
<br>
<br>
<table width='100%' class='table1' style='font-size:12px;font-family:Arial Nova Light;' >
        <tr>
            <td width='50%' style='padding:5px;color:#333333'><b>F.I.O. / Ф.И.О.:</b></td>
            <td width='50%' style='padding:5px;color:#333333'>{$row['fio']}</td>
           
       </tr>
            <tr>
            <td width='50%' style='padding:5px;color:#333333'><b>JSH ShIR / ПИН ФЛ:</b></td>
            <td width='50%' style='padding:5px;color:#333333'>{$row['pinfl']}</td>
           
       </tr>
            <tr>
            <td width='50%' style='padding:5px;color:#333333'><b>Tug‘ilgan sanasi / Дата рождения:</b></td>
            <td width='50%' style='padding:5px;color:#333333'>{$row['t_sana']}</td>
           
       </tr>
            <tr>
            <td width='50%' style='padding:5px;color:#333333'><b> Fuqaroligi / Гражданство:</b></td>
            <td width='50%' style='padding:5px;color:#333333'>O‘zbekiston Respublikasi fuqarosi</td>
           
       </tr>
            <tr>
            <td width='50%' style='padding:5px;color:#333333'><b>Ta'lim turi / Тип образования:</b></td>
            <td width='50%' style='padding:5px;color:#333333'>{$row['talim_turi']}</td>
           
       </tr>
            <tr>
            <td width='50%' style='padding:5px;color:#333333'><b>Ta'lim shakli / Форма обучения:</b></td>
            <td width='50%' style='padding:5px;color:#333333'>{$row['talim_shakli']}</td>
           
       </tr>
            <tr>
            <td width='50%' style='padding:5px;color:#333333'><b>Qabul turi / Тип приема:</b></td>
            <td width='50%' style='padding:5px;color:#333333'>{$row['qabul_turi']}</td>
           
       </tr>
            <tr>
            <td width='50%' style='padding:5px;color:#333333'><b>O‘qishga kirgan yili / Год зачисления:</b></td>
            <td width='50%' style='padding:5px;color:#333333'>{$row['kirgan_yili']}</td>
           
       </tr> 
           <tr>
            <td width='50%' style='padding:5px;color:#333333'><b>Oliy ta'lim muassasasi / Высшее учебное
 заведение:</b></td>
            <td width='50%' style='padding:5px;color:#333333'>{$row['muassasa']}</td>
           
       </tr>
 <tr>
            <td width='50%' style='padding:5px;color:#333333'><b>Fakultet / Факультет:</b></td>
            <td width='50%' style='padding:5px;color:#333333'>{$row['fakultet']}</td>
           
       </tr> 
        <tr>
            <td width='50%' style='padding:5px;color:#333333'><b>Yo‘nalish / Направление:</b></td>
            <td width='50%' style='padding:5px;color:#333333'>{$row['yonalish']}</td>
           
       </tr> 
        <tr>
            <td width='50%' style='padding:5px;color:#333333'><b>O‘quv kursi / Курс обучения:</b></td>
            <td width='50%' style='padding:5px;color:#333333'>{$row['kurs']}</td>
           
       </tr> 
       
       
       
       
       
       
       ";
      
 
   $infor.=" </table><br>
   <p style='color:#333333;font-family:Arial Nova Light;'><b> Ma'lumot so‘ralgan joyga taqdim etish uchun berildi.<br>
 Справка выдана для предоставления по месту требования.</b></p><br><br>
<table width='100%'   style='font-size:12px;' >
        <tr>
            <td width='81%' style='text-align:justify; padding-right:22px;font-size:13px'>Mazkur hujjat Vazirlar Mahkamasining 2017 yil 15 sentyabrdagi 728-son qaroriga
 muvofiq Yagona interaktiv davlat xizmatlari portalida shakllantirilgan elektron
 hujjatning nusxasi bo‘lib, davlat organlari tomonidan ushbu hujjatni qabul qilishni rad
 etishlari qat’iyan taqiqlanadi. Hujjat haqiqiyligini repo.gov.uz veb-saytida hujjatning
 noyob raqamini kiritib yoki mobil telefon yordamida QR- kodni skaner qilish orqali
 tekshirish mumkin.
</td>
            <td width='12%' style='font-size:40px; padding-right:15px;'>{$row['q_kod']}</td>
            <td width='8%' style='text-align:right;' >






";
$q_kod=$row['q_kod'];

     

$_REQUEST['data']="http://localhost/mygov/files/download/$numbers";


$PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;


$PNG_WEB_DIR = 'temp/';

include "qrlib.php";    



$filename = $PNG_TEMP_DIR.'test.png';



$filename = $PNG_TEMP_DIR.'test'.md5($_REQUEST['data']).'.png';
QRcode::png($_REQUEST['data'], $filename);    



$infor.='<img src="'.$PNG_WEB_DIR.basename($filename).'"  style=" transform: scale(1.3, 1.3);" /></td>
       
       </tr>
      
      


 
    </table><br></div>
    
    ';
    $infor.="
    <div style='position:fixed; bottom:5px'><hr style='color:black'><table width='100%' style='margin-top:-13px'>
    <tr>
        <td width='99.5%'></td> 
        <td ><b id='b_date' ><i>1</b></td>
    </tr>
    
</table></div>
";
    

}
}
}

    
    
    
    
    //  $query = "SELECT * FROM diplom_ilovasi Where beriladigan_diplom_nomeri='$dn'";
    
    //  if ($r = mysqli_query($dbc, $query)) {

    //    while ($row = mysqli_fetch_array($r)) {

    //     $infor.= "<h1>{$row['']}</h1>";
    //    }}
 

$mpdf->WriteHTML($infor);

$mpdf->Output("files/download/{$numbers}.pdf", 'F');

$filePath = "files/download/{$numbers}.php"; // PHP fayl yo'li


if (!file_exists('files/download')) {
    mkdir('files/download', 0777, true);
}








// PHP faylga yoziladigan kod
$phpContent = "<?php\n";
$phpContent .= "echo "."\"<form class='needs-validation' novalidate action='../../ru/files/download' method='get'>
    <input type='hidden' name='guid' value='{$numbers}'>
<input type='submit'   id='button1' > 
</form>
<script>
window.onload = function(){
document.getElementById('button1').click();
}
</script>"."\";\n";
$phpContent .= "?>";

// Faylni yaratish va yozish
file_put_contents($filePath, $phpContent);
print"<form class='needs-validation' novalidate action='Admin/newsyy' method='post'>
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


?>