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
	<div align="center" class="card card-info">
		<div class="card-header">
			<h3 class="card-title">
				<i class="fa fa-table"></i> Muatan Lokal Budaya Melayu
			</h3>
		</div>
	</div>
	<?php
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

	<div class="row">
		<div class="col-lg-3 col-6">
			<!-- small box -->
			<div class="small-box bg-danger">
				<div class="inner">
					<h3>
						<?php echo $konten_yt;  ?>
					</h3>

					<p>Konten YT</p>
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

					<p>Game Interaktif</p>
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

					<p>Materi Pembelajaran</p>
				</div>
				<div class="icon">
					<i class="ion ion-ios-paper"></i>
				</div>
				<a href="?page=materi-pembelajaran-lokal" class="small-box-footer">Selengkapnya
					<i class="fas fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>


	</div>
</body>

</html>