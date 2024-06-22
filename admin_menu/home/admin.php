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
$sql = $koneksi->query("SELECT count(id_siswa) as lokal from biodata_siswa");
while ($data = $sql->fetch_assoc()) {

	$lokal = $data['lokal'];
}
?>

<?php
$sql = $koneksi->query("SELECT count(id_guru) as guru from data_guru");
while ($data = $sql->fetch_assoc()) {

	$guru = $data['guru'];
}
?>

<?php
$sql = $koneksi->query("SELECT count(id_seleksi) as disetujui from hasil_seleksi where status_penerimaan='Sudah di Setujui'");
while ($data = $sql->fetch_assoc()) {

	$disetujui = $data['disetujui'];
}
?>

<?php
$sql = $koneksi->query("SELECT count(biodata_siswa.id_siswa) as belum_disetujui from biodata_siswa LEFT JOIN hasil_seleksi ON biodata_siswa.id_siswa = hasil_seleksi.id_siswa WHERE hasil_seleksi.status_penerimaan IS NULL");
while ($data = $sql->fetch_assoc()) {
	$belum_disetujui = $data['belum_disetujui'];
}
?>


<?php
$sql = $koneksi->query("SELECT count(id_seleksi) as tidak_disetujui from hasil_seleksi where status_penerimaan='Tidak di Setujui'");
while ($data = $sql->fetch_assoc()) {

	$tidak_disetujui = $data['tidak_disetujui'];
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

				<p>Jumlah Siswa</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a href="?page=data-siswa" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-purple">
			<div class="inner">
				<h3>
					<?php echo $guru;  ?>
				</h3>

				<p>Jumlah Guru</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a href="?page=data-guru" class="small-box-footer">Selengkapnya
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
					<?php echo $disetujui;  ?>
				</h3>

				<p>Status Verifikasi Disetujui</p>
			</div>
			<div class="icon">
				<i class="ion ion-ios-checkmark"></i>
			</div>
			<a href="?page=data-verifikasi-sudah" class="small-box-footer">Cek Data
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-danger">
			<div class="inner">
				<h3>
					<?php echo $tidak_disetujui; ?>
				</h3>

				<p>Status Verifikasi Tidak Disetujui</p>
			</div>
			<div class="icon">
				<i class="ion ion-ios-close"></i>
			</div>
			<a href="?page=data-verifikasi-tidak" class="small-box-footer">Cek Data
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-warning">
			<div class="inner">
				<h3>
					<?php echo $belum_disetujui; ?>
				</h3>

				<p>Status Belum di Verifikasi</p>
			</div>
			<div class="icon">
				<i class="ion ion-loop"></i>
			</div>
			<a href="?page=data-verifikasi-belum" class="small-box-footer">Cek Data
			</a>
		</div>
	</div>
</div>