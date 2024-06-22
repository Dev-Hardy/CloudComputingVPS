<?php
include "../inc/koneksi.php";

// Check if 'id_siswa' is set in $_GET
$id_siswa = isset($_GET['id_siswa']) ? $_GET['id_siswa'] : '';

if ($id_siswa != '') {
	$sql_cek = "SELECT * FROM tb_profil";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH); {
?>
		<!DOCTYPE html>
		<html lang="en">

		<head>
			<title>CETAK DATA SISWA</title>
		</head>

		<body>
			<center>

				<h2>
					<?php echo $data_cek['nama_profil']; ?>
				</h2>
				<h3>
					<?php echo $data_cek['alamat']; ?>
					<hr size="2px" color="black">
				</h3>

			<?php
		}

		$sql_tampil = "SELECT login_siswa.nik, biodata_siswa.*, berkas.pas_foto 
					FROM biodata_siswa
						LEFT JOIN login_siswa ON biodata_siswa.id_login_siswa = login_siswa.id_login_siswa
            LEFT JOIN berkas ON biodata_siswa.id_siswa = berkas.id_siswa WHERE biodata_siswa.id_siswa='" . $id_siswa . "'";
		$query_tampil = mysqli_query($koneksi, $sql_tampil);
		$no = 1;
		while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) {
			?>
			</center>

			<center>
				<h3>
					DATA SISWA <br> <?php echo $data['nama_siswa']; ?>
				</h3>
			</center>

			<table cellspacing="0" style="width: 90%" align="center">
				<tbody class="text-center">
					<tr>
						<td>NIK Siswa</td>
						<td>:</td>
						<td>
							<?php echo $data['nik']; ?>
						</td>
					</tr>
					<tr class="mt-2">
						<td>Nama Siswa</td>
						<td>:</td>
						<td>
							<?php echo $data['nama_siswa']; ?>
						</td>
						<td rowspan="8" align="center">
							<img src="/ppdb-sd/src/siswa_menu/foto/<?php echo $data['pas_foto']; ?>" width="150px" /> <br>
							<h4> Foto - <span style="color: red;"><?php echo $data['nama_siswa']; ?></span></h4>
						</td>
					</tr>
					<tr>
						<td>Tempat, Tanggal Lahir </td>
						<td>:</td>
						<td>
						<?php echo $data['tempat_lahir_siswa'] . ', ' . $data['tgl_lahir_siswa']; ?>
						</td>
					</tr>
					<tr>
						<td>Alamat Siswa</td>
						<td>:</td>
						<td>
							<?php echo $data['alamat_siswa']; ?>
						</td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td>:</td>
						<td>
							<?php echo $data['jk_siswa']; ?>
						</td>
					</tr>
					<tr>
						<td>Agama</td>
						<td>:</td>
						<td>
							<?php echo $data['agama_siswa']; ?>
						</td>
					</tr>
					<tr>
						<td>Anak ke-</td>
						<td>:</td>
						<td>
							<?php echo $data['anak_ke']; ?>
						</td>
					</tr>
					<tr>
						<td>Jumlah Saudara</td>
						<td>:</td>
						<td>
							<?php echo $data['jumlah_saudara']; ?>
						</td>
					</tr>
					<tr>
						<td>Status</td>
						<td>:</td>
						<td>
							<?php echo $data['status_keluarga']; ?>
						</td>
					</tr>
				</tbody>
			</table>
		<?php
		}
		?>
		<script>
			window.print();
		</script>
		</body>

		</html>
	<?php
} else {
	// Handle the case where 'id_siswa' is not set
	die("Parameter 'id_siswa' is missing.");
}
	?>