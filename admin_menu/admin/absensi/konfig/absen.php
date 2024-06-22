<?php

if (isset($_POST['id'])) {
    include 'connection.php';
    include 'function.php';

    // Load settings
    load_settings();

    $uid = mysqli_real_escape_string($dbconnect, $_POST['id']);
    $hari_ini = date('Y-m-d');
    $day = getday($hari_ini);

    if ($day == $GLOBALS['libur1'] || $day == $GLOBALS['libur2']) {
        echo "Hari Libur";
    } else {
        $cek_uid = uid($uid);
        if ($cek_uid == "0") {
            $time = date('H:i:s');
            $cek_absen = cektime($time, $GLOBALS['masuk_mulai'], $GLOBALS['masuk_akhir'], $GLOBALS['keluar_mulai'], $GLOBALS['keluar_akhir']);
            $simpan_absen = postdata($uid, $hari_ini, $time, $cek_absen);
            $message = telegram($uid, $time, $simpan_absen, $GLOBALS['bot_token']);
            echo $simpan_absen;
        } else {
            echo "ID Tidak Ada";
        }
    }
} else {
    echo "Coba Lagi";
}

function load_settings() {
    global $dbconnect;
    $sql = mysqli_query($dbconnect, "SELECT * FROM tb_settings");
    while ($data = mysqli_fetch_array($sql)) {
        $GLOBALS['masuk_mulai'] = $data['masuk_mulai'];
        $GLOBALS['masuk_akhir'] = $data['masuk_akhir'];
        $GLOBALS['keluar_mulai'] = $data['keluar_mulai'];
        $GLOBALS['keluar_akhir'] = $data['keluar_akhir'];
        $GLOBALS['libur1'] = $data['libur1'];
        $GLOBALS['libur2'] = $data['libur2'];
        $GLOBALS['timezone'] = $data['timezone'];
        $GLOBALS['admin_uid'] = $data['admin_uid'];
        $GLOBALS['bot_token'] = $data['bot_token'];
    }
    date_default_timezone_set($GLOBALS['timezone']);
}
?>