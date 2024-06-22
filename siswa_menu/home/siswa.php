<?php

      $sql_cek = "SELECT * FROM tb_profil";
      $query_cek = mysqli_query($koneksi, $sql_cek);
			$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
		{
	
?>

<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-flag"></i> Profil Sekolah</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Sekolah</label>
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
	$sql = $koneksi->query("SELECT count(id_guru) as lokal from data_guru");
	while ($data= $sql->fetch_assoc()) {
	
		$lokal=$data['lokal'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT count(id_guru) as pegawai from data_guru where status_kepegawaian='Pegawai'");
	while ($data= $sql->fetch_assoc()) {
	
		$pegawai=$data['pegawai'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT count(id_guru) as honor from data_guru where status_kepegawaian='Honorer'");
	while ($data= $sql->fetch_assoc()) {
	
		$honor=$data['honor'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT count(id_guru) as pppk from data_guru where status_kepegawaian='PPPK'");
	while ($data= $sql->fetch_assoc()) {
	
		$pppk=$data['pppk'];
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

				<p>Data Guru</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a href="?page=data-guru" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-success">
			<div class="inner">
				<h3>
					<?php echo $pegawai;  ?>
				</h3>

				<p>Data Guru Pegawai</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a href="?page=data-guru-pegawai" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-purple">
			<div class="inner">
				<h3>
					<?php echo $honor;  ?>
				</h3>

				<p>Data Guru Honorer</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a href="?page=data-guru-honorer" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-warning">
			<div class="inner">
				<h3>
					<?php echo $pppk;  ?>
				</h3>

				<p>Data Guru PPPK</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a href="?page=data-guru-ppk" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-secondary">
			<div class="inner">
				<p>Biodata Siswa</p>
			</div>
			<div class="icon">
				<i class="ion ion-person"></i>
			</div>
			<a href="?page=data-siswa" class="small-box-footer">Input Biodata Siswa
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-light">
			<div class="inner">
				<p>Biodata Orang Tua</p>
			</div>
			<div class="icon">
				<i class="fa fa-users"></i>
			</div>
			<a href="?page=data-orangtua" class="small-box-footer">Input Biodata OrangTua
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-info">
			<div class="inner">
				<p>Berkas</p>
			</div>
			<div class="icon">
				<i class="fa fa-envelope-open"></i>
			</div>
			<a href="?page=data-berkas-berkas" class="small-box-footer">Upload Berkas
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-danger">
			<div class="inner">
				<p>Status Verifikasi</p>
			</div>
			<div class="icon">
				<i class="ion ion-checkmark"></i>
			</div>
			<a href="?page=data-verifikasi" class="small-box-footer">Cek Data Verifikasi
			</a>
		</div>
	</div>