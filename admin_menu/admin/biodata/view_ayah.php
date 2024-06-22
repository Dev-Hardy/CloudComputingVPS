<?php

if (isset($_GET['kode'])) {
	$sql_cek = "SELECT * from tb_pegawai WHERE nip='" . $_GET['kode'] . "'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>
<div class="row text-center">

	<div align="center" class="col-md-8 mx-auto">
		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title">Detail Biodata Ayah - <span style="color: blue;"><?php echo $data_cek['nama']; ?></span></h3>

				<div class="card-tools">
				</div>
			</div>
			<div class="card-body p-0">
				<table class="table">
					<tbody>
						<tr>
							<td style="width: 180px">
								<b>Nama Ayah</b>
							</td>
							<td>:
								<?php echo $data_cek['nip']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 180px">
								<b>Tempat Lahir</b>
							</td>
							<td>:
								<?php echo $data_cek['nama']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 180px">
								<b>Tanggal Lahir</b>
							</td>
							<td>:
								<?php echo $data_cek['nama']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 180px">
								<b>Alamat</b>
							</td>
							<td>:
								<?php echo $data_cek['nama']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 180px">
								<b>No Hp</b>
							</td>
							<td>:
								<?php echo $data_cek['alamat']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 180px">
								<b>Pekerjaan Ayah</b>
							</td>
							<td>:
								<?php echo $data_cek['alamat']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 180px">
								<b>Pendidikan Terakhir</b>
							</td>
							<td>:
								<?php echo $data_cek['no_hp']; ?>
							</td>
						</tr>
					</tbody>
				</table>
				<div class="card-footer">
					<?php
					$sql = $koneksi->query("SELECT * from tb_pegawai");
					$data = $sql->fetch_assoc(); {
					?>
						<a href="?page=hasil-verifikasi&kode=<?php echo $data['nip']; ?>" class="btn btn-warning">Kembali</a>
					<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>

</div>