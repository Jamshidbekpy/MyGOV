<?php
include '../mysqli_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Xavfsizlik
    function sanitize($dbc, $key) {
        return mysqli_real_escape_string($dbc, $_POST[$key] ?? '');
    }

    $fio = sanitize($dbc, 'fio');
    $pinfl = sanitize($dbc, 'pinfl');
    $t_sana = sanitize($dbc, 't_sana');
    $talim_turi = sanitize($dbc, 'talim_turi');
    $talim_shakli = sanitize($dbc, 'talim_shakli');
    $qabul_turi = sanitize($dbc, 'qabul_turi');
    $kirgan_yili = sanitize($dbc, 'kirgan_yili');
    $muassasa = sanitize($dbc, 'muassasa');
    $fakultet = sanitize($dbc, 'fakultet');
    $yonalish = sanitize($dbc, 'yonalish');
    $kurs = sanitize($dbc, 'kurs');
    $login = sanitize($dbc, 'login');
    $parol = sanitize($dbc, 'parol');

    // UUID yaratish
    function encryptDateToUUID($date) {
        $hash = md5($date);
        return substr($hash, 0, 4) . '-' .
               substr($hash, 4, 4) . '-' .
               substr($hash, 8, 4) . '-' .
               substr($hash, 12, 4) . '-' .
               substr($hash, 16, 4) . '-' .
               substr($hash, 20, 4) . '-' .
               substr($hash, 24, 4);
    }

    // 4 xonali kod
    function generateFourDigitCode($number) {
        $hash = md5($number);
        $digits = preg_replace('/[^0-9]/', '', $hash);
        return substr($digits, 0, 4);
    }

    $currentDate = date('Y-m-d H:i:s');
    $numbers = encryptDateToUUID($currentDate);
    $q_kod = generateFourDigitCode($pinfl);
    $ariza_n = 2 * time();

    // SQL yozish 
    $query = "INSERT INTO hujjatt (
        fio, pinfl, t_sana, talim_turi, talim_shakli, qabul_turi, kirgan_yili, 
        muassasa, fakultet, yonalish, kurs, q_kod, numbers, ariza_n, dates
    ) VALUES (
        '$fio', '$pinfl', '$t_sana', '$talim_turi', '$talim_shakli', '$qabul_turi', 
        '$kirgan_yili', '$muassasa', '$fakultet', '$yonalish', '$kurs', 
        '$q_kod', '$numbers', '$ariza_n', '$currentDate'
    )";

    // Bajarish
    if (mysqli_query($dbc, $query)) {
        // Muvaffaqiyatli
        echo "
        <form id='redirectForm' action='../pdff.php' method='post'>
            <input type='hidden' name='numbers' value='$numbers'>
            <input type='hidden' name='login' value='$login'>
            <input type='hidden' name='parol' value='$parol'>
            <input type='submit' style='display:none'>
        </form>
        <script>
            document.getElementById('redirectForm').submit();
        </script>";
    } else {
        echo "Xatolik: " . mysqli_error($dbc);
    }
} else {
    echo "Xatolik: So‘rov POST emas.";
}
?>
