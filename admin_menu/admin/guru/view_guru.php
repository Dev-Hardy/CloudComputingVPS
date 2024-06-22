<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * from data_guru WHERE id_guru='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>
<div class="row">

	<div class="col-md-8">
		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title">Detail Guru</h3>

				<div class="card-tools">
				</div>
			</div>
			<div class="card-body p-0">
				<table class="table">
					<tbody>
						<tr>
							<td style="width: 200px">
								<b>NIP</b>
							</td>
							<td>:
								<?php echo $data_cek['nip_guru']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 200px">
								<b>Nama Guru</b>
							</td>
							<td>:
								<?php echo $data_cek['nama_guru']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 200px">
								<b>Tempat Lahir</b>
							</td>
							<td>:
								<?php echo $data_cek['tempat_lahir_guru']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 200px">
								<b>Tanggal Lahir</b>
							</td>
							<td>:
								<?php echo $data_cek['tgl_lahir_guru']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 200px">
								<b>Alamat</b>
							</td>
							<td>:
								<?php echo $data_cek['alamat_guru']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 200px">
								<b>Jenis Kelamin</b>
							</td>
							<td>:
								<?php echo $data_cek['jk_guru']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 200px">
								<b>No HP</b>
							</td>
							<td>:
								<?php echo $data_cek['no_hp_guru']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 200px">
								<b>Status Kepegawaian</b>
							</td>
							<td>:
								<?php echo $data_cek['status_kepegawaian']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 200px">
								<b>Jenis PTK</b>
							</td>
							<td>:
								<?php echo $data_cek['jenis_ptk']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 200px">
								<b>Jurusan/Prodi</b>
							</td>
							<td>:
								<?php echo $data_cek['jurusan_guru']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 200px">
								<b>Kompetensi</b>
							</td>
							<td>:
								<?php echo $data_cek['kompetensi_guru']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 200px">
								<b>Kata Pengantar</b>
							</td>
							<td>:
								<?php echo $data_cek['kata_pengantar']; ?>
							</td>
						</tr>
					</tbody>
				</table>
				<div class="card-footer">
					<a href="?page=data-guru" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="card card-success">
			<div class="card-header">
				<center>
					<h3 class="card-title">
						Foto Guru
					</h3>
				</center>

				<div class="card-tools">
				</div>
			</div>
			<div class="card-body">
				<div class="text-center">
					<img src="foto/guru/<?php echo $data_cek['foto_guru']; ?>" width="280px" />
				</div>

				<h3 class="profile-username text-center">
					<b class="text-danger">NIP - NAMA</b> <br>
					<?php echo $data_cek['nip_guru']; ?>
					-
					<?php echo $data_cek['nama_guru']; ?>
				</h3>
			</div>
		</div>
	</div>

</div>