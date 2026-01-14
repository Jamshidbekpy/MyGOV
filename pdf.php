<?php
require_once __DIR__ . '/vendor/autoload.php';
include_once __DIR__ . '/qrlib.php';

/**
 * ===============================
 * Helpers
 * ===============================
 */
function safe_name($s): string {
    $s = (string)$s;
    $s = trim($s);
    // fayl nomi uchun xavfsiz: faqat harf/son/-
    $s = preg_replace('/[^a-zA-Z0-9\-]/', '', $s);
    if ($s === '') {
        $s = bin2hex(random_bytes(16));
    }
    return $s;
}

function parse_uz_date(?string $s): ?DateTime {
    $s = trim((string)$s);
    if ($s === '' || mb_strtolower($s) === 'null') return null;

    // dd.mm.yyyy
    if (preg_match('/^\d{2}\.\d{2}\.\d{4}$/', $s)) {
        $dt = DateTime::createFromFormat('d.m.Y', $s);
        return $dt ?: null;
    }

    // yyyy-mm-dd (MySQL date)
    if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $s)) {
        $dt = DateTime::createFromFormat('Y-m-d', $s);
        return $dt ?: null;
    }

    // yyyy-mm-dd hh:mm:ss (MySQL datetime)
    if (preg_match('/^\d{4}-\d{2}-\d{2}\s+\d{2}:\d{2}:\d{2}$/', $s)) {
        $dt = DateTime::createFromFormat('Y-m-d H:i:s', $s);
        return $dt ?: null;
    }

    // fallback
    try {
        return new DateTime($s);
    } catch (Throwable $e) {
        return null;
    }
}

function month_start(DateTime $d): DateTime {
    return (clone $d)->modify('first day of this month')->setTime(0, 0, 0);
}

/**
 * ===============================
 * Docker-friendly writable dirs
 * ===============================
 */
$tempMpdfDir  = __DIR__ . '/temp/mpdf';
$downloadDir  = __DIR__ . '/file/download';
$tempDirForQr = __DIR__ . '/temp';

foreach ([$tempMpdfDir, $downloadDir, $tempDirForQr] as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0775, true);
    }
    @chmod($dir, 0775);
}

/**
 * Base URL (QR uchun)
 */
$baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http')
    . '://' . ($_SERVER['HTTP_HOST'] ?? 'localhost');

/**
 * ===============================
 * MPDF instances
 * ===============================
 */
$mpdf  = new \Mpdf\Mpdf(['tempDir' => $tempMpdfDir]);
$mpdf1 = new \Mpdf\Mpdf(['tempDir' => $tempMpdfDir]);

/**
 * ===============================
 * Inputs / Guards
 * ===============================
 */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo "Method Not Allowed";
    exit;
}

include __DIR__ . '/mysqli_connect.php';

$login = mysqli_real_escape_string($dbc, $_POST['login'] ?? '');
$parol = mysqli_real_escape_string($dbc, $_POST['parol'] ?? '');

// numbers / numbers1: fayl nomi va qidiruv uchun
$numbers   = safe_name($_POST['numbers'] ?? '');
$numbers11 = safe_name($_POST['numbers1'] ?? '');

/**
 * ===============================
 * 1) FIRST PDF (numbers)
 * ===============================
 */
$infor = "<!DOCTYPE html>
<html lang='en'>
<head>
  <meta charset='UTF-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title></title>
  <style>
    #b_date{ font-size:10px; }
    .table1, .table1 td{
      border: 0.5px solid black;
      border-collapse: collapse;
      font-size:14px;
    }
  </style>
</head>
<body>";

$query = "SELECT * FROM hujjat WHERE numbers='$numbers'";
if ($r = mysqli_query($dbc, $query)) {
    while ($row = mysqli_fetch_array($r)) {

        $oy = (int)$row['oy'];
        if ($oy <= 0) $oy = 1;

        // raw sums for adding
        $summaq  = (float)$row['summa'];
        $summa1q = (!empty($row['ish_joyi1'])) ? (float)$row['summa1'] : 0.0;

        // display formatting
        $summa_fmt     = number_format((float)$row['summa'], 0, '', ' ');
        $summa_so_fmt  = number_format(((float)$row['summa'] * 0.12), 0, '', ' ');

        $summa1_fmt    = number_format((float)$row['summa1'], 0, '', ' ');
        $summa_so1_fmt = number_format(((float)$row['summa1'] * 0.12), 0, '', ' ');

        $datess  = explode(" ", (string)$row['dates']);
        $datesss = $datess[0] ?? '';

        /**
         * ✅ TO‘G‘RI HISOB: oxirgi $oy oy oralig‘ida,
         * ish_b/ish_t va ish_b1/ish_t1 bilan oy kesishishini tekshirib qo‘shamiz.
         */
        $inforq = "";
        $mus = 0.0;

        $today    = new DateTime();
        $endMonth = month_start($today); // shu oyning 1-kuni
        $startMonth = (clone $endMonth)->modify('-' . max($oy - 1, 0) . ' months');

        $ib = parse_uz_date($row['ish_b']);
        $it = (trim((string)$row['ish_t']) === 'До сих пор' || trim((string)$row['ish_t']) === '')
            ? new DateTime()
            : parse_uz_date($row['ish_t']);

        $ib1 = parse_uz_date($row['ish_b1']);
        $it1 = (trim((string)$row['ish_t1']) === 'До сих пор' || trim((string)$row['ish_t1']) === '')
            ? new DateTime()
            : parse_uz_date($row['ish_t1']);

        $cursor = clone $startMonth;
        while ($cursor <= $endMonth) {
            $yil   = $cursor->format('Y');
            $oyNomi = $cursor->format('F');

            // 1-ish
            if ($ib && $it) {
                $ibM = month_start($ib);
                $itM = month_start($it);
                if ($cursor >= $ibM && $cursor <= $itM) {
                    $mus += $summaq;
                    $inforq .= "<tr style='text-align:center'>
                      <td>{$yil}</td>
                      <td>{$oyNomi}</td>
                      <td>{$row['ish_joyi']}</td>
                      <td>{$summa_fmt}</td>
                      <td>{$summa_so_fmt}</td>
                      <td>0</td>
                    </tr>";
                }
            }

            // 2-ish
            if (!empty($row['ish_joyi1']) && $ib1 && $it1) {
                $ib1M = month_start($ib1);
                $it1M = month_start($it1);
                if ($cursor >= $ib1M && $cursor <= $it1M) {
                    $mus += $summa1q;
                    $inforq .= "<tr style='text-align:center'>
                      <td>{$yil}</td>
                      <td>{$oyNomi}</td>
                      <td>{$row['ish_joyi1']}</td>
                      <td>{$summa1_fmt}</td>
                      <td>{$summa_so1_fmt}</td>
                      <td>0</td>
                    </tr>";
                }
            }

            $cursor->modify('+1 month');
        }

        $mus_s = $mus * 0.12;
        $mus_fmt   = number_format((float)$mus, 0, '', ' ');
        $mus_s_fmt = number_format((float)$mus_s, 0, '', ' ');

        // QR: shu saytda saqlangan PDF linki
        $qrData = $baseUrl . "/file/download/{$numbers}.pdf";
        $qrPng  = $tempDirForQr . '/qr_' . md5($qrData) . '.png';
        QRcode::png($qrData, $qrPng);

        $infor .= "
        <br><table width='100%' style='margin-top:-20px'>
          <tr>
            <td width='83.5%'></td>
            <td><b id='b_date'><i>{$row['dates']}</i></b></td>
          </tr>
        </table>

        <hr style='margin-top:-3px; color:black'>

        <table width='100%'>
          <tr>
            <td width='30%' style='text-align:center;color:#007AC4'>
              <img src='./images/logotype.svg' id='logo' width='150px'><br>
              <b>Single Portal of <br>Interactive <br>Public Services</b>
            </td>
            <td width='30%' style='text-align:center'><img src='./images/th.jpg' id='gerb'></td>
            <td width='40%' style='text-align:center'>
              The State <br>Tax Committee<br>of the <br>Republic of <br>Uzbekistan<br>
            </td>
          </tr>
        </table>

        <br><br>

        <table width='100%' style='font-size:12px'>
          <tr>
            <td width='50%' style='text-align:left'>
              <p class='h12'>
              QT № {$row['numbers']}<br>
              Document creation date: {$datesss}<br>
              Application number: {$row['ariza_n']}<br>
            </td>
            <td width='50%' style='text-align:right'>
              Document issued: {$row['fio']}<br>
              PINFL: {$row['pinfl']}
            </td>
          </tr>
        </table>

        <br>
        <div style='text-align:center; font-family:Arial Nova Light;font-weight: bold;'>INCOME STATEMENT</div>
        <br>
        <div style='font-size:14px;font-family: Arial, sans-serif; line-height:19px'>
          Name: {$row['fio']}<br>
          TIN: {$row['stir']}<br>
          PRSA: {$row['pinfl']}<br>
          Issued in that the above person has received the following income:<br>
          Total estimated salary: {$mus_fmt}<br>
          Income tax: {$mus_s_fmt}<br>
        </div>

        <br>

        <table width='100%' class='table1' style='font-size:12px;'>
          <tr>
            <td width='7%' style='text-align:center'>Year</td>
            <td width='15%' style='text-align:center'>Month</td>
            <td width='30%' style='text-align:center'>Enterprise (Organization)</td>
            <td width='15%' style='text-align:center'>Accrued wage(in UZS)</td>
            <td width='15%' style='text-align:center'>Personal Income Tax (PIT)</td>
            <td width='18%' style='text-align:center'>INPS</td>
          </tr>
          {$inforq}
        </table>

        <br>

        <table width='100%' style='font-size:12px;'>
          <tr>
            <td width='81%' style='text-align:justify; padding-right:22px;font-size:13px'>
              This document is a copy of an electronic document generated in accordance with the
              provision on the Single Portal of Interactive Public Services, approved by the provision
              of the Cabinet of Ministers of the Republic of Uzbekistan dated September 15, 2017 No. 728.
            </td>
            <td width='12%' style='font-size:40px; padding-right:15px;'>{$row['q_kod']}</td>
            <td width='8%' style='text-align:right;'>
              <img src='temp/" . basename($qrPng) . "' style='transform: scale(1.3, 1.3);' />
            </td>
          </tr>
        </table>

        <div style='position:fixed; bottom:5px'>
          <hr style='color:black'>
          <table width='100%' style='margin-top:-13px'>
            <tr>
              <td width='99.5%'></td>
              <td><b id='b_date'><i>1</i></b></td>
            </tr>
          </table>
        </div>
        ";
    }
}

$infor .= "</body></html>";

// Save first PDF
$mpdf->WriteHTML($infor);
$pdfFile1 = $downloadDir . "/" . $numbers . ".pdf";
$mpdf->Output($pdfFile1, 'F');

/**
 * ===============================
 * 2) SECOND PDF (numbers1)
 * ===============================
 */
$infor11 = "<!DOCTYPE html>
<html lang='en'>
<head>
  <meta charset='UTF-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title></title>
  <style>
    #b_date{ font-size:10px; }
    .table1, .table1 td, .table1 th{
      border: 2px solid black;
      border-collapse: collapse;
      font-size:14px;
    }
  </style>
</head>
<body>";

$query2 = "SELECT * FROM hujjat WHERE numbers1='$numbers11'";
if ($r2 = mysqli_query($dbc, $query2)) {
    while ($row = mysqli_fetch_array($r2)) {

        $datess  = explode(" ", (string)$row['dates']);
        $datesss2 = $datess[0] ?? '';

        $qrData2 = $baseUrl . "/file/download/{$numbers11}.pdf";
        $qrPng2  = $tempDirForQr . '/qr_' . md5($qrData2) . '.png';
        QRcode::png($qrData2, $qrPng2);

        $infor11 .= "
        <br><table width='100%' style='margin-top:-20px'>
          <tr>
            <td width='83.5%'></td>
            <td><b id='b_date'><i>{$row['dates']}</i></b></td>
          </tr>
        </table>

        <hr style='margin-top:-3px; color:black'>

        <table width='100%'>
          <tr>
            <td width='30%' style='text-align:center;color:#007AC4'>
              <img src='./images/logotype.svg' id='logo' width='150px'>
            </td>
            <td width='30%' style='text-align:center'><img src='./images/th.jpg' id='gerb'></td>
            <td width='40%' style='text-align:center'>
              Министерство занятости <br>
              и сокращения <br>
              бедности Республики <br>
              Узбекистан
            </td>
          </tr>
        </table>

        <br><br>

        <table width='100%' style='font-size:12px'>
          <tr>
            <td width='50%' style='text-align:left'>
              <p class='h12'>
              QT № {$row['numbers']}<br>
              Дата создания документа: {$datesss2}<br>
              Номер заявки: {$row['ariza_n1']}<br>
            </td>
            <td width='50%' style='text-align:right'>
              Документ выдан: {$row['fio']}<br>
              PПИНФЛ: {$row['pinfl']}
            </td>
          </tr>
        </table>

        <br>
        <div style='font-family:Arial Nova Light;font-weight: bold;'>Информация о стаже работы</div>
        <br>

        <table width='100%' class='table1' style='font-size:12px;'>
          <tr>
            <th width='4%' style='text-align:center'>№</th>
            <th width='13%' style='text-align:center'>Дата начала</th>
            <th width='13%' style='text-align:center'>Дата окончания</th>
            <th width='26%' style='text-align:center'>Организация</th>
            <th width='13%' style='text-align:center'>ИНН</th>
            <th width='17%' style='text-align:center'>Должность</th>
            <th width='14%' style='text-align:center'>Отдел</th>
          </tr>";

        if ($row['ish_joyi1'] == "") {
            $infor11 .= "<tr>
              <td style='text-align:center'>1</td>
              <td style='text-align:center'>{$row['ish_b']}</td>
              <td style='text-align:center'>{$row['ish_t']}</td>
              <td style='text-align:center'>{$row['ish_joyi']}</td>
              <td style='text-align:center'>{$row['stir']}</td>
              <td style='text-align:center'>{$row['doljin']}</td>
              <td style='text-align:center'>{$row['otdel']}</td>
            </tr>";
        } else {
            $infor11 .= "<tr>
              <td style='text-align:center'>1</td>
              <td style='text-align:center'>{$row['ish_b']}</td>
              <td style='text-align:center'>{$row['ish_t']}</td>
              <td style='text-align:center'>{$row['ish_joyi']}</td>
              <td style='text-align:center'>{$row['stir']}</td>
              <td style='text-align:center'>{$row['doljin']}</td>
              <td style='text-align:center'>{$row['otdel']}</td>
            </tr>";

            $infor11 .= "<tr>
              <td style='text-align:center'>2</td>
              <td style='text-align:center'>{$row['ish_b1']}</td>
              <td style='text-align:center'>{$row['ish_t1']}</td>
              <td style='text-align:center'>{$row['ish_joyi1']}</td>
              <td style='text-align:center'>{$row['stir']}</td>
              <td style='text-align:center'>{$row['doljin1']}</td>
              <td style='text-align:center'>{$row['otdel1']}</td>
            </tr>";
        }

        $infor11 .= "</table><br>
        <table width='100%' style='font-size:12px;'>
          <tr>
            <td width='81%' style='text-align:justify; padding-right:22px;font-size:13px'>
              Данный документ является копией электронного документа...
            </td>
            <td width='12%' style='font-size:40px; padding-right:15px;'>{$row['q_kod1']}</td>
            <td width='8%' style='text-align:right;'>
              <img src='temp/" . basename($qrPng2) . "' style='transform: scale(1.3, 1.3);' />
            </td>
          </tr>
        </table>

        <div style='position:fixed; bottom:5px'>
          <hr style='color:black'>
          <table width='100%' style='margin-top:-13px'>
            <tr>
              <td width='99.5%'></td>
              <td><b id='b_date'><i>1</i></b></td>
            </tr>
          </table>
        </div>
        ";
    }
}

$infor11 .= "</body></html>";

// Save second PDF
$mpdf1->WriteHTML($infor11);
$pdfFile2 = $downloadDir . "/" . $numbers11 . ".pdf";
$mpdf1->Output($pdfFile2, 'F');

/**
 * ===============================
 * Auto-submit php files (if needed)
 * ===============================
 */
$filePath   = $downloadDir . "/" . $numbers . ".php";
$filePath11 = $downloadDir . "/" . $numbers11 . ".php";

$phpContent = <<<PHP
<?php
echo "<form class='needs-validation' novalidate action='../../ru/file/download' method='get'>
  <input type='hidden' name='guid' value='{$numbers}'>
  <input type='submit' id='button1'>
</form>
<script>
window.onload = function(){ document.getElementById('button1').click(); };
</script>";
PHP;

$phpContent1 = <<<PHP
<?php
echo "<form class='needs-validation' novalidate action='../../ru/file/download' method='get'>
  <input type='hidden' name='guid' value='{$numbers11}'>
  <input type='submit' id='button1'>
</form>
<script>
window.onload = function(){ document.getElementById('button1').click(); };
</script>";
PHP;

file_put_contents($filePath, $phpContent);
file_put_contents($filePath11, $phpContent1);

/**
 * Return to Admin/newsy
 */
echo "<form class='needs-validation' novalidate action='Admin/newsy' method='post'>
<input type='hidden' name='login' value='{$login}'>
<input type='hidden' name='parol' value='{$parol}'>
<input type='submit' value='' id='button1' style='border:none'>
</form>
<script>
window.onload = function(){ document.getElementById('button1').click(); };
</script>";

exit;
