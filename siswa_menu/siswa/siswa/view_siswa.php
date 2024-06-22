<?php
if (isset($_SESSION['ses_id_login_siswa'])) {
	// Ambil ID login siswa dari sesi
	$id_login_siswa = $_SESSION['ses_id_login_siswa'];

	// Lakukan koneksi ke database dan pastikan koneksi disetel dengan benar
	$koneksi = mysqli_connect("localhost", "root", "", "ppdb_sd13");

	if (!$koneksi) {
		die("Koneksi ke database gagal: " . mysqli_connect_error());
	}

	// Query untuk mengambil data siswa berdasarkan ID login siswa yang sudah login
	$sql = $koneksi->query("SELECT * FROM biodata_siswa
        INNER JOIN login_siswa ON biodata_siswa.id_login_siswa = login_siswa.id_login_siswa
        WHERE biodata_siswa.id_login_siswa = $id_login_siswa");

	if ($sql) {
		$data_cek = $sql->fetch_assoc(); // Ambil data dari hasil kueri
	} else {
		die("Error dalam pengambilan data: " . mysqli_error($koneksi));
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<div class="row">

		<div class="col-md-8">
			<div class="card card-info">
				<div class="card-header">
					<h3 class="card-title">Detail Siswa</h3>

					<div class="card-tools">
					</div>
				</div>
				<div class="card-body p-0">
					<table class="table">
						<tbody>
							<tr>
								<td style="width: 180px">
									<b>NIK</b>
								</td>
								<td>:
									<?php echo $data_cek['nik']; ?>
								</td>
							</tr>
							<tr>
								<td style="width: 180px">
									<b>Nama Siswa</b>
								</td>
								<td>:
									<?php echo $data_cek['nama_siswa']; ?>
								</td>
							</tr>
							<tr>
								<td style="width: 180px">
									<b>Tempat Lahir</b>
								</td>
								<td>:
									<?php echo $data_cek['tempat_lahir_siswa']; ?>
								</td>
							</tr>
							<tr>
								<td style="width: 180px">
									<b>Tanggal Lahir</b>
								</td>
								<td>:
									<?php echo $data_cek['tgl_lahir_siswa']; ?>
								</td>
							</tr>
							<tr>
								<td style="width: 180px">
									<b>Alamat</b>
								</td>
								<td>:
									<?php echo $data_cek['alamat_siswa']; ?>
								</td>
							</tr>
							<tr>
								<td style="width: 180px">
									<b>Jenis Kelamin</b>
								</td>
								<td>:
									<?php echo $data_cek['jk_siswa']; ?>
								</td>
							</tr>
							<tr>
								<td style="width: 180px">
									<b>Agama</b>
								</td>
								<td>:
									<?php echo $data_cek['agama_siswa']; ?>
								</td>
							</tr>
							<tr>
								<td style="width: 180px">
									<b>Anak Ke-</b>
								</td>
								<td>:
									<?php echo $data_cek['anak_ke']; ?>
								</td>
							</tr>
							<tr>
								<td style="width: 180px">
									<b>Jumlah Saudara</b>
								</td>
								<td>:
									<?php echo $data_cek['jumlah_saudara']; ?>
								</td>
							</tr>
							<tr>
								<td style="width: 180px">
									<b>Status</b>
								</td>
								<td>:
									<?php echo $data_cek['status_keluarga']; ?>
								</td>
							</tr>
						</tbody>
					</table>
					<div class="card-footer">
						<a href="?page=data-siswa" class="btn btn-warning">Kembali</a>

						<a href="./report/cetak-pegawai.php?nip=<?php echo $data_cek['nik']; ?>" target=" _blank" title="Cetak Data Siswa" class="btn btn-primary">Print</a>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="card card-success">
				<div class="card-header">
					<center>
						<h3 class="card-title">
							Foto Siswa
						</h3>
					</center>

					<div class="card-tools">
					</div>
				</div>
				<div class="card-body">
					<div class="text-center">
						<?php
						if ($data_cek) {
							// Sekarang, kita akan mengambil pas_foto dari tabel berkas berdasarkan id_siswa
							$id_siswa = $data_cek['id_siswa'];
							$sql_berkas = $koneksi->query("SELECT pas_foto FROM berkas WHERE id_siswa = $id_siswa");

							if ($sql_berkas) {
								$data_berkas = $sql_berkas->fetch_assoc();

								// Periksa apakah pas_foto sudah diisi
								if (!empty($data_berkas['pas_foto'])) {
									// Jika pas_foto sudah diisi, tampilkan gambar
									echo '<img src="foto/' . $data_berkas['pas_foto'] . '" width="280px" />';
								} else {
									// Jika pas_foto belum diisi, tampilkan pesan atau tombol upload di sini
									echo '<p>Pas Foto belum diisi.</p>';
									echo '<a href="?page=data-berkas" class="btn btn-primary">Upload Pas Foto</a>';
								}
							} else {
								die("Error dalam pengambilan data berkas: " . mysqli_error($koneksi));
							}
						}
						?>
					</div>

					<h3 class="profile-username text-center">
						<b class="text-danger">NAMA SISWA</b> <br>
						<?php echo $data_cek['nama_siswa']; ?>
					</h3>
				</div>
			</div>
		</div>

	</div>
</body>

</html>