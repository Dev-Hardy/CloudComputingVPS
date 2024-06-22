<?php
include('../connect/connection.php'); // Sertakan file koneksi database Anda

if (isset($_POST['nik'])) {
    $searchTerm = $_POST['nik'];

    // Lakukan kueri SQL untuk mencari hasil berdasarkan nik di tabel login_siswa
    $sql = "SELECT biodata_siswa.id_siswa, login_siswa.nik, biodata_siswa.nama_siswa, biodata_siswa.jk_siswa, hasil_seleksi.tgl_penerimaan, hasil_seleksi.jalur_penerimaan, hasil_seleksi.status_penerimaan
            FROM biodata_siswa
                LEFT JOIN login_siswa ON biodata_siswa.id_login_siswa = login_siswa.id_login_siswa
                LEFT JOIN hasil_seleksi ON biodata_siswa.id_siswa = hasil_seleksi.id_siswa
                WHERE login_siswa.nik LIKE '%$searchTerm%'";


    $result = mysqli_query($connect, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $statusClass = '';
            if ($row['status_penerimaan'] == 'Sudah di Setujui') {
                $statusClass = 'table-success';
            } elseif ($row['status_penerimaan'] == 'Tidak di Setujui') {
                $statusClass = 'table-danger';
            } else {
                $statusClass = 'table-warning';
            }
            echo "<tr class='$statusClass'>";
            echo "<td><h6>" . $row['nik'] . "</h6></td>";
            echo "<td><h6>" . $row['nama_siswa'] . "</h6></td>";
            echo "<td><h6>" . $row['jk_siswa'] . "</h6></td>";
            if ($row['tgl_penerimaan']) {
                echo "<td><h6>" . $row['tgl_penerimaan'] . "</h6></td>";
            } else {
                echo "<td><h6>-</h6></td>";
            }
            if ($row['jalur_penerimaan']) {
                echo "<td><h6>" . $row['jalur_penerimaan'] . "</h6></td>";
            } else {
                echo "<td><h6>-</h6></td>";
            }
            if ($row['status_penerimaan']) {
                echo "<td><h6>" . $row['status_penerimaan'] . "</h6></td>";
            } else {
                echo "<td><h6>Belum di Setujui</h6></td>";
            }
            echo "</tr>";
        }
    } else {
        // Tampilkan pesan jika data tidak ditemukan
        $output = "<tr><td colspan='6'>DATA TIDAK DITEMUKAN</td></tr>";
        $output .= "<tr><td colspan='6'>SILAHKAN MASUKKAN NIK SISWA YANG SESUAI</td></tr>";
        echo $output;
    }
}
