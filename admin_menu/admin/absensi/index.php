<?php
session_start();
include 'konfig/function.php';
$_SESSION['page'] = 'index';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Presensi SDN 013 Tanjungpinang Barat</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Favicons -->
  <link href="vendor/img/Tutwurihandayani.png" rel="icon">
  <link href="vendor/img/Tutwurihandayani.png" rel="apple-touch-icon">

  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="vendor/css/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vendor/css/admin-lte/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- custom databales -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
  <!-- loading -->
  <link rel="stylesheet" href="vendor/css/css-manual/loading.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark navbar-dark">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index.php?page=dashboard" class="nav-link">Home</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item d-sm-none">
          <a class="nav-link" href="konfig/logout.php" onclick="return confirm('Ingin keluar ??')">
            <i class="fas fa-sign-out-alt"></i>
          </a>
        </li>
        <!-- Hide on small screens -->
        <li class="nav-item d-none d-sm-inline-block">
          <a class="nav-link" href="konfig/logout.php" onclick="return confirm('Ingin keluar ??')">
            <i class="fas fa-sign-out-alt"></i>
          </a>
        </li>
      </ul>

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="vendor/img/sidikat.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">PRESENSI SDN013</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="vendor/img/admin.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?php echo "Hello, " . $_SESSION['username']; ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <!-- Level  -->
            <?php
            if ($_SESSION['level'] == '0') {
            ?>
              <li class="nav-item">
                <a href="index.php?page=dashboard" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>

              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon far fa-calendar-alt"></i>
                  <p>
                    Data Presensi Siswa
                  </p>
                  <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview" style="font-size: 12px;">
                  <li class="nav-item">
                    <a href="index.php?page=absensi-masuk-siswa" class="nav-link">
                      <i class="nav-icon far fa fa-users" style="font-size: 12px;"></i>
                      <p>Presensi Masuk Siswa</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="index.php?page=absensi-keluar-siswa" class="nav-link">
                      <i class="nav-icon fas fa fa-newspaper" style="font-size: 12px;"></i>
                      <p>Presensi Keluar Siswa</p>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon far fa-calendar-alt"></i>
                  <p>
                    Data Presensi Guru
                  </p>
                  <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview" style="font-size: 12px;">
                  <li class="nav-item">
                    <a href="index.php?page=absensi-masuk-guru" class="nav-link">
                      <i class="nav-icon far fa fa-users" style="font-size: 12px;"></i>
                      <p>Presensi Masuk Guru</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="index.php?page=absensi-keluar-guru" class="nav-link">
                      <i class="nav-icon fas fa fa-newspaper" style="font-size: 12px;"></i>
                      <p>Presensi Keluar Guru</p>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item has-treeview">
                <a href="" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Daftar Pengguna
                  </p>
                  <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview" style="font-size: 12px;">
                  <li class="nav-item">
                    <a href="index.php?page=pendaftaran" class="nav-link">
                      <i class="nav-icon fas fa-user-plus" style="font-size: 12px;"></i>
                      <p>Pendaftaran Kartu</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="index.php?page=pengguna-siswa" class="nav-link">
                      <i class="nav-icon far fa fa-users" style="font-size: 12px;"></i>
                      <p>Data Siswa</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="index.php?page=pengguna-guru" class="nav-link">
                      <i class="nav-icon fas fa fa-newspaper" style="font-size: 12px;"></i>
                      <p>Data Guru</p>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item">
                <a href="index.php?page=pengguna" class="nav-link">
                  <i class="nav-icon fas fa-user-lock"></i>
                  <p>
                    Daftar Operator
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="index.php?page=konfigurasi" class="nav-link">
                  <i class="nav-icon fas fa-cogs"></i>
                  <p>
                    Konfigurasi
                  </p>
                </a>
              </li>
            <?php
            } elseif ($_SESSION['level'] == '1') {
            ?>
              <li class="nav-item">
                <a href="index.php?page=dashboard" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>

              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon far fa-calendar-alt"></i>
                  <p>
                    Data Presensi Siswa
                  </p>
                  <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview" style="font-size: 12px;">
                  <li class="nav-item">
                    <a href="index.php?page=absensi-masuk-siswa" class="nav-link">
                      <i class="nav-icon far fa fa-users" style="font-size: 12px;"></i>
                      <p>Presensi Masuk Siswa</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="index.php?page=absensi-keluar-siswa" class="nav-link">
                      <i class="nav-icon fas fa fa-newspaper" style="font-size: 12px;"></i>
                      <p>Presensi Keluar Siswa</p>
                    </a>
                  </li>
                </ul>
              </li>
            <?php
            }
            ?>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper pt-4 pb-4">
      <?php
      if (isset($_GET['page'])) {
        $page = $_GET['page'];

        switch ($page) {

          case 'dashboard':
            include "pages/dashboard.php";
            break;

          case 'absensi-masuk-siswa':
            include "pages/absensi_masuk_siswa.php";
            break;

          case 'absensi-keluar-siswa':
            include "pages/absensi_keluar_siswa.php";
            break;

          case 'absensi-masuk-guru':
            include "pages/absensi_masuk_guru.php";
            break;

          case 'absensi-keluar-guru':
            include "pages/absensi_keluar_guru.php";
            break;

          case 'pendaftaran':
            include "pages/pendaftaran.php";
            break;

          case 'pengguna-siswa':
            include "pages/pengguna_siswa.php";
            break;

          case 'pengguna-guru':
            include "pages/pengguna_guru.php";
            break;

          case 'pengguna':
            include "pages/pengguna.php";
            break;

          case 'konfigurasi':
            include "pages/konfigurasi.php";
            break;

          case 'edit_siswa':
            include "pages/edit_siswa.php";
            break;

          case 'edit_guru':
            include "pages/edit_guru.php";
            break;

          case 'edit_pendaftaran':
            include "pages/edit_pendaftaran.php";
            break;

          case 'edit_konfigurasi':
            include "pages/edit_konfigurasi.php";
            break;

          case 'edit_absen_masuk_guru':
            include "pages/edit_absen_masuk_guru.php";
            break;

          case 'edit_absen_keluar_guru':
            include "pages/edit_absen_keluar_guru.php";
            break;

          case 'edit_absen_masuk_siswa':
            include "pages/edit_absen_masuk_siswa.php";
            break;

          case 'edit_absen_keluar_siswa':
            include "pages/edit_absen_keluar_siswa.php";
            break;

          case 'edit_pengguna':
            include "pages/edit_pengguna.php";
            break;

          case 'tambah_pengguna':
            include "pages/tambah_pengguna.php";
            break;

          case 'login':
            include "pages/login.php";
            break;

          default:
            echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
            break;
        }
      } else {
        echo '<h3><center> Permintaan ditolak :( </center></h3>';
      }
      ?>

    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- Default to the left -->
      <strong>Copyright &copy; 2024 <a href="#">SDN013TPIBARAT</a>.</strong>
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="vendor/js/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="vendor/js/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="vendor/js/admin-lte/adminlte.min.js"></script>


  <!-- Js datatables -->
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>

  <!--data tables function-->
  <script>
    $(document).ready(function() {
      var table = $('#example').DataTable({
        blengthChange: false,
        bPaginate: false,
        bInfo: false,
        buttons: [{
            extend: 'pdf',
            className: 'btn-danger'
          },
          {
            extend: 'excel',
            className: 'btn-success'
          },
          {
            extend: 'print',
            className: 'btn-info'
          }
        ]
      });

      table.buttons().container()
        .appendTo('#example_wrapper .col-md-6:eq(0)');

    });
  </script>

  <script>
    $(document).ready(function() {
      var table = $('#pegawai').DataTable({
        blengthChange: false,
        bPaginate: true,
        bInfo: false,
      });

      table.buttons().container()
        .appendTo('#example_wrapper .col-md-6:eq(0)');

    });
  </script>

  <script>
    $(document).ready(function() {
      if (Notification.permission !== "granted")
        Notification.requestPermission();
    });

    function cek() {
      $.ajax({
        type: "GET",
        url: './konfig/notifikasi.php',
        success: function(data) {
          if (data == '0') {

          } else {
            var notifikasi = new Notification(data, {
              icon: 'vendor/img/user.png',
              body: "Klik notifikasi ini untuk memasukan data pegawai",
            });
            notifikasi.onclick = function() {
              window.open("index.php?page=pegawai");
            };
          }
        }
      });
      i = 1;
      loop();
    }



    var i = 1;

    function loop() {
      setTimeout(function() {
        i++;
        if (i < 15) {
          loop();
        } else {
          cek();
        }
      }, 1000)
    }
    loop();
  </script>

</body>

</html>