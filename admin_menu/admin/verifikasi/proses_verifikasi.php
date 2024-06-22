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
				<i class="fa fa-table"></i> Proses Verifikasi Berkas
			</h3>
		</div>
		<div class="row mt-3">
			<!-- ./col -->
			<div class="col-lg-4 col-5">
				<!-- small box -->
				<div class="small-box bg-warning">
					<div class="inner">
						<p>Berkas Belum Disetujui</p>
					</div>
					<div class="icon">
						<i class="ion ion-pie-graph"></i>
					</div>
					<a href="?page=data-verifikasi-belum" class="small-box-footer">Lihat dan Proses Verifikasi Berkas <br> Belum Disetujui
					</a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-4 col-5">
				<!-- small box -->
				<div class="small-box bg-success">
					<div class="inner">
						<p>Berkas Sudah Disetujui</p>
					</div>
					<div class="icon">
						<i class="ion ion-pie-graph"></i>
					</div>
					<a href="?page=data-verifikasi-sudah" class="small-box-footer">Lihat dan Proses Verifikasi Berkas <br> Disetujui
					</a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-4 col-5">
				<!-- small box -->
				<div class="small-box bg-danger">
					<div class="inner">
						<p>Berkas Tidak Disetujui</p>
					</div>
					<div class="icon">
						<i class="ion ion-pie-graph"></i>
					</div>
					<a href="?page=data-verifikasi-tidak" class="small-box-footer">Lihat dan Proses Verifikasi Berkas <br> Tidak Disetujui
					</a>
				</div>
			</div>
		</div>
	</div>
</body>

</html>