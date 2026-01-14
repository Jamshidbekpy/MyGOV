
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
   
  $query = "SELECT * FROM hujjat Where numbers='$numbers'";

  if ($r = mysqli_query($dbc, $query)) {

    while ($row = mysqli_fetch_array($r)) {
        if($row['ish_joyi1']==""){
            $summa=$row['summa'];
            $oy=$row['oy'];
            $summa_all=$summa*$oy;
            $summa_s=$summa*$oy*0.12;
            $summa_so=$summa*0.12;
            $summa= number_format($summa, 0, '', ' ');
            $summa_all= number_format($summa_all, 0, '', ' ');
            $summa_s= number_format($summa_s, 0, '', ' ');
            $summa_so= number_format($summa_so, 0, '', ' ');
             
            $jamsumm=$row['summa']*$oy;
            $jamsumma_s=$jamsumm*0.12;
        }
      else{
        $summa=$row['summa'];
        $oy=$row['oy'];
        $summa_all=$summa*$oy;
        $summa_s=$summa*$oy*0.12;
        $summa_so=$summa*0.12;
        $summa= number_format($summa, 0, '', ' ');
        $summa_all= number_format($summa_all, 0, '', ' ');
        $summa_s= number_format($summa_s, 0, '', ' ');
        $summa_so= number_format($summa_so, 0, '', ' ');
        
        $summa1=$row['summa1'];
        $summa_all1=$summa1*$oy;
        $summa_s1=$summa1*$oy*0.12;
        $summa_so1=$summa1*0.12;
        $summa1= number_format($summa1, 0, '', ' ');
        $summa_all1= number_format($summa_all1, 0, '', ' ');
        $summa_s1= number_format($summa_s1, 0, '', ' ');
        $summa_so1= number_format($summa_so1, 0, '', ' ');
 $jamsumm=($row['summa1']+$row['summa'])*$oy;
 $jamsumma_s=$jamsumm*0.12;
      }
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
            <td width='30%' style='text-align:center;color:#007AC4'><img src='./images/logotype.svg' id='logo'  width='150px'  > <br>
<b>Single Portal of <br>
Interactive <br>
Public Services</b></td> 
            <td width='30%' style='text-align:center'><img src='./images/th.jpg' id='gerb'  ></td> 
            <td width='40%' style='text-align:center'>The State <br>
Tax Committee<br>
of the <br>
Republic of <br>
Uzbekistan<br></td> 
            
        </tr>
        
    </table>
<br><br>
<table width='100%' style='font-size:12px' >
        <tr>
            <td width='50%' style='text-align:left'>
      <p class='h12'>QT № {$row['numbers']}<br>
Document creation date: {$datesss} <br>
Application number: {$row['ariza_n']}<br>
</td>
            <td width='50%' style='text-align:right'>
            Document issued: {$row['fio']}<br>
PINFL: {$row['pinfl']}
            </td> 

      
        
    </table><br>
<div style='text-align:center; font-family:Arial Nova Light;font-weight: bold;'>INCOME STATEMENT</div>
<br><div style='font-size:14px;font-family: Arial, sans-serif; line-height:19px'>
Name: {$row['fio']}<br>
TIN:{$row['stir']}<br>
PRSA: {$row['pinfl']}<br>
Issued in that the above person has received the following income:<br>
Total estimated salary: $jamsumm<br>
Income tax: $jamsumma_s<br>
</div>
<br>
<table width='100%' class='table1' style='font-size:12px;' >
        <tr>
            <td width='7%' style='text-align:center'>   Year</td>
            <td width='15%' style='text-align:center'>Month</td>
            <td width='30%' style='text-align:center'>Enterprise (Organization)</td>
            <td width='15%' style='text-align:center'> Accrued wage(in UZS)</td>
            <td width='15%' style='text-align:center'>Personal
Income Tax
(PIT)</td>
            <td width='18%' style='text-align:center'>The amount of the
individual savings
pension account
(INPS)</td>
       </tr>";
      
      
    
// Asosiy ish joyi
if (!empty($row['ish_joyi'])) {
    $start = new DateTime($row['ish_t']);  
    $end   = !empty($row['ish_b']) ? new DateTime($row['ish_b']) : new DateTime();
    $openEnded = empty($row['ish_b']); // hozirgacha ishlayotgan bo'lsa

    while ($start <= $end) {
        $infor .= "<tr style='text-align:center'>";
        $infor .= "<td>" . $start->format("Y") . "</td>";

        // Agar oxirgi oy va ish_b yo'q bo'lsa → "До сих пор"
        if ($openEnded && $start->format("Y-m") == $end->format("Y-m")) {
            $infor .= "<td>До сих пор</td>";
        } else {
            $infor .= "<td>" . $start->format("F") . "</td>";
        }

        $infor .= "<td>" . $row['ish_joyi'] . "</td>";
        $infor .= "<td>" . $summa . "</td>";
        $infor .= "<td>" . $summa_so . "</td>";
        $infor .= "<td>0</td>";
        $infor .= "</tr>";

        $start->modify("+1 month"); // keyingi oy
    }
}

// Ikkinchi ish joyi
if (!empty($row['ish_joyi1'])) {
    $start1 = new DateTime($row['ish_t1']);  
    $end1   = !empty($row['ish_b1']) ? new DateTime($row['ish_b1']) : new DateTime();
    $openEnded1 = empty($row['ish_b1']);

    while ($start1 <= $end1) {
        $infor .= "<tr style='text-align:center'>";
        $infor .= "<td>" . $start1->format("Y") . "</td>";

        if ($openEnded1 && $start1->format("Y-m") == $end1->format("Y-m")) {
            $infor .= "<td>До сих пор</td>";
        } else {
            $infor .= "<td>" . $start1->format("F") . "</td>";
        }

        $infor .= "<td>" . $row['ish_joyi1'] . "</td>";
        $infor .= "<td>" . $summa1 . "</td>";
        $infor .= "<td>" . $summa_so1 . "</td>";
        $infor .= "<td>0</td>";
        $infor .= "</tr>";

        $start1->modify("+1 month");
    }
}


           
         
       
      
       



      
      


 
   $infor.=" </table><br>
<table width='100%'   style='font-size:12px;' >
        <tr>
            <td width='81%' style='text-align:justify; padding-right:22px;font-size:13px'>This document is a copy of an electronic document generated in accordance with the
provision on the Single Portal of Interactive Public Services, approved by the provision
of the Cabinet of Ministers of the Republic of Uzbekistan dated September 15, 2017
No. 728. To check the accuracy of the information specified in the copy of the
electronic document, go to the website repo.gov.uz and enter the unique number of the
electronic document, or scan the QR code using a mobile device. Attention! In
accordance with the provision of the Cabinet of Ministers of the Republic of Uzbekistan
dated September 15, 2017 No. 728, the information contained in electronic documents
is legitimate. It is strictly forbidden for state bodies to refuse to accept copies of
electronic documents generated on the Single Portal of Interactive Public Services.
</td>
            <td width='12%' style='font-size:40px; padding-right:15px;'>{$row['q_kod']}</td>
            <td width='8%' style='text-align:right;' >






";
$q_kod=$row['q_kod'];
$q_kod1=$row['q_kod1'];
     

 $_REQUEST['data']="http://gow.su/file/download/$numbers";

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

$mpdf->Output("file/download/{$numbers}.pdf", 'F');

$filePath = "file/download/{$numbers}.php"; // PHP fayl yo'li


if (!file_exists('file/download')) {
    mkdir('file/download', 0777, true);
}




$infor11="<!DOCTYPE html>
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
 .table1, .table1 td, .table1 th{
   border: 2px solid black;
  border-collapse: collapse;
  font-size:14px;
 }
 
 </style>
</head>
<body>";
 if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
   $numbers11= $_POST['numbers1'];
   
   include 'mysqli_connect.php';
  $query = "SELECT * FROM hujjat Where numbers1='$numbers11'";

  if ($r = mysqli_query($dbc, $query)) {

    while ($row = mysqli_fetch_array($r)) {
  
    
  
$infor11.="<br><table width='100%' style='margin-top:-20px'>
        <tr>
            <td width='83.5%'></td> 
            <td ><b id='b_date' ><i>{$row['dates']}</i></b></td>
        </tr>
        
    </table>
<hr style='margin-top:-3px; color:black'>
<table width='100%'>
        <tr>
            <td width='30%' style='text-align:center;color:#007AC4'><img src='./images/logotype.svg' id='logo'  width='150px'  > </td> 
            <td width='30%' style='text-align:center'><img src='./images/th.jpg' id='gerb'  ></td> 
            <td width='40%' style='text-align:center'>
          Министерство занятости <br>
и сокращения <br>
бедности Республики <br>
Узбекистан 
            </td> 
            
        </tr>
        
    </table>
<br><br>
<table width='100%' style='font-size:12px' >
        <tr>
            <td width='50%' style='text-align:left'>
      <p class='h12'>QT № {$row['numbers']}<br>
Дата создания документа: {$datesss} <br>
Номер заявки: {$row['ariza_n1']}<br>
</td>
            <td width='50%' style='text-align:right'>
            Документ выдан: {$row['fio']}<br>
PПИНФЛ: {$row['pinfl']}
            </td> 

      
        
    </table><br>
<div style='font-family:Arial Nova Light;font-weight: bold;'>Информация о стаже работы </div>
<br>
<table width='100%' class='table1' style='font-size:12px;' >
        <tr>
            <th width='4%' style='text-align:center'>№</th>
            <th width='13%' style='text-align:center'>Дата 
начала 
работы </th>
            <th width='13%' style='text-align:center'>Дата 
окончания 
работы</th>
            <th width='26%' style='text-align:center'> Организация </th>
            <th width='13%' style='text-align:center'>ИНН</th>
            <th width='17%' style='text-align:center'>Должность </th>
            <th width='14%' style='text-align:center'>Отдел  </th>
       </tr>";
      
      
 
// ===================== 2-QISM (СТАЖ РАБОТЫ) =====================
if (!empty($row['ish_joyi'])) {
    $start = new DateTime($row['ish_t']);  
    $end   = !empty($row['ish_b']) ? new DateTime($row['ish_b']) : new DateTime();
    $openEnded = empty($row['ish_b']); 

    $infor11 .= "<tr style='text-align:center'>";
    $infor11 .= "<td>1</td>"; // №
    $infor11 .= "<td>" . $row['ish_t'] . "</td>"; // boshlanish sanasi

    if ($openEnded) {
        $infor11 .= "<td>До сих пор</td>";
    } else {
        $infor11 .= "<td>" . $row['ish_b'] . "</td>";
    }

    $infor11 .= "<td>" . $row['ish_joyi'] . "</td>";
    $infor11 .= "<td>" . $row['stir'] . "</td>";
    $infor11 .= "<td>" . $row['lavozim'] . "</td>";
    $infor11 .= "<td>" . $row['bo_lim'] . "</td>";
    $infor11 .= "</tr>";
}

// Ikkinchi ish joyi
if (!empty($row['ish_joyi1'])) {
    $start1 = new DateTime($row['ish_t1']);  
    $end1   = !empty($row['ish_b1']) ? new DateTime($row['ish_b1']) : new DateTime();
    $openEnded1 = empty($row['ish_b1']); 

    $infor11 .= "<tr style='text-align:center'>";
    $infor11 .= "<td>2</td>"; // №
    $infor11 .= "<td>" . $row['ish_t1'] . "</td>"; // boshlanish sanasi

    if ($openEnded1) {
        $infor11 .= "<td>До сих пор</td>";
    } else {
        $infor11 .= "<td>" . $row['ish_b1'] . "</td>";
    }

    $infor11 .= "<td>" . $row['ish_joyi1'] . "</td>";
    $infor11 .= "<td>" . $row['stir1'] . "</td>";
    $infor11 .= "<td>" . $row['lavozim1'] . "</td>";
    $infor11 .= "<td>" . $row['bo_lim1'] . "</td>";
    $infor11 .= "</tr>";
}
     
         
       
      
       



      
      


 
   $infor11.=" </table><br>
<table width='100%'   style='font-size:12px;' >
        <tr>
            <td width='81%' style='text-align:justify; padding-right:22px;font-size:13px'>Данный документ является копией электронного документа, сформированного на 
Едином портале интерактивных государственных услуг в соответствии с 
Постановлением Кабинета Министров № 728 от 15 сентября 2017 года, и отказ 
государственных органов в принятии данного документа категорически 
запрещается. Подлинность документа можно проверить, введя уникальный номер 
документа на сайте repo.gov.uz или просканировав QR-код с помощью мобильного 
телефона.  
</td>
            <td width='12%' style='font-size:40px; padding-right:15px;'>{$row['q_kod1']}</td>
            <td width='8%' style='text-align:right;' >






";

     

 $_REQUEST['data']="http://gow.su/file/download/$numbers11";


$PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;


$PNG_WEB_DIR = 'temp/';

  



$filename = $PNG_TEMP_DIR.'test.png';



$filename = $PNG_TEMP_DIR.'test'.md5($_REQUEST['data']).'.png';
QRcode::png($_REQUEST['data'], $filename);    



$infor11.='<img src="'.$PNG_WEB_DIR.basename($filename).'"  style=" transform: scale(1.3, 1.3);" /></td>
       
       </tr>
      
      


 
    </table><br></div>
    
    ';
    $infor11.="
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
 

$mpdf1->WriteHTML($infor11);

$mpdf1->Output("file/download/{$numbers11}.pdf", 'F');

$filePath11 = "file/download/{$numbers11}.php"; // PHP fayl yo'li


if (!file_exists('file/download')) {
    mkdir('file/download', 0777, true);
}





// PHP faylga yoziladigan kod
$phpContent = "<?php\n";
$phpContent .= "echo "."\"<form class='needs-validation' novalidate action='../../ru/file/download' method='get'>
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


// PHP faylga yoziladigan kod
$phpContent1 = "<?php\n";
$phpContent1 .= "echo "."\"<form class='needs-validation' novalidate action='../../ru/file/download' method='get'>
    <input type='hidden' name='guid' value='{$numbers11}'>

<input type='submit'   id='button1' > 
</form>
<script>
window.onload = function(){
document.getElementById('button1').click();
}
</script>"."\";\n";
$phpContent1 .= "?>";

// Faylni yaratish va yozish
file_put_contents($filePath11, $phpContent1);

print"<form class='needs-validation' novalidate action='Admin/newsy' method='post'>
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