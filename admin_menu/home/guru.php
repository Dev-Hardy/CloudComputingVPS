<?php

$sql_cek = "SELECT * FROM tb_profil";
$query_cek = mysqli_query($koneksi, $sql_cek);
$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH); {

?>

	<div class="card card-info">
		<div class="card-header">
			<h3 class="card-title">
				<i class="fa fa-flag"></i> Profil Sekolah
			</h3>
		</div>
		<form action="" method="post" enctype="multipart/form-data">
			<div class="card-body">
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Nama Sekolah</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nama_profil" name="nama_profil" value="<?php echo $data_cek['nama_profil']; ?>" readonly />
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Alamat</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $data_cek['alamat']; ?>" readonly />
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Bidang</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="bidang" name="bidang" value="<?php echo $data_cek['bidang']; ?>" readonly />
					</div>
				</div>

			</div>
		</form>
	</div>

<?php
}
$sql = $koneksi->query("SELECT count(id_learning) as konten_yt from e_learning where kategori='konten_yt' AND jenis='muatan_lokal'");
while ($data = $sql->fetch_assoc()) {

	$konten_yt = $data['konten_yt'];
}
?>

<?php
$sql = $koneksi->query("SELECT count(id_learning) as game from e_learning where kategori='game' AND jenis='muatan_lokal'");
while ($data = $sql->fetch_assoc()) {

	$game = $data['game'];
}
?>
<?php
$sql = $koneksi->query("SELECT count(id_learning) as materi from e_learning where kategori='materi' AND jenis='muatan_lokal'");
while ($data = $sql->fetch_assoc()) {

	$materi = $data['materi'];
}
?>
<?php
$sql = $koneksi->query("SELECT count(id_learning) as konten_yt_umum from e_learning where kategori='konten_yt' AND jenis='muatan_umum'");
while ($data = $sql->fetch_assoc()) {

	$konten_yt_umum = $data['konten_yt_umum'];
}
?>

<?php
$sql = $koneksi->query("SELECT count(id_learning) as game_umum from e_learning where kategori='game' AND jenis='muatan_umum'");
while ($data = $sql->fetch_assoc()) {

	$game_umum = $data['game_umum'];
}
?>
<?php
$sql = $koneksi->query("SELECT count(id_learning) as materi_umum from e_learning where kategori='materi' AND jenis='muatan_umum'");
while ($data = $sql->fetch_assoc()) {

	$materi_umum = $data['materi_umum'];
}
?>

<div class="row">
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-danger">
			<div class="inner">
				<h3>
					<?php echo $konten_yt;  ?>
				</h3>

				<p>Konten YT - Muatan Lokal</p>
			</div>
			<div class="icon">
				<i class="ion ion-social-youtube"></i>
			</div>
			<a href="?page=konten-yt-lokal" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-success">
			<div class="inner">
				<h3>
					<?php echo $game;  ?>
				</h3>

				<p>Game Interaktif - Muatan Lokal</p>
			</div>
			<div class="icon">
				<i class="ion ion-ios-game-controller-b"></i>
			</div>
			<a href="?page=game-interaktif-lokal" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>

	<div class="col-lg-3 col-6">
		<div class="small-box bg-purple">
			<div class="inner">
				<h3>
					<?php echo $materi;  ?>
				</h3>

				<p>Materi Pembelajaran - Muatan Lokal</p>
			</div>
			<div class="icon">
				<i class="ion ion-ios-paper"></i>
			</div>
			<a href="?page=materi-pembelajaran-lokal" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-danger">
			<div class="inner">
				<h3>
					<?php echo $konten_yt_umum;  ?>
				</h3>

				<p>Konten YT - Muatan Pengetahuan Umum</p>
			</div>
			<div class="icon">
				<i class="ion ion-social-youtube"></i>
			</div>
			<a href="?page=konten-yt-umum" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-success">
			<div class="inner">
				<h3>
					<?php echo $game_umum;  ?>
				</h3>

				<p>Game Interaktif - Muatan Pengetahuan Umum</p>
			</div>
			<div class="icon">
				<i class="ion ion-ios-game-controller-b"></i>
			</div>
			<a href="?page=game-interaktif-umum" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>

	<div class="col-lg-3 col-6">
		<div class="small-box bg-purple">
			<div class="inner">
				<h3>
					<?php echo $materi_umum;  ?>
				</h3>

				<p>Materi Pembelajaran - Muatan Pengetahuan Umum</p>
			</div>
			<div class="icon">
				<i class="ion ion-ios-paper"></i>
			</div>
			<a href="?page=materi-pembelajaran-umum" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
</div>
</div>