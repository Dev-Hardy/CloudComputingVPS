<?php
if (isset($_GET['kode'])) {
	$id_siswa = $_GET['kode'];
	$sql_cek = "SELECT biodata_siswa.*, hasil_seleksi.* FROM biodata_siswa
        LEFT JOIN hasil_seleksi ON biodata_siswa.id_siswa = hasil_seleksi.id_siswa WHERE hasil_seleksi.id_siswa='$id_siswa'";
	$query_cek = mysqli_query($koneksi, $sql_cek);

	if ($query_cek && $data_cek = mysqli_fetch_assoc($query_cek)) {
?>
		<div class="card card-success">
			<div class="card-header">
				<h3 class="card-title">
					<i class="fa fa-edit"></i>Ubah Data Verifikasi - <span style="color: white;"><?php echo $data_cek['nama_siswa']; ?></span>
				</h3>
			</div>
			<form action="" method="post" enctype="multipart/form-data">
				<div class="card-body">
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Jalur Penerimaan</label>
						<div class="col-sm-4">
							<select name="jalur_penerimaan" id="jalur_penerimaan" class="form-control">
								<option value="">-- Pilih --</option>
								<?php
								// Cek data yang dipilih sebelumnya
								$selectedJalur = $data_cek['jalur_penerimaan'];
								$jalurOptions = ["Zonasi", "Afirmasi", "Perpindahan Orangtua","-"];
								foreach ($jalurOptions as $jalur) {
									$selected = ($selectedJalur === $jalur) ? 'selected' : '';
									echo "<option value='$jalur' $selected>$jalur</option>";
								}
								?>
							</select>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Tanggal Pengecekan Status</label>
						<div class="col-sm-5">
							<input type="date" class="form-control" id="tgl_penerimaan" name="tgl_penerimaan" value="<?php echo $data_cek['tgl_penerimaan']; ?>" />
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-2 col-form-label text-danger">Status Verifikasi</label>
						<div class="col-sm-4">
							<select name="status_penerimaan" id="status_penerimaan" class="form-control">
								<option value="" disabled>Pilih Status Verifikasi</option>
								<?php
								$selectedStatus = $data_cek['status_penerimaan'];
								$statusOptions = ["Belum di Setujui", "Sudah di Setujui", "Tidak di Setujui"];
								foreach ($statusOptions as $status) {
									$selected = ($selectedStatus === $status) ? 'selected' : '';
									echo "<option value='$status' $selected>$status</option>";
								}
								?>
							</select>
						</div>
					</div>


				</div>

				<div class="card-footer">
					<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
					<a href="?page=proses-verifikasi" title="Kembali" class="btn btn-secondary">Batal</a>
				</div>
			</form>
		</div>
<?php
	}
}

if (isset($_POST['Ubah'])) {
	// Mengambil data dari formulir
	$tgl_penerimaan = mysqli_real_escape_string($koneksi, $_POST['tgl_penerimaan']);
	$jalur_penerimaan = mysqli_real_escape_string($koneksi, $_POST['jalur_penerimaan']);
	$status_penerimaan = mysqli_real_escape_string($koneksi, $_POST['status_penerimaan']);

	// Memperbarui data hasil seleksi
	$sql_ubah = "UPDATE hasil_seleksi SET
		tgl_penerimaan='$tgl_penerimaan',
		jalur_penerimaan='$jalur_penerimaan',
		status_penerimaan='$status_penerimaan'
		WHERE id_siswa='$id_siswa'";

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
								window.location = 'data.php?page=proses-verifikasi';
						}
				});
		</script>";
	} else {
		echo "<script>
				Swal.fire({
						title: 'Ubah Data Gagal',
						text: '',
						icon: 'error',
						confirmButtonText: 'OK'
				}).then((result) => {
						if (result.value) {
								window.location = 'data.php?page=edit-verifikasi&kode=" . $_GET['kode'] . "';
						}
				});
		</script>";
	}
}
?>