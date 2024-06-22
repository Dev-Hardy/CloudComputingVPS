<?php
if (isset($_GET['kode'])) {
    $sql_cek = "SELECT * FROM e_learning WHERE id_learning='" . $_GET['kode'] . "'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}

$judul_konten = isset($_POST['judul_konten']) ? mysqli_real_escape_string($koneksi, $_POST['judul_konten']) : '';
$link_yt = isset($_POST['link_yt']) ? mysqli_real_escape_string($koneksi, $_POST['link_yt']) : '';

?>

<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Ubah Konten Game - Muatan Lokal Budaya Melayu
        </h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Judul Game</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="judul_konten" name="judul_konten" value="<?php echo $data_cek['judul_konten']; ?>" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Link Game</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="link_yt" name="link_yt" value="<?php echo $data_cek['link_yt']; ?>" />
                </div>
            </div>

        </div>

        <div class="card-footer">
            <input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
            <a href="?page=game-interaktif" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<?php
if (isset($_POST['Ubah'])) {
    $sql_ubah = "UPDATE e_learning SET
                        judul_konten='$judul_konten',
                        link_yt='$link_yt'
                    WHERE id_learning='" . $_GET['kode'] . "'";

    $query_ubah = mysqli_query($koneksi, $sql_ubah);

    if ($query_ubah) {
        echo "<script>
                Swal.fire({title: 'Ubah Data Berhasil', text: '', icon: 'success', confirmButtonText: 'OK'
                }).then((result) => {
                        if (result.value) {
                                window.location = 'data.php?page=game-interaktif';
                        }
                })</script>";
    } else {
        echo "<script>
                Swal.fire({title: 'Ubah Data Gagal', text: '', icon: 'error', confirmButtonText: 'OK'
                }).then((result) => {
                        if (result.value) {
                                window.location = 'data.php?page=game-interaktif';
                        }
                })</script>";
    }
}
?>