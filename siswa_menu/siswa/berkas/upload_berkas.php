<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		thead .tabel {
			display: flex;
			justify-content: center;
			align-items: center;
			text-align: center;
		}

		.tabel-aksi {
			display: flex;
			justify-content: center;
			align-items: center;
			text-align: center;
		}
	</style>
</head>

<body>
	<div class="card card-info">
		<div class="card-header">
			<h3 class="card-title">
				<i class="fa fa-table"></i> Berkas
			</h3>
		</div>
		<?php
		// Periksa apakah sesi sudah aktif
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}

		// Periksa apakah pengguna sudah login
		if (isset($_SESSION['ses_id_login_siswa'])) {
			// Ambil ID login siswa dari sesi
			$id_login_siswa = $_SESSION['ses_id_login_siswa'];

			// Lakukan koneksi ke database dan pastikan koneksi disetel dengan benar
			$koneksi = mysqli_connect("localhost", "root", "", "ppdb_sd13");

			if (!$koneksi) {
				die("Koneksi ke database gagal: " . mysqli_connect_error());
			}

			// Query untuk mengambil data berkas siswa berdasarkan login siswa
			$sql = $koneksi->query("SELECT * FROM berkas
														INNER JOIN biodata_siswa ON berkas.id_siswa = biodata_siswa.id_siswa
														INNER JOIN login_siswa ON biodata_siswa.id_login_siswa = login_siswa.id_login_siswa
														WHERE login_siswa.id_login_siswa = $id_login_siswa");

			// Query untuk memeriksa apakah ada biodata siswa
			$sql_check_biodata = $koneksi->query("SELECT * FROM biodata_siswa WHERE id_login_siswa = $id_login_siswa");

			if ($sql_check_biodata->num_rows > 0) {
				if ($sql->num_rows > 0) {
					// Tampilkan tabel hanya jika ada data yang ditemukan
		?>
					<!-- /.card-header -->
					<div class="card-body">
						<div class="table-responsive">
							<br>
							<table id="example1" class="table table-bordered table-striped">
								<thead class="tabel">
									<tr class="text-center">
										<th>Berkas Kartu Keluarga</th>
										<th>Berkas Akta Lahir</th>
										<th>Berkas KTP</th>
										<th>Berkas Pas Foto</th>
									</tr>
								</thead>
								<tbody class="text-center">
									<?php
									while ($data = $sql->fetch_assoc()) {
									?>
										<tr align="center" class="text-center">
											<td align="center">
												<img src="foto/<?php echo $data['kartu_keluarga']; ?>" width="250px" height="150px" />
											</td>
											<td align="center">
												<img src="foto/<?php echo $data['akta_lahir']; ?>" width="250px" height="150px" />
											</td>
											<td align="center">
												<img src="foto/<?php echo $data['ktp']; ?>" width="250px" height="150px" />
											</td>
											<td align="center">
												<img src="foto/<?php echo $data['pas_foto']; ?>" width="100px" height="150px" />
											</td>
										</tr>
									<?php
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
					<!-- /.card-body -->
		<?php
				} else {
					// Tampilkan tombol "Upload Berkas" jika ada biodata siswa
					echo '<p align="center">Berkas-Berkas Persyaratan Belum Tersedia <br>Klik Button dibawah ini untuk Upload Berkas</p>';
					echo '<div class="mb-2" align="center">
                            <a href="?page=add-berkas" class="btn btn-primary">
                                <i class="fa fa-upload"></i> Upload Berkas</a>
                        </div>';
				}
			} else {
				// Tampilkan pesan jika biodata siswa belum diisi
				echo '<p align="center">Pastikan Anda Mengisi Biodata Siswa pada Menu Biodata Siswa <br></p>';
				echo '<div class="mb-2" align="center">
                            <a href="?page=data-siswa" class="btn btn-primary">
                                <i class="fa fa-edit"></i> Menu Biodata Siswa</a>
                        </div>';
			}
		} else {
			// Tampilkan pesan atau alihkan ke halaman login jika pengguna belum login
			echo 'Anda harus login terlebih dahulu atau Anda tidak memiliki akses.';
			// Contoh alihkan ke halaman login:
			// header("Location: login.php");
		}
		?>
	</div>
</body>

</html>