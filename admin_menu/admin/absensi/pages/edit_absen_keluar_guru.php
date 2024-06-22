<?php

// Memeriksa apakah sesi telah dimulai dan variabel 'page' telah diset
if (!isset($_SESSION['page'])) {
	header("Location: ../index.php?page=dashboard&error=true");
	exit;
}

// Memeriksa apakah semua parameter GET yang diperlukan tersedia
if (!isset($_GET['id'], $_GET['nama'], $_GET['tanggal'], $_GET['status'], $_GET['flag'])) {
	echo '<h3><center> Permintaan ditolak :( </center></h3>';
	exit;
}

$uid = $_GET['id'];
$nama = $_GET['nama'];
$tanggal = $_GET['tanggal'];
$status = $_GET['status'];
$flag = $_GET['flag'];

// Koneksi ke database
include './konfig/connection.php'; // Sesuaikan dengan file koneksi Anda

// Query untuk mengambil status dan keterangan dari tb_absen
$query = mysqli_query($dbconnect, "SELECT id, date, status, keterangan FROM tb_absen_keluar WHERE id='$uid' AND date='$tanggal'");
if ($query) {
	$data = mysqli_fetch_assoc($query);
	if ($data) {
		$uid = $data['id'];
		$tanggal = $data['date'];
		$status_terpilih = $data['status'];
		$keterangan_terpilih = $data['keterangan'];
	} else {
		// Jika tidak ada data ditemukan, munculkan form untuk absen guru baru
	?>

	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Edit Presensi Guru</title>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	</head>
	<body>
		<div class="container mt-4">
			<div class="row">
				<div class="col-md-8 offset-md-2">
					<div class="card">
						<div class="card-header bg-info text-white">
							<h1 class="m-0">EDIT PRESENSI GURU</h1>
						</div>
						<div class="card-body">
							<form action="./konfig/update_keterangan_keluar_guru.php" method="POST" enctype="multipart/form-data">
								<input type="hidden" name="flag" value="<?php echo $flag; ?>">
								<input type="hidden" name="id" value="<?php echo $uid; ?>">
								<input type="hidden" name="tanggal" value="<?php echo $tanggal; ?>">

								<div class="form-group">
									<label for="uid">UID</label>
									<input required class="form-control" type="text" id="uid" placeholder="Masukan UID" value="<?php echo $uid; ?>" readonly>
								</div>

								<div class="form-group">
									<label for="nama">Nama Guru</label>
									<input required class="form-control" type="text" id="nama" placeholder="Masukan Nama" value="<?php echo $nama; ?>" readonly>
								</div>

								<div class="form-group pt-2">
									<label for="status">Status Kehadiran</label>
									<select class="form-control" name="status" id="status" required>
										<option value="" selected disabled>Presensi saat ini : <?php echo $status; ?></option>
										<option value="HADIR">HADIR</option>
										<option value="IZIN">IZIN</option>
										<option value="SAKIT">SAKIT</option>
										<option value="BOLOS">BOLOS</option>
										<option value="TERLAMBAT">TERLAMBAT</option>
										<option value="ALPA">ALPA</option>
									</select>
									<small class="form-text text-muted">H=Hadir - I=Izin - S=Sakit - B=Bolos - T=Terlambat - A=Alpa</small>
								</div>

								<div class="form-group pt-2">
									<label for="keterangan">Keterangan</label>
									<textarea required class="form-control" id="keterangan" name="keterangan" rows="3" maxlength="100" placeholder="Max 100 karakter."></textarea>
								</div>

								<div class="form-group pt-2">
									<label for="fileUpload">Upload Surat Sakit/Izin (jpg, png, pdf)</label>
									<input type="file" class="form-control" id="fileUpload" name="fileUpload" accept=".jpg, .png, .pdf">
								</div>

								<div class="form-group pt-2">
									<label>Belum ada data yang ditemukan</label>
								</div>

								<div class="form-group pt-3">
									<button type="submit" class="btn btn-outline-success ml-2">Simpan</button>
									<a href="index.php?page=absensi-keluar-guru" class="btn btn-outline-danger ml-2">Batal</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php
		exit;
	}
} else {
	// Handle error jika query tidak berhasil
	echo '<h3><center> Error saat mengambil data dari database :( </center></h3>';
	exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Presensi Guru</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
	<div class="container mt-4">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<div class="card">
					<div class="card-header bg-info text-white">
						<h1 class="m-0">EDIT PRESENSI GURU</h1>
					</div>
					<div class="card-body">
						<form action="./konfig/update_keterangan_keluar_guru.php" method="POST" enctype="multipart/form-data">

							<input type="hidden" id="custId" name="flag" value="<?php echo $flag; ?>">

							<div class="form-group">
								<label for="exampleInputEmail1">UID</label>
								<input required class="form-control" type="text" name="id" placeholder="Masukan UID" value="<?php echo $uid ?>" readonly>
							</div>

							<div class="form-group">
								<label for="exampleInputEmail1">Nama Guru</label>
								<input required class="form-control" type="text" placeholder="Masukan Nama" value="<?php echo $nama ?>" readonly>
							</div>

							<div class="form-group pt-2">
								<label for="exampleInputEmail1">Tanggal</label>
								<input required class="form-control" type="text" name="tanggal" placeholder="Masukan Tanggal" value="<?php echo $tanggal ?>" readonly>
							</div>

							<div class="form-group pt-2">
								<label for="status">Status Kehadiran</label>
								<select class="form-control" name="status" id="status" required>
									<option value="" disabled>Pilih Status</option>
									<option value="HADIR" <?php echo ($status_terpilih === 'HADIR') ? 'selected' : ''; ?>>
										HADIR
									</option>
									<option value="IZIN" <?php echo ($status_terpilih === 'IZIN') ? 'selected' : ''; ?>>
										IZIN
									</option>
									<option value="SAKIT" <?php echo ($status_terpilih === 'SAKIT') ? 'selected' : ''; ?>>
										SAKIT
									</option>
									<option value="BOLOS" <?php echo ($status_terpilih === 'BOLOS') ? 'selected' : ''; ?>>
										BOLOS
									</option>
									<option value="TERLAMBAT" <?php echo ($status_terpilih === 'TERLAMBAT') ? 'selected' : ''; ?>>
										TERLAMBAT
									</option>
									<option value="ALPA" <?php echo ($status_terpilih === 'ALPA') ? 'selected' : ''; ?>>
										ALPA
									</option>
								</select>
								<small class="form-text text-muted">H=Hadir - I=Izin - S=Sakit - B=Bolos - T=Terlambat
									- A=Alpa</small>
							</div>

							<div class="form-group pt-2">
								<label for="keterangan">Keterangan</label>
								<textarea required class="form-control" id="keterangan" name="keterangan" rows="3" maxlength="100" placeholder="Max 100 karakter."><?php echo $keterangan_terpilih; ?></textarea>
							</div>

							<div class="form-group pt-2">
								<label for="fileUpload">Upload Surat Sakit/Izin (jpg, png, pdf)</label>
								<input type="file" class="form-control" id="fileUpload" name="fileUpload" accept=".jpg, .png, .pdf">
							</div>

							<?php
							// Mengambil informasi file dari database jika sudah ada
							include './konfig/connection.php'; // Sesuaikan dengan file koneksi Anda

							$query = mysqli_query($dbconnect, "SELECT berkas FROM tb_absen_keluar WHERE id='$uid' AND date='$tanggal'");
							if ($query) {
								$fileRow = mysqli_fetch_assoc($query);
								if ($fileRow) {
									$fileBerkas = $fileRow['berkas'];

									// Menampilkan tautan unduh jika file sudah ada
									if (!empty($fileBerkas)) {
										$downloadLink = './konfig/berkasGuru/' . $fileBerkas; // Pastikan $fileBerkas berisi nama file dengan ekstensi yang benar (misalnya 'file.pdf')
										echo '<div class="form-group pt-2">';
										echo '<label>File yang sudah diunggah:</label><br>';
										echo '<a href="' . $downloadLink . '" class="btn btn-primary" download="' . basename($fileBerkas) . '">Unduh File</a>'; // basename($fileBerkas) akan mengambil nama file dengan ekstensinya
										echo '</div>';
									} else {
										// Jika file belum ada, berikan pesan atau tindakan tambahan
										echo '<div class="form-group pt-2">';
										echo '<label>Belum ada file yang diunggah</label>';
										echo '</div>';
									}
								} else {
									// Handle case where $fileRow is null or empty
									echo '<div class="form-group pt-2">';
									echo '<label>Belum ada file yang diunggah</label>';
									echo '</div>';
								}
							} else {
								// Handle error jika query tidak berhasil
								echo '<div class="form-group pt-2">';
								echo '<label>Error saat mengambil informasi file dari database</label>';
								echo '</div>';
							}
							?>

							<div class="form-group pt-3">
								<button type="submit" class="btn btn-outline-success ml-2">Simpan</button>
								<a href="index.php?page=absensi-keluar-guru" class="btn btn-outline-danger ml-2">Batal</a>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>