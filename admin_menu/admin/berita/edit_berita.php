<?php
if (isset($_GET['kode'])) {
    $sql_cek = "SELECT * FROM berita WHERE id_berita='" . $_GET['kode'] . "'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}

$judul_berita = isset($_POST['judul_berita']) ? mysqli_real_escape_string($koneksi, $_POST['judul_berita']) : '';
$mitra = isset($_POST['mitra']) ? mysqli_real_escape_string($koneksi, $_POST['mitra']) : '';
$penjelasan_berita = isset($_POST['penjelasan_berita']) ? mysqli_real_escape_string($koneksi, $_POST['penjelasan_berita']) : '';
?>

<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Ubah Data Berita
        </h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <!-- Form input untuk data berita -->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Judul Berita</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="judul_berita" name="judul_berita" value="<?php echo $data_cek['judul_berita']; ?>" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Mitra</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="mitra" name="mitra" value="<?php echo $data_cek['mitra']; ?>" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Penjelasan Berita</label>
                <div class="col-sm-5">
                    <textarea class="form-control" id="penjelasan_berita" name="penjelasan_berita" rows="5"><?php echo $data_cek['penjelasan_berita']; ?></textarea>
                </div>
            </div>


            <!-- Input untuk foto berita -->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Foto</label>
                <div class="col-sm-6">
                    <img src="foto/berita/<?php echo $data_cek['foto_berita']; ?>" width="160px" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Ubah Foto</label>
                <div class="col-sm-6">
                    <input type="file" id="foto_berita" name="foto_berita">
                    <p class="help-block">
                        <font color="red">"Format file Jpg/Png"</font>
                    </p>
                </div>
            </div>
            <!-- End of input foto berita -->
        </div>

        <div class="card-footer">
            <input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
            <a href="?page=data-berita" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<?php
if (isset($_POST['Ubah'])) {
    // Handle pengeditan data berita

    // Periksa apakah ada file foto yang diunggah
    if (!empty($_FILES['foto_berita']['tmp_name'])) {
        // Jika ada file foto yang diunggah, proses pemindahan foto baru ke folder 'foto/berita/'

        // Nama file foto baru
        $nama_file_baru = $_FILES['foto_berita']['name'];
        // Path tempat foto baru disimpan
        $path_foto_baru = 'foto/berita/' . $nama_file_baru;
        // Pindahkan file foto baru ke folder 'foto/berita/'
        if (move_uploaded_file($_FILES['foto_berita']['tmp_name'], $path_foto_baru)) {
            // Jika berhasil pindah, lakukan update data berita dengan foto baru
            $sql_ubah = "UPDATE berita SET
                            judul_berita='$judul_berita',
                            mitra='$mitra',
                            penjelasan_berita='$penjelasan_berita',
                            foto_berita='$nama_file_baru'
                        WHERE id_berita='" . $_GET['kode'] . "'";
        } else {
            // Jika gagal pindah, tampilkan pesan error
            echo "<script>alert('Gagal mengunggah foto.');</script>";
        }
    } else {
        // Jika tidak ada file foto yang diunggah, lakukan update data berita tanpa mengubah foto
        $sql_ubah = "UPDATE berita SET
                            judul_berita='$judul_berita',
                            mitra='$mitra',
                            penjelasan_berita='$penjelasan_berita'
                    WHERE id_berita='" . $_GET['kode'] . "'";
    }

    // Eksekusi query UPDATE
    $query_ubah = mysqli_query($koneksi, $sql_ubah);

    if ($query_ubah) {
        echo "<script>
                Swal.fire({title: 'Ubah Data Berhasil', text: '', icon: 'success', confirmButtonText: 'OK'
                }).then((result) => {
                        if (result.value) {
                                window.location = 'data.php?page=data-berita';
                        }
                })</script>";
    } else {
        echo "<script>
                Swal.fire({title: 'Ubah Data Gagal', text: '', icon: 'error', confirmButtonText: 'OK'
                }).then((result) => {
                        if (result.value) {
                                window.location = 'data.php?page=data-berita';
                        }
                })</script>";
    }
}
?>