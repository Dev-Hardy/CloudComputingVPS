<?php
if(isset($_GET['kode'])){
    // Dapatkan path file dari database sebelum menghapus
    $sql_get_file = "SELECT file FROM e_learning WHERE id_learning='".$_GET['kode']."'";
    $query_get_file = mysqli_query($koneksi, $sql_get_file);
    $data_file = mysqli_fetch_assoc($query_get_file);
    $file_path = $data_file['file'];

    // Hapus file dari direktori jika file tersebut ada
    if (file_exists($file_path)) {
        unlink($file_path);
    }

    // Hapus entri dari database
    $sql_hapus = "DELETE FROM e_learning WHERE id_learning='".$_GET['kode']."'";
    $query_hapus = mysqli_query($koneksi, $sql_hapus);

    if ($query_hapus) {
        echo "<script>
        Swal.fire({title: 'Hapus Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {window.location = 'data.php?page=materi-pembelajaran-lokal'
        ;}})</script>";
    } else {
        echo "<script>
        Swal.fire({title: 'Hapus Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {window.location = 'data.php?page=materi-pembelajaran-lokal'
        ;}})</script>";
    }
}
?>