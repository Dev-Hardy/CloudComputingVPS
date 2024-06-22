<?php
//Mulai Sesion
session_start();
if (isset($_SESSION["ses_username"]) == "") {
	header("location: login.php");
} else {
	$data_id = $_SESSION["ses_id"];
	$data_nama = $_SESSION["ses_nama"];
	$data_user = $_SESSION["ses_username"];
	$data_level = $_SESSION["ses_level"];
}

//Koneksi Data Base
include "inc/koneksi.php";

$sql = $koneksi->query("SELECT * from tb_profil");
while ($data = $sql->fetch_assoc()) {

	$nama = $data['nama_profil'];
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin Menu || SDN 013 Tanjungpinang Barat</title>
	<link rel="icon" href="dist/img/logo.png">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- Alert -->
	<script src="plugins/alert.js"></script>
</head>

<body class="hold-transition sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-blue navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#">
						<i class="fas fa-bars text-white"></i>
					</a>
				</li>
			</ul>

			<!-- SEARCH FORM -->
			<ul class="navbar-nav ml-auto">

				<li class="nav-item d-none d-sm-inline-block">
					<a href="#" class="nav-link">
						<font color="white">
							<b>
								ADMIN MENU
							</b>
						</font>
					</a>
				</li>
			</ul>

		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="data.php" class="brand-link text-center">
				<div style="display: flex; flex-direction: column; align-items: center;">
					<img src="dist/img/LOGO SINDIKAT.png" alt="AdminLTE Logo" class="brand-image" style="height: 50px;">
				</div>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user (optional) -->
				<div class="user-panel mt-2 pb-2 mb-2 d-flex">
					<div class="image">
						<img src="dist/img/user.png" class="img-circle elevation-1" alt="User Image">
					</div>
					<div class="info">
						<a href="index.php" class="d-block">
							<?php echo $data_nama; ?>
						</a>
						<span class="badge badge-success">
							<?php echo $data_level; ?>
						</span>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

						<!-- Level  -->
						<?php
						if ($data_level == "Administrator") {
						?>
							<li class="nav-item">
								<a href="data.php" class="nav-link">
									<i class="nav-icon fas fa-tachometer-alt"></i>
									<p>
										Dashboard
									</p>
								</a>
							</li>

							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon far fa fa-users"></i>
									<p>
										Siswa
										<i class="right fas fa-angle-left"></i>
									</p>
								</a>
								<ul class="nav nav-treeview" style="font-size: 12px;">
									<li class="nav-item">
										<a href="?page=data-siswa" class="nav-link">
											<i class="nav-icon far fa fa-user" style="font-size: 12px;"></i>
											<p>Data Siswa</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-absensi-masuk-siswa" class="nav-link">
											<i class="nav-icon fas fa-clipboard-list" style="font-size: 12px;"></i>
											<p>Data Absensi Masuk</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-absensi-keluar-siswa" class="nav-link">
											<i class="nav-icon fas fa-clipboard-list" style="font-size: 12px;"></i>
											<p>Data Absensi Keluar</p>
										</a>
									</li>
								</ul>
							</li>

							<!-- Informasi -->
							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon far fa fa-users"></i>
									<p>
										Guru
										<i class="right fas fa-angle-left"></i>
									</p>
								</a>
								<ul class="nav nav-treeview" style="font-size: 12px;">
									<li class="nav-item">
										<a href="?page=data-guru" class="nav-link">
											<i class="nav-icon far fa fa-user" style="font-size: 12px;"></i>
											<p>Data Guru</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-absensi-masuk-guru" class="nav-link">
											<i class="nav-icon fas fa-clipboard-list" style="font-size: 12px;"></i>
											<p>Data Absensi Masuk</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-absensi-keluar-guru" class="nav-link">
											<i class="nav-icon fas fa-clipboard-list" style="font-size: 12px;"></i>
											<p>Data Absensi Keluar</p>
										</a>
									</li>
								</ul>
							</li>

							<!-- Informasi -->
							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon far fa fa-info-circle"></i>
									<p>
										Informasi
										<i class="right fas fa-angle-left"></i>
									</p>
								</a>
								<ul class="nav nav-treeview" style="font-size: 12px;">
									<li class="nav-item">
										<a href="?page=data-berita" class="nav-link">
											<i class="nav-icon fas fa fa-newspaper" style="font-size: 12px;"></i>
											<p>Berita</p>
										</a>
									</li>
								</ul>
							</li>

							<!-- E-Learning -->
							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-solid fa-bell"></i>

									<p>
										E-Learning
										<i class="right fas fa-angle-left"></i>
									</p>
								</a>
								<ul class="nav nav-treeview" style="font-size: 12px;">
									<li class="nav-item">
										<a href="?page=data-muatan-lokal" class="nav-link">
											<i class="nav-icon fa fa-archive" style="font-size: 12px;"></i>
											<p>Muatan Lokal</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-pengetahuan-umum" class="nav-link">
											<i class="nav-icon fas fa fa-newspaper" style="font-size: 12px;"></i>
											<p>Muatan Pengetahuan Umum</p>
										</a>
									</li>
								</ul>
							</li>

							<!-- PPDB -->
							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon far fa fa-user-graduate"></i>
									<p>
										PPDB
										<i class="right fas fa-angle-left"></i>
									</p>
								</a>
								<ul class="nav nav-treeview" style="font-size: 12px;">
									<li class="nav-item">
										<a href="?page=data-akun-ppdb" class="nav-link">
											<i class="nav-icon fas fa-unlock-alt" style="font-size: 12px;"></i>
											<p>Akun Terdaftar</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-setting-ppdb" class="nav-link">
											<i class="nav-icon fas fa-wrench" style="font-size: 12px;"></i>
											<p>Setting</p>
										</a>
									</li>
								</ul>
							</li>

							<li class="nav-item">
								<a href="?page=proses-verifikasi" class="nav-link">
									<i class="nav-icon far fa fa-user-clock"></i>
									<p>
										Status Verifikasi
									</p>
								</a>
							</li>

							<li class="nav-header">Setting</li>
							<li class="nav-item">
								<a href="?page=data-profil" class="nav-link">
									<i class="nav-icon far fa fa-flag"></i>
									<p>
										Profil Sekolah
									</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="?page=data-pengguna" class="nav-link">
									<i class="nav-icon far fa-user"></i>
									<p>
										Pengguna Sistem
									</p>
								</a>
							</li>

						<?php
						} elseif ($data_level == "Guru") {
						?>

							<li class="nav-item">
								<a href="data.php" class="nav-link">
									<i class="nav-icon fas fa-tachometer-alt"></i>
									<p>
										Dashboard
									</p>
								</a>
							</li>

							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon far fa fa-users"></i>
									<p>
										Siswa
										<i class="right fas fa-angle-left"></i>
									</p>
								</a>
								<ul class="nav nav-treeview" style="font-size: 12px;">
									<li class="nav-item">
										<a href="?page=data-siswa" class="nav-link">
											<i class="nav-icon far fa fa-users" style="font-size: 12px;"></i>
											<p>Data Siswa</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="#" class="nav-link">
											<i class="nav-icon fas fa fa-newspaper" style="font-size: 12px;"></i>
											<p>Data Absensi</p>
										</a>
									</li>
								</ul>
							</li>

							<!-- E-Learning -->
							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-solid fa-bell"></i>

									<p>
										E-Learning
										<i class="right fas fa-angle-left"></i>
									</p>
								</a>
								<ul class="nav nav-treeview" style="font-size: 12px;">
									<li class="nav-item">
										<a href="?page=data-muatan-lokal" class="nav-link">
											<i class="nav-icon fa fa-archive" style="font-size: 12px;"></i>
											<p>Muatan Lokal</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-pengetahuan-umum" class="nav-link">
											<i class="nav-icon fas fa fa-newspaper" style="font-size: 12px;"></i>
											<p>Muatan Pengetahuan Umum</p>
										</a>
									</li>
								</ul>
							</li>

							<li class="nav-header">Setting</li>

						<?php
						}
						?>

						<li class="nav-item">
							<a onclick="return confirm('Apakah anda yakin akan keluar ?')" href="logout.php" class="nav-link">
								<i class="nav-icon far fa-circle text-danger"></i>
								<p>
									Logout
								</p>
							</a>
						</li>

				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header"></section>
			<!-- Main content -->
			<section class="content">
				<!-- /. WEB DINAMIS -->
				<div class="container-fluid">

					<?php
					if (isset($_GET['page'])) {
						$hal = $_GET['page'];

						switch ($hal) {
								//Klik Halaman Home Pengguna
							case 'admin':
								include "home/admin.php";
								break;
							case 'guru':
								include "home/guru.php";
								break;
							case 'pegawai':
								include "home/pegawai.php";
								break;

								//Pengguna
							case 'data-pengguna':
								include "admin/pengguna/data_pengguna.php";
								break;
							case 'add-pengguna':
								include "admin/pengguna/add_pengguna.php";
								break;
							case 'edit-pengguna':
								include "admin/pengguna/edit_pengguna.php";
								break;
							case 'del-pengguna':
								include "admin/pengguna/del_pengguna.php";
								break;

								//Siswa
							case 'data-siswa':
								include "admin/siswa/data_siswa.php";
								break;
							case 'add-siswa':
								include "admin/siswa/add_siswa.php";
								break;
							case 'edit-siswa':
								include "admin/siswa/edit_siswa.php";
								break;
							case 'del-siswa':
								include "admin/siswa/del_siswa.php";
								break;
							case 'view-siswa':
								include "admin/siswa/view_siswa.php";
								break;
							case 'edit-ayah':
								include "admin/siswa/edit_ayah.php";
								break;
							case 'view-ayah':
								include "admin/siswa/view_ayah.php";
								break;
							case 'edit-ibu':
								include "admin/siswa/edit_ibu.php";
								break;
							case 'view-ibu':
								include "admin/siswa/view_ibu.php";
								break;

								//Absensi
							case 'data-absensi-masuk-siswa':
								include "admin/absensi/data_absensi_masuk_siswa.php";
								break;
							case 'data-absensi-masuk-guru':
								include "admin/absensi/data_absensi_masuk_guru.php";
								break;
							case 'data-absensi-keluar-siswa':
								include "admin/absensi/data_absensi_keluar_siswa.php";
								break;
							case 'data-absensi-keluar-guru':
								include "admin/absensi/data_absensi_keluar_guru.php";
								break;

								//Guru
							case 'data-guru':
								include "admin/guru/data_guru.php";
								break;
							case 'add-guru':
								include "admin/guru/add_guru.php";
								break;
							case 'edit-guru':
								include "admin/guru/edit_guru.php";
								break;
							case 'del-guru':
								include "admin/guru/del_guru.php";
								break;
							case 'view-guru':
								include "admin/guru/view_guru.php";
								break;

								//Berita
							case 'data-berita':
								include "admin/berita/data_berita.php";
								break;
							case 'add-berita':
								include "admin/berita/add_berita.php";
								break;
							case 'edit-berita':
								include "admin/berita/edit_berita.php";
								break;
							case 'del-berita':
								include "admin/berita/del_berita.php";
								break;
							case 'view-berita':
								include "admin/berita/view_berita.php";
								break;

								//PPDB
							case 'data-akun-ppdb':
								include "admin/ppdb/data_akun_ppdb.php";
								break;
							case 'edit-akun-ppdb':
								include "admin/ppdb/edit_akun_ppdb.php";
								break;
							case 'del-akun-ppdb':
								include "admin/ppdb/del_akun_ppdb.php";
								break;
							case 'view-akun-ppdb':
								include "admin/ppdb/view_akun_ppdb.php";
								break;
							case 'data-setting-ppdb':
								include "admin/ppdb/edit_setting_ppdb.php";
								break;

								//Muatan Lokal
							case 'data-muatan-lokal':
								include "admin/e-learning/muatan-lokal/muatan_lokal.php";
								break;
							case 'konten-yt-lokal':
								include "admin/e-learning/muatan-lokal/konten_yt.php";
								break;
							case 'add-konten-yt-lokal':
								include "admin/e-learning/muatan-lokal/add_konten_yt.php";
								break;
							case 'edit-konten-yt-lokal':
								include "admin/e-learning/muatan-lokal/edit_konten_yt.php";
								break;
							case 'del-konten-yt-lokal':
								include "admin/e-learning/muatan-lokal/del_konten_yt.php";
								break;
							case 'game-interaktif-lokal':
								include "admin/e-learning/muatan-lokal/game_interaktif.php";
								break;
							case 'add-game-interaktif-lokal':
								include "admin/e-learning/muatan-lokal/add_game_interaktif.php";
								break;
							case 'edit-game-interaktif-lokal':
								include "admin/e-learning/muatan-lokal/edit_game_interaktif.php";
								break;
							case 'del-game-interaktif-lokal':
								include "admin/e-learning/muatan-lokal/del_game_interaktif.php";
								break;
							case 'materi-pembelajaran-lokal':
								include "admin/e-learning/muatan-lokal/materi_pembelajaran.php";
								break;
							case 'add-materi-pembelajaran-lokal':
								include "admin/e-learning/muatan-lokal/add_materi_pembelajaran.php";
								break;
							case 'edit-materi-pembelajaran-lokal':
								include "admin/e-learning/muatan-lokal/edit_materi_pembelajaran.php";
								break;
							case 'del-materi-pembelajaran-lokal':
								include "admin/e-learning/muatan-lokal/del_materi_pembelajaran.php";
								break;

								//Pengetahuan Umum
							case 'data-pengetahuan-umum':
								include "admin/e-learning/pengetahuan-umum/pengetahuan_umum.php";
								break;
							case 'materi-pembelajaran-umum':
								include "admin/e-learning/pengetahuan-umum/materi_pembelajaran.php";
								break;
							case 'add-materi-pembelajaran-umum':
								include "admin/e-learning/pengetahuan-umum/add_materi_pembelajaran.php";
								break;
							case 'edit-materi-pembelajaran-umum':
								include "admin/e-learning/pengetahuan-umum/edit_materi_pembelajaran.php";
								break;
							case 'del-materi-pembelajaran-umum':
								include "admin/e-learning/pengetahuan-umum/del_materi_pembelajaran.php";
								break;
							case 'konten-yt-umum':
								include "admin/e-learning/pengetahuan-umum/konten_yt.php";
								break;
							case 'add-konten-yt-umum':
								include "admin/e-learning/pengetahuan-umum/add_konten_yt.php";
								break;
							case 'edit-konten-yt-umum':
								include "admin/e-learning/pengetahuan-umum/edit_konten_yt.php";
								break;
							case 'del-konten-yt-umum':
								include "admin/e-learning/pengetahuan-umum/del_konten_yt.php";
								break;
							case 'game-interaktif-umum':
								include "admin/e-learning/pengetahuan-umum/game_interaktif.php";
								break;
							case 'add-game-interaktif-umum':
								include "admin/e-learning/pengetahuan-umum/add_game_interaktif.php";
								break;
							case 'edit-game-interaktif-umum':
								include "admin/e-learning/pengetahuan-umum/edit_game_interaktif.php";
								break;
							case 'del-game-interaktif-umum':
								include "admin/e-learning/pengetahuan-umum/del_game_interaktif.php";
								break;

								//biodata
							case 'biodata-ayah':
								include "admin/biodata/view_ayah.php";
								break;
							case 'biodata-ibu':
								include "admin/biodata/view_ibu.php";
								break;

								//verifikasi
							case 'data-verifikasi-belum':
								include "admin/verifikasi/data_verifikasi_belum_disetujui.php";
								break;
							case 'data-verifikasi-sudah':
								include "admin/verifikasi/data_verifikasi_sudah_disetujui.php";
								break;
							case 'data-verifikasi-tidak':
								include "admin/verifikasi/data_verifikasi_tidak_disetujui.php";
								break;
							case 'proses-verifikasi':
								include "admin/verifikasi/proses_verifikasi.php";
								break;
							case 'view-berkas-belum':
								include "admin/verifikasi/view_berkas_belum_disetujui.php";
								break;
							case 'view-berkas-sudah':
								include "admin/verifikasi/view_berkas_sudah_disetujui.php";
								break;
							case 'view-berkas-tidak':
								include "admin/verifikasi/view_berkas_tidak_disetujui.php";
								break;
							case 'hasil-verifikasi':
								include "admin/verifikasi/edit_verifikasi.php";
								break;
							case 'add-verifikasi':
								include "admin/verifikasi/add_verifikasi.php";
								break;


								//Profil
							case 'data-profil':
								include "admin/profil/data_profil.php";
								break;
							case 'edit-profil':
								include "admin/profil/edit_profil.php";
								break;

								//default
							default:
								echo "<center><h1> 404 not Found ! <br> The Website is Under Construction <br> MAINTENANCE in 1 Week <br> <br> See You... </h1></center>";
								break;
						}
					} else {
						//Halaman Home Pengguna
						if ($data_level == "Administrator") {
							include "home/admin.php";
						} elseif ($data_level == "Guru") {
							include "home/guru.php";
						}
					}
					?>
				</div>
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<footer class="main-footer">
			<div class="float-right d-none d-sm-block">
				&copy;
				<a target="_blank" href="https://sekolah.data.kemdikbud.go.id/index.php/chome/profil/c0e217bd-31f5-e011-91fa-abd7b1b23b22">
					<strong>Sistem Informasi || SDN 013 Tanjungpinang Barat</strong>
				</a>
			</div>
			<b>Project PKM-PM RBM</b>
		</footer>

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<!-- jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Select2 -->
	<script src="plugins/select2/js/select2.full.min.js"></script>
	<!-- DataTables -->
	<script src="plugins/datatables/jquery.dataTables.js"></script>
	<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="dist/js/demo.js"></script>
	<!-- page script -->
	<script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

	<script>
		$(function() {
			$("#example1").DataTable();
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
			});
		});
	</script>

	<script>
		$(function() {
			//Initialize Select2 Elements
			$('.select2').select2()

			//Initialize Select2 Elements
			$('.select2bs4').select2({
				theme: 'bootstrap4'
			})
		})
	</script>

</body>

</html>