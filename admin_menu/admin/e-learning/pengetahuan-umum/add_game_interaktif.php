<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Judul Game</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="judul_konten" name="judul_konten" placeholder="Masukkan Judul Game" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Link Game</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="link_yt" name="link_yt" placeholder="Masukkan Link Game" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kategori</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="kategori" name="kategori" value="Game Interaktif" readonly>
                    <input type="hidden" name="kategori" value="game">
				</div>
			</div>

            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="muatan_umum" name="muatan_umum" value="Muatan Pengetahuan Umum" readonly>
                    <input type="hidden" name="muatan_umum" value="muatan_umum">
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=game-interaktif-umum" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>
<?php
// ...
if (isset($_POST['Simpan'])) {
    // Mulai proses simpan data
    $judul_konten = $_POST['judul_konten'];
    $link_yt = $_POST['link_yt'];
    $kategori = $_POST['kategori'];
    $jenis = $_POST['muatan_lokal'];

    $sql_simpan = "INSERT INTO e_learning (judul_konten, link_yt, kategori, jenis) VALUES (
        '$judul_konten',
        '$link_yt',
        '$kategori',
        '$jenis'
    )";

    $query_simpan = mysqli_query($koneksi, $sql_simpan);
    mysqli_close($koneksi);

    if ($query_simpan) {
        echo "<script>
            Swal.fire({
                title: 'Tambah Data Berhasil',
                text: '',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'data.php?page=game-interaktif-umum';
                }
            });
        </script>";
    } else {
        echo "<script>
            Swal.fire({
                title: 'Tambah Data Gagal',
                text: '',
                icon: 'error',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'data.php?page=add-game-interaktif-umum';
                }
            });
        </script>";
    }
}
// Selesai proses simpan data
?>