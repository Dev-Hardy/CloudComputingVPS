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
				<i class="fa fa-edit"></i> Input Biodata Ayah
			</h3>
		</div>
		<form action="" method="post" enctype="multipart/form-data">
			<div class="card-body">
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Nama Ayah</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="nama_ayah" name="nama_ayah" placeholder="Masukkan Nama Ayah" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Alamat Ayah</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="alamat_ayah" name="alamat_ayah" placeholder="Masukkan Alamat Ayah" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Tempat Lahir</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="tempat_lahir_ayah" name="tempat_lahir_ayah" placeholder="Masukkan Tempat Lahir Ayah" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Tanggal Lahir</label>
					<div class="col-sm-5">
						<input type="date" class="form-control" id="tgl_lahir_ayah" name="tgl_lahir_ayah" placeholder="Masukkan Tanggal Lahir Ayah" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">No Hp Ayah</label>
					<div class="col-sm-5">
						<input type="number" class="form-control" id="no_hp_ayah" name="no_hp_ayah" placeholder="Masukkan No Hp Ayah" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Pekerjaan Ayah</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" placeholder="Masukkan Pekerjaan Ayah" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Pendidikan Terakhir Ayah</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="pend_terakhir_ayah" name="pend_terakhir_ayah" placeholder="Masukkan Pendidikan Terakhir Ayah" required>
					</div>
				</div>

			</div>
			<div class="card-footer">
				<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
				<a href="?page=data-ayah" title="Batal" class="btn btn-secondary">Batal</a>
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

	if (isset($_SESSION['ses_id_login_siswa'])) {
		$id_login_siswa = $_SESSION['ses_id_login_siswa'];

		// Query untuk mendapatkan id_siswa berdasarkan id_login_siswa
		$sql_get_id_siswa = "SELECT id_siswa FROM biodata_siswa WHERE id_login_siswa = '$id_login_siswa'";
		$query_get_id_siswa = mysqli_query($koneksi, $sql_get_id_siswa);

		if ($query_get_id_siswa && mysqli_num_rows($query_get_id_siswa) > 0) {
			$row = mysqli_fetch_assoc($query_get_id_siswa);
			$id_siswa = $row['id_siswa'];

			if (isset($_POST['Simpan'])) {
				// Ambil data dari formulir
				$nama_ayah = mysqli_real_escape_string($koneksi, $_POST['nama_ayah']);
				$tempat_lahir_ayah = mysqli_real_escape_string($koneksi, $_POST['tempat_lahir_ayah']);
				$tgl_lahir_ayah = mysqli_real_escape_string($koneksi, $_POST['tgl_lahir_ayah']);
				$alamat_ayah = mysqli_real_escape_string($koneksi, $_POST['alamat_ayah']);
				$no_hp_ayah = mysqli_real_escape_string($koneksi, $_POST['no_hp_ayah']);
				$pekerjaan_ayah = mysqli_real_escape_string($koneksi, $_POST['pekerjaan_ayah']);
				$pend_terakhir_ayah = mysqli_real_escape_string($koneksi, $_POST['pend_terakhir_ayah']);

				// Query untuk memasukkan data ke tabel biodata_ayah
				$sql_simpan = "INSERT INTO biodata_ayah (id_siswa, nama_ayah, tempat_lahir_ayah, tgl_lahir_ayah, alamat_ayah, no_hp_ayah, pekerjaan_ayah, pend_terakhir_ayah) VALUES ('$id_siswa', '$nama_ayah', '$tempat_lahir_ayah', '$tgl_lahir_ayah', '$alamat_ayah', '$no_hp_ayah', '$pekerjaan_ayah', '$pend_terakhir_ayah')";

				$query_simpan = mysqli_query($koneksi, $sql_simpan);

				if ($query_simpan) {
					echo "<script>
                    Swal.fire({title: 'Tambah Data Berhasil', text: '', icon: 'success', confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.value) {
                            window.location = 'data.php?page=data-ayah';
                        }
                    })</script>";
				} else {
					echo "<script>
                    Swal.fire({title: 'Tambah Data Gagal', text: '', icon: 'error', confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.value) {
                            window.location = 'data.php?page=add-ayah';
                        }
                    })</script>";
				}
			}
		} else {
			echo 'Tidak dapat menemukan id_siswa berdasarkan id_login_siswa.';
		}
	} else {
		echo 'Anda harus login sebagai siswa terlebih dahulu.';
		// Atau alihkan ke halaman login jika belum login.
		// header("Location: login.php");
	}
	?>

</body>

</html>