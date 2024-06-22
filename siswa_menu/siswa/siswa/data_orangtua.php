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
				<i class="fa fa-table"></i> Biodata Orangtua
			</h3>
		</div>
		<div align="center" class="row mt-3" style="margin-left: 100px;">
			<!-- ./col -->
			<div class="col-lg-5">
				<!-- small box -->
				<div class="small-box bg-primary">
					<div class="inner">
						<p>Biodata Ayah</p>
					</div>
					<div class="icon">
						<i class="ion ion-person"></i>
					</div>
					<a href="?page=data-ayah" class="small-box-footer">Input Biodata Ayah
					</a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-5">
				<!-- small box -->
				<div class="small-box bg-success">
					<div class="inner">
						<p>Biodata Ibu</p>
					</div>
					<div class="icon">
						<i class="ion ion-person"></i>
					</div>
					<a href="?page=data-ibu" class="small-box-footer">Input Biodata Ibu
					</a>
				</div>
			</div>
		</div>
	</div>
</body>

</html>