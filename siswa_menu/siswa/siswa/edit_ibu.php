<?php
if (isset($_SESSION['ses_id_login_siswa'])) {
	$id_login_siswa = $_SESSION['ses_id_login_siswa'];
	$koneksi = mysqli_connect("localhost", "root", "", "ppdb_sd13");

	if (!$koneksi) {
		die("Koneksi ke database gagal: " . mysqli_connect_error());
	}

	if (isset($_POST['Ubah'])) {
		$nama_ibu = mysqli_real_escape_string($koneksi, $_POST['nama_ibu']);
		$alamat_ibu = mysqli_real_escape_string($koneksi, $_POST['alamat_ibu']);
		$tgl_lahir_ibu = $_POST['tgl_lahir_ibu'];
		$tempat_lahir_ibu = mysqli_real_escape_string($koneksi, $_POST['tempat_lahir_ibu']);
		$no_hp_ibu = $_POST['no_hp_ibu'];
		$pekerjaan_ibu = mysqli_real_escape_string($koneksi, $_POST['pekerjaan_ibu']);
		$pend_terakhir_ibu = mysqli_real_escape_string($koneksi, $_POST['pend_terakhir_ibu']);

		// Memperbaiki query untuk mengambil id_ibu dari tabel biodata_siswa
		$sql_id_ibu = "SELECT biodata_ibu.id_ibu
                        FROM biodata_siswa
                        INNER JOIN biodata_ibu ON biodata_siswa.id_siswa = biodata_ibu.id_siswa
                        WHERE biodata_siswa.id_login_siswa = $id_login_siswa";

		$result_id_ibu = mysqli_query($koneksi, $sql_id_ibu);

		if ($result_id_ibu) {
			$row_id_ibu = mysqli_fetch_assoc($result_id_ibu);
			$id_ibu = $row_id_ibu['id_ibu'];

			// Memperbaiki query UPDATE untuk sesuai dengan id_ibu yang didapatkan
			$sql_ubah = "UPDATE biodata_ibu SET
                            nama_ibu='$nama_ibu',
                            alamat_ibu='$alamat_ibu',
                            tgl_lahir_ibu='$tgl_lahir_ibu',
                            tempat_lahir_ibu='$tempat_lahir_ibu',
                            no_hp_ibu='$no_hp_ibu',
                            pekerjaan_ibu='$pekerjaan_ibu',
                            pend_terakhir_ibu='$pend_terakhir_ibu'
                        WHERE id_ibu='$id_ibu'";

			$query_ubah = mysqli_query($koneksi, $sql_ubah);

			if ($query_ubah) {
				echo "<script>
                    Swal.fire({
                        title: 'Ubah Data Berhasil',
                        text: '',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.value) {
                            window.location = 'data.php?page=data-ibu';
                        }
                    });
                </script>";
			} else {
				echo "<script>
                    Swal.fire({
                        title: 'Ubah Data Gagal',
                        text: '" . mysqli_error($koneksi) . "',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.value) {
                            window.location = 'data.php?page=edit-ibu';
                        }
                    });
                </script>";
			}
		} else {
			die("Error dalam pengambilan data: " . mysqli_error($koneksi));
		}
	}

	$sql = $koneksi->query("SELECT biodata_siswa.*, biodata_ibu.*
        FROM biodata_siswa
        INNER JOIN biodata_ibu ON biodata_siswa.id_siswa = biodata_ibu.id_siswa
        WHERE biodata_siswa.id_login_siswa = $id_login_siswa");

	if ($sql) {
		$data_cek = $sql->fetch_assoc();
	} else {
		die("Error dalam pengambilan data: " . mysqli_error($koneksi));
	}
}
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i>Ubah Data Ibu</span>
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama ibu</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="<?php echo $data_cek['nama_ibu']; ?>" />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tempat Lahir</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="tempat_lahir_ibu" name="tempat_lahir_ibu" value="<?php echo $data_cek['tempat_lahir_ibu']; ?>" />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Lahir</label>
				<div class="col-sm-5">
					<input type="date" class="form-control" id="tgl_lahir_ibu" name="tgl_lahir_ibu" value="<?php echo $data_cek['tgl_lahir_ibu']; ?>" />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="alamat_ibu" name="alamat_ibu" value="<?php echo $data_cek['alamat_ibu']; ?>" />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No Hp</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="no_hp_ibu" name="no_hp_ibu" value="<?php echo $data_cek['no_hp_ibu']; ?>" />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pekerjaan ibu</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" value="<?php echo $data_cek['pekerjaan_ibu']; ?>" />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pendidikan Terakhir</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="pend_terakhir_ibu" name="pend_terakhir_ibu" value="<?php echo $data_cek['pend_terakhir_ibu']; ?>" />
				</div>
			</div>

		</div>

		<div align="center" class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-ibu" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>