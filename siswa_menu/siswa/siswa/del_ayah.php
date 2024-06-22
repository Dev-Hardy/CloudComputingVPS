<?php
if (isset($_GET['kode'])) {
    // Periksa apakah pengguna sudah login
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    // Periksa apakah pengguna login sebagai siswa
    if (isset($_SESSION['ses_id_login_siswa'])) {
        $id_login_siswa = $_SESSION['ses_id_login_siswa'];
        
        // Lakukan koneksi ke database
        $koneksi = mysqli_connect("localhost", "root", "", "ppdb_sd13");

        if (!$koneksi) {
            die("Koneksi ke database gagal: " . mysqli_connect_error());
        }

        // Periksa apakah data yang akan dihapus sesuai dengan id_login_siswa pengguna yang login
        $sql_cek = "SELECT * FROM biodata_siswa WHERE id_login_siswa = '$id_login_siswa'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
        
        if ($data_cek) {
            // Hapus data dari tabel biodata_ayah yang sesuai dengan id_siswa
            $sql_hapus = "DELETE FROM biodata_ayah WHERE id_siswa = " . $data_cek['id_siswa'];
            $query_hapus = mysqli_query($koneksi, $sql_hapus);
            
            if ($query_hapus) {
                echo "<script>
                Swal.fire({title: 'Hapus Data Berhasil', text: '', icon: 'success', confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'data.php?page=data-ayah';
                    }
                })</script>";
            } else {
                echo "<script>
                Swal.fire({title: 'Hapus Data Gagal', text: '', icon: 'error', confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'data.php?page=data-ayah';
                    }
                })</script>";
            }
        } else {
            echo "Anda tidak diizinkan menghapus data ini.";
        }
    } else {
        echo "Anda harus login sebagai siswa terlebih dahulu.";
        // Atau alihkan ke halaman login jika belum login.
        // header("Location: login.php");
    }
}
?>