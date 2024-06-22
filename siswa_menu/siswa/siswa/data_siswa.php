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
				<i class="fa fa-table"></i> Biodata Siswa
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
			$sql = $koneksi->query("SELECT * FROM biodata_siswa
            INNER JOIN login_siswa ON biodata_siswa.id_login_siswa = login_siswa.id_login_siswa
            WHERE biodata_siswa.id_login_siswa = $id_login_siswa");

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
									<th>NIK</th>
									<th>Nama Siswa</th>
									<th>Tempat, Tanggal Lahir</th>
									<th>Jenis Kelamin</th>
									<th>Alamat</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody class="text-center">
								<?php
								while ($data = $sql->fetch_assoc()) {
								?>
									<tr>
										<td align="center">
											<?php echo $data['nik']; ?>
										</td>
										<td>
											<?php echo $data['nama_siswa']; ?>
										</td>
										<td>
											<?php echo $data['tempat_lahir_siswa'] . ', ' . $data['tgl_lahir_siswa']; ?>
										</td>
										<td>
											<?php echo $data['jk_siswa']; ?>
										</td>
										<td>
											<?php echo $data['alamat_siswa']; ?>
										</td>
										<td>
											<a href="?page=view-siswa&kode=<?php echo $data['nik']; ?>" title="Detail" class="btn btn-info btn-sm">
												<i class="fa fa-eye"></i>
											</a>
											<a href="?page=edit-siswa&kode=<?php echo $data['nik']; ?>" title="Ubah" class="btn btn-success btn-sm">
												<i class="fa fa-edit"></i>
											</a>
											<a href="?page=del-siswa&kode=<?php echo $data['nik']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
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
				echo '<p align="center">Biodata Siswa Belum Tersedia <br>Klik Button dibawah ini untuk Input Biodata</p>';
				// Tambahkan tombol "Tambah Data" di sini
				echo '<div class="mb-2" align="center">
                    <a href="?page=add-siswa" class="btn btn-primary">
                        <i class="fa fa-edit"></i> Tambah Data</a>
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