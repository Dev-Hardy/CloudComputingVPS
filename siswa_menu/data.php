<?php
//Mulai Sesion
session_start();
if (isset($_SESSION["ses_nik"]) == "") {
	header("location: /src/login_siswa/index.php");
} else {
	$data_id = $_SESSION["ses_id_login_siswa"];
	$data_nama = $_SESSION["ses_nama_pendek"];
	$data_level = $_SESSION["ses_status"];
}

//Koneksi Data Base
include "inc/koneksi.php";
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Menu Siswa || SDN 013 Tanjungpinang Barat</title>
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
	<style>
		@media (max-width: 300px) {
			.info1 {
				display: none;
			}
		}
	</style>

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
								MENU SISWA
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
				<div style="display: flex; flex-direction: column; align-items: center; text-align: center;">
					<img src="dist/img/LOGO SINDIKAT.png" alt="AdminLTE Logo" class="brand-image" style="height: 50px;">
				</div>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user (optional) -->
				<div class="user mt-2 pb-2 mb-2 d-flex text-center">
					<div class="info1 text-center" style="display: flex; margin-left: 45px; flex-direction: column; align-items: center; justify-content: center; height: 100%;">
						<a href="index.php" class="d-block text-center">
							Hi, Selamat Datang <br> <?php echo $data_nama; ?>
						</a>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

						<!-- Level  -->
						<?php
						if ($data_level == "1") {
						?>
							<li class="nav-item">
								<a href="data.php" class="nav-link">
									<i class="nav-icon fas fa-home"></i>
									<p>
										Dashboard
									</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="?page=data-siswa" class="nav-link">
									<i class="nav-icon far fa fa-user"></i>
									<p>
										Biodata Siswa
									</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="?page=data-orangtua" class="nav-link">
									<i class="nav-icon far fa fa-users"></i>
									<p>
										Biodata Orang Tua
									</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="?page=data-berkas" class="nav-link">
									<i class="nav-icon far fa fa-envelope"></i>
									<p>
										Upload Berkas
									</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="?page=data-verifikasi" class="nav-link">
									<i class="nav-icon far fa fa-user-clock"></i>
									<p>
										Lihat Status Verifikasi
									</p>
								</a>
							</li>

							<li class="nav-header">Other Menu</li>
							<li class="nav-item">
								<a href="?page=data-profil" class="nav-link">
									<i class="nav-icon far fa fa-flag"></i>
									<p>
										Profil Sekolah
									</p>
								</a>
							</li>

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
							case 'siswa':
								include "home/siswa.php";
								break;

								//Siswa
							case 'data-siswa':
								include "siswa/siswa/data_siswa.php";
								break;
							case 'add-siswa':
								include "siswa/siswa/add_siswa.php";
								break;
							case 'data-orangtua':
								include "siswa/siswa/data_orangtua.php";
								break;
							case 'edit-siswa':
								include "siswa/siswa/edit_siswa.php";
								break;
							case 'del-siswa':
								include "siswa/siswa/del_siswa.php";
								break;
							case 'view-siswa':
								include "siswa/siswa/view_siswa.php";
								break;
							case 'data-ayah':
								include "siswa/siswa/data_ayah.php";
								break;
							case 'add-ayah':
								include "siswa/siswa/add_ayah.php";
								break;
							case 'edit-ayah':
								include "siswa/siswa/edit_ayah.php";
								break;
							case 'view-ayah':
								include "siswa/siswa/view_ayah.php";
								break;
							case 'del-ayah':
								include "siswa/siswa/del_ayah.php";
								break;
							case 'data-ibu':
								include "siswa/siswa/data_ibu.php";
								break;
							case 'add-ibu':
								include "siswa/siswa/add_ibu.php";
								break;
							case 'edit-ibu':
								include "siswa/siswa/edit_ibu.php";
								break;
							case 'view-ibu':
								include "siswa/siswa/view_ibu.php";
								break;
							case 'del-ibu':
								include "siswa/siswa/del_ibu.php";
								break;

								//verifikasi
							case 'data-verifikasi':
								include "siswa/berkas/hasil_verifikasi.php";
								break;

								//berkas
							case 'data-berkas':
								include "siswa/berkas/data_berkas.php";
								break;
							case 'data-berkas-berkas':
								include "siswa/berkas/upload_berkas.php";
								break;
							case 'add-berkas':
								include "siswa/berkas/add_berkas.php";
								break;
							case 'edit-berkas':
								include "siswa/berkas/edit_berkas.php";
								break;

								//Profil
							case 'data-profil':
								include "siswa/profil/data_profil.php";
								break;
							case 'edit-profil':
								include "siswa/profil/edit_profil.php";
								break;

								//default
							default:
								echo "<center><h1> 404 not Found ! <br> The Website is Under Construction <br> MAINTENANCE in 1 Week <br> <br> See You... </h1></center>";
								break;
						}
					} else {
						//Halaman Home Pengguna
						if ($data_level == "1") {
							include "home/siswa.php";
						} else {
							include "../ppdb-sd/src/login_siswa/index.php";
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
			<b>TIM PKM-PM RBM</b>
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