<?php
if (isset($_GET['kode'])) {
	$sql_cek = "SELECT biodata_siswa.*, berkas.* FROM biodata_siswa
	INNER JOIN berkas ON biodata_siswa.id_siswa = berkas.id_siswa WHERE id_berkas='" . $_GET['kode'] . "'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);

	if ($data_cek) {
		// Data ditemukan, maka aman untuk mengakses properti

	} else {
		// Data tidak ditemukan, tampilkan pesan yang sesuai
		echo '<div class="row text-center">';
		echo '<div align="center" class="col-md-8 mx-auto">';
		echo '<div class="card card-info">';
		echo '<div class="card-header">';
		echo '<h3 class="card-title">Detail Berkas Tidak Ditemukan</h3>';
		echo '<div class="card-tools"></div>';
		echo '</div>';
		echo '<div class="card-body">';
		echo '<p>Data Berkas Tidak ditemukan. Silakan kembali ke halaman sebelumnya.</p>';
		echo '</div>';
		echo '<div class="card-footer">';
		echo '<a href="?page=data-verifikasi" class="btn btn-warning">Kembali</a>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		.zoomed-image {
			max-width: 100%;
			max-height: 100%;
			cursor: zoom-in;
			transition: transform 0.3s;
		}

		/* CSS untuk bungkusan besar */
		.big-container {
			max-width: 90vh;
			/* Lebar bungkusan besar */
			margin: 0 auto;
		}

		/* CSS untuk bungkusan berkas KK, KTP, Akta Lahir, dan Pas Foto */
		.small-container {
			max-width: 60vh;
			/* Lebar bungkusan berkas */
			margin: 0 auto;
		}
	</style>
</head>

<body>
	<?php if ($data_cek) { ?>
		<div class="row text-center">
			<div align="center" class="col-md-8 mx-auto">
				<div class="big-container card card-info" style="max-width: 90vh;">
					<div class="card-header text-center" style="background-color: blue; color: white;">
						<h3 class="card-title" style="display: inline; text-align: center; width: 100%;">
							Berkas Persyaratan - <?php echo $data_cek['nama_siswa']; ?>
						</h3>
					</div>


					<div class="card-body p-0">
						<div class="card small-container card-success">
							<div class="mt-2">
								<div class="card card-info">
									<div class="card-header">
										<h3 align="center" class="card-title">
											Berkas Pas Foto
										</h3>
									</div>
									<div class="card-body p-0">
										<div class="mt-2">
											<a href="/ppdb-sd/src/siswa_menu/foto/<?php echo $data_cek['pas_foto']; ?>" target="_blank">
												<img id="zoom-image-pas-foto" src="/ppdb-sd/src/siswa_menu/foto/<?php echo $data_cek['pas_foto']; ?>" class="zoomed-image" width="280px">
											</a>
										</div>
									</div>
								</div>

								<div class="card card-info text-center">
									<div class="card-header text-center">
										<h3 align="center" class="card-title text-center">
											Berkas KK
										</h3>
									</div>
									<div class="card-body p-0">
										<div class="card card-success">
											<div class="mt-2">
												<a href="/ppdb-sd/src/siswa_menu/foto/<?php echo $data_cek['kartu_keluarga']; ?>" target="_blank">
													<img id="zoom-image-pas-kk" src="/ppdb-sd/src/siswa_menu/foto/<?php echo $data_cek['kartu_keluarga']; ?>" class="zoomed-image" width="300px">
												</a>
											</div>
										</div>
									</div>
								</div>

								<div class="card card-info">
									<div class="card-header">
										<h3 align="center" class="card-title">
											Berkas Akta Lahir
										</h3>
									</div>
									<div class="card-body p-0">
										<div class="card card-success">
											<div class="mt-2">
												<a href="/ppdb-sd/src/siswa_menu/foto/<?php echo $data_cek['akta_lahir']; ?>" target="_blank">
													<img id="zoom-image-akta-lahir" src="/ppdb-sd/src/siswa_menu/foto/<?php echo $data_cek['akta_lahir']; ?>" class="zoomed-image">
												</a>
											</div>
										</div>
									</div>
								</div>

								<div class="card card-info">
									<div class="card-header">
										<h3 align="center" class="card-title">
											Berkas KTP
										</h3>
									</div>
									<div class="card-body p-0">
										<div class="card card-success">
											<div class="mt-2">
												<a href="/ppdb-sd/src/siswa_menu/foto/<?php echo $data_cek['ktp']; ?>" target="_blank">
													<img id="zoom-image-ktp" src="/ppdb-sd/src/siswa_menu/foto/<?php echo $data_cek['ktp']; ?>" class="zoomed-image">
												</a>
											</div>
										</div>
									</div>
									<div class="card-footer">
										<a href="?page=data-verifikasi-tidak" class="btn btn-warning">Kembali</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
</body>

</html>