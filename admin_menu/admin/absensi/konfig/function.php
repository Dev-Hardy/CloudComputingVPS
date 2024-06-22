<?php

include 'connection.php';
//=====================================Load Settings From Database=======================================
$sql = mysqli_query($dbconnect, "SELECT * FROM tb_settings");
while ($data = mysqli_fetch_array($sql)) {
    $masuk_mulai = $data['masuk_mulai'];
    $masuk_akhir = $data['masuk_akhir'];
    $keluar_mulai = $data['keluar_mulai'];
    $keluar_akhir = $data['keluar_akhir'];
    $libur1 = $data['libur1'];
    $libur2 = $data['libur2'];
    $timezone = $data['timezone'];
    $admin_uid = $data['admin_uid'];
    $bot_token = $data['bot_token'];
}
//====================================Load Timezone====================================================
date_default_timezone_set($timezone);
//=====================================Check Day Off================================================
//=====================================Check Day Off================================================
function getday($tanggal)
{
    $tgl = substr($tanggal, 8, 2);
    $bln = substr($tanggal, 5, 2);
    $thn = substr($tanggal, 0, 4);
    $info = date('w', mktime(0, 0, 0, $bln, $tgl, $thn));
    switch ($info) {
        case '0':
            return "Minggu";
        case '1':
            return "Senin";
        case '2':
            return "Selasa";
        case '3':
            return "Rabu";
        case '4':
            return "Kamis";
        case '5':
            return "Jumat";
        case '6':
            return "Sabtu";
    }
}

//=====================================Check UID in DB==============================================
function uid($id)
{
    global $dbconnect;
    $sql = mysqli_query($dbconnect, "SELECT * FROM tb_id WHERE id='$id'");
    return mysqli_num_rows($sql) > 0 ? "0" : "1";
}

//=====================================Check Attendance Time==============================================
function cektime($time, $m_mulai, $m_akhir, $k_mulai, $k_akhir)
{
    if ($time > $m_mulai && $time < $m_akhir) {
        return "in"; //parameter absen masuk
    } elseif ($time > $m_akhir && $time < $k_mulai) {
        return "terlambat"; //parameter absen masuk terlambat
    } elseif ($time > $k_mulai && $time < $k_akhir) {
        return "out"; //parameter absen pulang
    } else {
        return "bolos"; //parameter tidak diset
    }
}

//===============================Insert or Update Database Attendance==================================
function postdata($uid, $hari_ini, $time, $cek_absen)
{
    global $dbconnect;

    // Handle check-in actions
    if ($cek_absen == "in" || $cek_absen == "terlambat") {
        $status = $cek_absen == "in" ? "HADIR" : "TERLAMBAT";
        $query = mysqli_query($dbconnect, "SELECT * FROM tb_absen_masuk WHERE id='$uid' AND date='$hari_ini'");
        $auth = mysqli_num_rows($query);

        if ($auth > 0) {
            mysqli_query($dbconnect, "UPDATE tb_absen_masuk SET masuk='$time', status='$status' WHERE id='$uid' AND date='$hari_ini'");
        } else {
            mysqli_query($dbconnect, "INSERT INTO tb_absen_masuk (id, masuk, date, status, keterangan, berkas) VALUES ('$uid', '$time', '$hari_ini', '$status', '', '')");
        }
        return $cek_absen == "in" ? "PRESENSI TEPAT WAKTU!" : "PRESENSI TERLAMBAT!";
    }

    // Handle check-out actions
    if ($cek_absen == "out" || $cek_absen == "bolos") {
        $query_masuk = mysqli_query($dbconnect, "SELECT * FROM tb_absen_masuk WHERE id='$uid' AND date='$hari_ini'");
        $data_masuk = mysqli_fetch_array($query_masuk);
        $masuk = isset($data_masuk['masuk']) ? $data_masuk['masuk'] : "";

        $status = "BOLOS";
        if ($cek_absen == "out" && $masuk != "") {
            // Status for check-out does not follow "TERLAMBAT" from check-in
            $status = "HADIR";
        }

        $query_keluar = mysqli_query($dbconnect, "SELECT * FROM tb_absen_keluar WHERE id='$uid' AND date='$hari_ini'");
        $auth_keluar = mysqli_num_rows($query_keluar);

        if ($auth_keluar > 0) {
            mysqli_query($dbconnect, "UPDATE tb_absen_keluar SET keluar='$time', status='$status' WHERE id='$uid' AND date='$hari_ini'");
        } else {
            mysqli_query($dbconnect, "INSERT INTO tb_absen_keluar (id, keluar, date, status, keterangan, berkas) VALUES ('$uid', '$time', '$hari_ini', '$status', '', '')");
        }
        return $cek_absen == "out" ? "PRESENSI KELUAR!" : "PRESENSI BOLOS!";
    }

    mysqli_close($dbconnect);
}

//===============================Send Telegram Notification==================================
function telegram($uid, $jam_absen, $status, $secret_token)
{
    global $dbconnect;
    $sql = mysqli_query($dbconnect, "SELECT * FROM tb_id WHERE id='$uid'");
    while ($results = mysqli_fetch_array($sql)) {
        $nama = $results['nama'];
        $chat_id = $results['chatid'];
        $status_kartu = $results['status_kartu'];
        $tahun_masuk = $results['tahun_masuk'];

        // Determine identifier label and value based on card status
        $identifier_label = $status_kartu == 'Guru' ? 'NIP' : 'NISN';
        $identifier_value = $results['nisn'];

        // Create message text
        $message_text = "Halo $nama\n$identifier_label: $identifier_value\nTahun Masuk: $tahun_masuk\nStatus: $status_kartu\nWaktu Absen: $jam_absen,\nPresensi anda telah berhasil disimpan. dengan status saat ini: \n$status";

        // URL to send the message
        $url = "https://api.telegram.org/bot$secret_token/sendMessage?parse_mode=markdown&chat_id=$chat_id&text=" . urlencode($message_text);

        // Send the message using curl
        $ch = curl_init();
        $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
        );
        curl_setopt_array($ch, $optArray);
        curl_exec($ch);
        curl_close($ch);
    }
}
