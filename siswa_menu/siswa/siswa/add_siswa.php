<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Siswa Menu || SDN 013 Tanjungpinang Barat</title>
</head>

<body>
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">
				<i class="fa fa-edit"></i> Input Biodata Siswa
			</h3>
		</div>
		<form action="" method="post" enctype="multipart/form-data">
			<div class="card-body">

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Nama Siswa</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="nama_siswa" name="nama_siswa" placeholder="Masukkan Nama Siswa" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Tempat Lahir</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="tempat_lahir_siswa" name="tempat_lahir_siswa" placeholder="Masukkan Tempat Lahir" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Tanggal Lahir</label>
					<div class="col-sm-5">
						<input type="date" class="form-control" id="tgl_lahir_siswa" name="tgl_lahir_siswa" placeholder="Masukkan Tanggal Lahir" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Alamat Siswa</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="alamat_siswa" name="alamat_siswa" placeholder="Masukkan Alamat Domisili" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
					<div class="col-sm-5">
						<select name="jk_siswa" id="jk_siswa" class="form-control">
							<option>- Pilih -</option>
							<option>Laki-Laki</option>
							<option>Perempuan</option>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Agama</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="agama_siswa" name="agama_siswa" placeholder="Masukkan Agama" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Anak Ke-</label>
					<div class="col-sm-5">
						<input type="number" class="form-control" id="anak_ke" name="anak_ke" placeholder="Masukkan Anak Ke-" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Jumlah Saudara</label>
					<div class="col-sm-5">
						<input type="number" class="form-control" id="jumlah_saudara" name="jumlah_saudara" placeholder="Masukkan Jumlah Saudara" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Status dalam Keluarga</label>
					<div class="col-sm-5">
						<select name="status_keluarga" id="status_keluarga" class="form-control">
							<option>- Pilih -</option>
							<option>Anak Kandung</option>
							<option>Anak Angkat</option>
							<option>Lainnya</option>
						</select>
					</div>
				</div>


			</div>
			<div class="card-footer">
				<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
				<a href="?page=data-siswa" title="Batal" class="btn btn-secondary">Batal</a>
			</div>
		</form>
	</div>

	<?php
	// Lakukan koneksi ke database
	$koneksi = mysqli_connect("localhost", "root", "", "ppdb_sd13");

	if (!$koneksi) {
		die("Koneksi ke database gagal: " . mysqli_connect_error());
	}

	// Pastikan sesi sudah aktif
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}

	// Periksa apakah pengguna sudah login sebagai siswa
	if (isset($_SESSION['ses_id_login_siswa'])) {
		$id_login_siswa = $_SESSION['ses_id_login_siswa'];

		if (isset($_POST['Simpan'])) {
			// Ambil data dari formulir
			$nama_siswa = mysqli_real_escape_string($koneksi, $_POST['nama_siswa']);
			$tempat_lahir_siswa = mysqli_real_escape_string($koneksi, $_POST['tempat_lahir_siswa']);
			$tgl_lahir_siswa = mysqli_real_escape_string($koneksi, $_POST['tgl_lahir_siswa']);
			$alamat_siswa = mysqli_real_escape_string($koneksi, $_POST['alamat_siswa']);
			$jk_siswa = mysqli_real_escape_string($koneksi, $_POST['jk_siswa']);
			$agama_siswa = mysqli_real_escape_string($koneksi, $_POST['agama_siswa']);
			$anak_ke = mysqli_real_escape_string($koneksi, $_POST['anak_ke']);
			$jumlah_saudara = mysqli_real_escape_string($koneksi, $_POST['jumlah_saudara']);
			$status_keluarga = mysqli_real_escape_string($koneksi, $_POST['status_keluarga']);

			// Query untuk memasukkan data ke tabel biodata_siswa
			$sql_simpan = "INSERT INTO biodata_siswa (id_login_siswa, nama_siswa, tempat_lahir_siswa, tgl_lahir_siswa, alamat_siswa, jk_siswa, agama_siswa, anak_ke, jumlah_saudara, status_keluarga) VALUES ('$id_login_siswa', '$nama_siswa', '$tempat_lahir_siswa', '$tgl_lahir_siswa', '$alamat_siswa', '$jk_siswa', '$agama_siswa', '$anak_ke', '$jumlah_saudara', '$status_keluarga')";
			$query_simpan = mysqli_query($koneksi, $sql_simpan);

			if ($query_simpan) {
				echo "<script>
            Swal.fire({title: 'Tambah Data Berhasil', text: '', icon: 'success', confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'data.php?page=data-siswa';
                }
            })</script>";
			} else {
				echo "<script>
            Swal.fire({title: 'Tambah Data Gagal', text: '', icon: 'error', confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'data.php?page=add-siswa';
                }
            })</script>";
			}
		}
		// Selesai proses simpan data
	} else {
		echo 'Anda harus login sebagai siswa terlebih dahulu.';
		// Atau alihkan ke halaman login jika belum login.
		// header("Location: login.php");
	}
	?>

</body>

</html>