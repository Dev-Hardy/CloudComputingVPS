<?php

        $sql_cek = "SELECT * FROM tb_profil";
        $query_cek = mysqli_query($koneksi, $sql_cek);
				$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
		{
		
?>

<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-flag"></i> Profil Instansi</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Perusahaan</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="nama_profil" name="nama_profil" value="<?php echo $data_cek['nama_profil']; ?>"
					 readonly/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $data_cek['alamat']; ?>"
					 readonly/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Bidang</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="bidang" name="bidang" value="<?php echo $data_cek['bidang']; ?>"
					 readonly/>
				</div>
			</div>

		</div>
	</form>
</div>

<?php
		}
	$sql = $koneksi->query("SELECT count(nip) as lokal from tb_pegawai");
	while ($data= $sql->fetch_assoc()) {
	
		$lokal=$data['lokal'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT count(nip) as pegawai from tb_pegawai where status='Pegawai'");
	while ($data= $sql->fetch_assoc()) {
	
		$pegawai=$data['pegawai'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT count(nip) as honor from tb_pegawai where status='Honorer'");
	while ($data= $sql->fetch_assoc()) {
	
		$honor=$data['honor'];
	}
?>


<?php
	$sql = $koneksi->query("SELECT count(id_pengguna) as boyong from tb_pengguna");
	while ($data= $sql->fetch_assoc()) {
	
		$boyong=$data['boyong'];
	}
?>

<div class="row">
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-primary">
			<div class="inner">
				<h3>
					<?php echo $lokal;  ?>
				</h3>

				<p>Jumlah Pegawai</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a href="?page=data-pegawai" class="small-box-footer">Selengkapnya
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
					<?php echo $pegawai;  ?>
				</h3>

				<p>Status Pegawai</p>
			</div>
			<div class="icon">
				<i class="ion ion-pie-graph"></i>
			</div>
			<a href="?page=data-pegawai" class="small-box-footer">Informasi
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-danger">
			<div class="inner">
				<h3>
					<?php echo $honor; ?>
				</h3>

				<p>Status Honorer</p>
			</div>
			<div class="icon">
				<i class="ion ion-pie-graph"></i>
			</div>
			<a href="?page=data-pegawai" class="small-box-footer">Informasi
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-warning">
			<div class="inner">
				<h3>
					<?php echo $boyong;  ?>
				</h3>

				<p>Pengguna Sistem</p>
			</div>
			<div class="icon">
				<i class="ion ion-android-happy"></i>
			</div>
			<a href="#" class="small-box-footer">Informasi
			</a>
		</div>
	</div>

	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-grey">
			<div class="inner">
				<h3>Ketetapan
				</h3>

				<p>Tunjangan</p>
			</div>
			<div class="icon">
				<i class="ion ion-pie-graph"></i>
			</div>
			<a href="https://jdih.kemenkeu.go.id/download/638b852c-8648-4430-a886-7b46631a6879/2023pmkeuangan039.pdf" class="small-box-footer">Tunjangan
			</a>
		</div>
	</div>

	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-pink">
			<div class="inner">
				<h3>
					<?php echo $boyong;  ?>
				</h3>

				<p>Masa Aktif</p>
			</div>
			<div class="icon">
				<i class="ion ion-android-happy"></i>
			</div>
			<a href="#" class="small-box-footer">Cek Data
			</a>
		</div>
	</div>

	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-yellow">
			<div class="inner">
				<h3>
					Pusat
				</h3>
				<p>Web Resmi</p>
			</div>
			<div class="icon">
				<i class="ion ion-pie-graph"></i>
			</div>
			<a href="https://www.bkn.go.id/layanan/simpegnas/" class="small-box-footer">Informasi
			</a>
		</div>
	</div>