<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * from berita WHERE id_berita='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>
<div class="row">

	<div class="col-md-8">
		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title">Detail Berita</h3>

				<div class="card-tools">
				</div>
			</div>
			<div class="card-body p-0">
				<table class="table">
					<tbody>
						<tr>
							<td style="width: 200px">
								<b>Judul Berita</b>
							</td>
							<td>:
								<?php echo $data_cek['judul_berita']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 200px">
								<b>Mitra</b>
							</td>
							<td>:
								<?php echo $data_cek['mitra']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 200px">
								<b>Penjelasan Berita</b>
							</td>
							<td>:
								<?php echo $data_cek['penjelasan_berita']; ?>
							</td>
						</tr>
					</tbody>
				</table>
				<div class="card-footer">
					<a href="?page=data-berita" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="card card-success">
			<div class="card-header">
				<center>
					<h3 class="card-title">
						Foto Berita
					</h3>
				</center>

				<div class="card-tools">
				</div>
			</div>
			<div class="card-body">
				<div class="text-center">
					<img src="foto/berita/<?php echo $data_cek['foto_berita']; ?>" width="280px" />
				</div>

				<h3 class="profile-username text-center">
					<b>Judul Berita : </b> <br>
					<?php echo $data_cek['judul_berita']; ?>
				</h3>
			</div>
		</div>
	</div>

</div>