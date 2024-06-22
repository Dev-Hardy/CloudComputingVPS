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
				<i class="fa fa-table"></i> Biodata Ayah
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

			// Query untuk mengambil data siswa berdasarkan ID login siswa yang sudah login
			$sql = $koneksi->query("SELECT * FROM biodata_ayah
			INNER JOIN biodata_siswa ON biodata_ayah.id_siswa = biodata_siswa.id_siswa
			INNER JOIN login_siswa ON biodata_siswa.id_login_siswa = login_siswa.id_login_siswa
			WHERE login_siswa.id_login_siswa = $id_login_siswa");

			// Query untuk memeriksa apakah biodata siswa sudah diisi
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
										<th>Nama Ayah</th>
										<th>Pekerjaan</th>
										<th>Alamat</th>
										<th>No Hp</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody class="text-center">
									<?php
									while ($data = $sql->fetch_assoc()) {
									?>
										<tr>
											<td>
												<?php echo $data['nama_ayah']; ?>
											</td>
											<td>
												<?php echo $data['pekerjaan_ayah']; ?>
											</td>
											<td>
												<?php echo $data['alamat_ayah']; ?>
											</td>
											<td>
												<?php echo $data['no_hp_ayah']; ?>
											</td>
											<td>
												<a href="?page=view-ayah&kode=<?php echo $data['id_ayah']; ?>" title="Detail" class="btn btn-info btn-sm">
													<i class="fa fa-eye"></i>
												</a>
												<a href="?page=edit-ayah&kode=<?php echo $data['id_ayah']; ?>" title="Ubah" class="btn btn-success btn-sm">
													<i class="fa fa-edit"></i>
												</a>
												<a href="?page=del-ayah&kode=<?php echo $data['id_ayah']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
													<i class="fa fa-trash"></i>
												</a>
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
					// Tampilkan pesan jika tidak ada data yang ditemukan
					echo '<p align="center">Biodata Ayah Belum Tersedia <br>Klik Button dibawah ini untuk input Biodata</p>';
					// Periksa apakah biodata siswa sudah diisi
					if ($sql_check_biodata->num_rows > 0) {
						// Tambahkan tombol "Tambah Data" jika biodata siswa sudah diisi
						echo '<div class="mb-2" align="center">
                            <a href="?page=add-ayah" class="btn btn-primary">
                                <i class="fa fa-edit"></i> Tambah Data</a>
                        </div>';
					} else {
						// Tampilkan pesan jika biodata siswa belum diisi
						echo '<br><p align="center">Data Biodata Ayah Tidak Ditemukan <br></p>';
						echo '<p align="center">Pastikan Anda Mengisi Biodata Siswa pada Menu Biodata Siswa <br></p>';
						echo '<div class="mb-2" align="center">
                            <a href="?page=data-siswa" class="btn btn-primary">
                                <i class="fa fa-edit"></i> Menu Biodata Siswa</a>
                        </div>';
					}
				}
			} else {
				// Tampilkan pesan jika biodata siswa belum diisi
				echo '<br><p align="center">Data Biodata Ayah Tidak Ditemukan <br></p>';
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