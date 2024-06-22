<?php
// Pastikan variabel $koneksi sudah terdefinisi dan terkoneksi ke database MySQL
if (isset($_GET['kode']) && isset($koneksi)) {
    $kode_siswa = mysqli_real_escape_string($koneksi, $_GET['kode']); // Menghindari SQL injection
    $sql_cek = "SELECT * FROM biodata_siswa WHERE id_siswa='" . $kode_siswa . "'";
    $query_cek = mysqli_query($koneksi, $sql_cek);

    if (mysqli_num_rows($query_cek) > 0) {
        // Data siswa ditemukan, lanjutkan dengan penghapusan
        $sql_hapus = "DELETE FROM biodata_siswa WHERE id_siswa='" . $kode_siswa . "'";
        $query_hapus = mysqli_query($koneksi, $sql_hapus);

        if ($query_hapus) {
            echo "<script>
                Swal.fire({
                    title: 'Hapus Data Berhasil',
                    text: '',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'data.php?page=data-siswa';
                    }
                });
            </script>";
        } else {
            echo "<script>
                Swal.fire({
                    title: 'Hapus Data Gagal',
                    text: '',
                    icon: 'error',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'data.php?page=data-siswa';
                    }
                });
            </script>";
        }
    } else {
        echo "<script>
            Swal.fire({
                title: 'Data Siswa Tidak Ditemukan',
                text: '',
                icon: 'warning',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'data.php?page=data-siswa';
                }
            });
        </script>";
    }
} else {
    echo "Kode siswa tidak valid atau koneksi ke database tidak terdefinisi.";
}
?>