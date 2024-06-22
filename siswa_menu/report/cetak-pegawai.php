<?php
include "../inc/koneksi.php";

$nik_siswa = $_GET['nik_siswa'];

$sql_cek = "SELECT * FROM tb_profil";
$query_cek = mysqli_query($koneksi, $sql_cek);
$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH); {
?>

	<!DOCTYPE html>
	<html lang="en">

	<head>
		<title>CETAK DATA PEGAWAI</title>
	</head>

	<body>
		<center>

			<h2>
				<?php echo $data_cek['nama_profil']; ?>
			</h2>
			<h3>
				<?php echo $data_cek['alamat']; ?>
				<hr / size="2px" color="black">

			<?php
		}

		$sql_tampil = "select * from biodata_siswa where nik_siswa='$nik_siswa'";
		$query_tampil = mysqli_query($koneksi, $sql_tampil);
		$no = 1;
		while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) {
			?>
		</center>

		<center>
			<h4>
				<u>DATA PEGAWAI</u>
			</h4>
		</center>

		<table border="1" cellspacing="0" style="width: 90%" align="center">
			<tbody>
				<tr>
					<td>NIK</td>
					<td>:</td>
					<td><?php echo $data['nik_siswa']; ?></td>
					<td rowspan="6" align="center">
						<img src="../foto/<?php echo $data['pas_foto']; ?>" width="150px" />
					</td>
				</tr>
				<tr>
					<td>Nama Siswa</td>
					<td>:</td>
					<td><?php echo $data['nama_siswa']; ?></td>
				</tr>
				<tr>
					<td>Tempat, Tanggal Lahir Siswa</td>
					<td>:</td>
					<td><?php echo $data['tempat_lahir_siswa'] . ', ' . $data['tgl_lahir_siswa']; ?></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td><?php echo $data['alamat_siswa']; ?></td>
				</tr>
				<tr>
					<td>Jenis Kelamin</td>
					<td>:</td>
					<td><?php echo $data['jk_siswa']; ?></td>
				</tr>
				<tr>
					<td>Agama</td>
					<td>:</td>
					<td><?php echo $data['agama_siswa']; ?></td>
				</tr>
				<tr>
					<td>Anak Ke</td>
					<td>:</td>
					<td><?php echo $data['anak_ke']; ?></td>
				</tr>
				<tr>
					<td>Jumlah Saudara</td>
					<td>:</td>
					<td><?php echo $data['jumlah_saudara']; ?></td>
				</tr>
				<tr>
					<td>Status Keluarga</td>
					<td>:</td>
					<td><?php echo $data['status_keluarga']; ?></td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
		<script>
			window.print();
		</script>

	</body>

	</html>