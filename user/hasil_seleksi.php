<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <title>Pengumuman Pendaftaran Ulang | PPDB</title>
  <meta content="" name="description" />
  <meta content="" name="keywords" />

  <!-- Favicons -->
  <link href="../assets/img/clients/Tutwurihandayani.png" rel="icon">
  <link href="../assets/img/clients/Tutwurihandayani.png" rel="apple-touch-icon">
  <!--=============== REMIXICONS ===============-->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

  <!-- Tambahkan tag script ini ke dalam bagian <head> file HTML Anda -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css?= time();?>" rel="stylesheet">
  <style>
    .pengumuman {
      color: #278194;
      font-size: 40px;
      font-weight: 700;
    }

    .tulisan-bawah {
      font-size: 20px;
      font-family: 'Times New Roman', Times, serif;
    }

    .btn-kotak {
      border-radius: 20px;
      padding: 5px 15px;
      color: white;
      background-color: blue;
    }
  </style>
</head>

<body>

  <?php
  include('../connect/connection.php');
  ?>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">
      <div class="logo me-auto">
        <img src="../assets/img/clients/LOGO SINDIKAT.png" alt="Logo" width="220" height="100">
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="../index.php">Beranda</a></li>
          <li class="dropdown"><a href="#"><span>Profil</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a class="nav-link scrollto active" href="../index.php">Visi & Misi</a></li>
              <li><a class="nav-link scrollto active" href="../index.php">Tata Tertib</a></li>
              <li><a class="nav-link scrollto active" href="../keluarga.php">Keluarga Besar</a></li>
              <li class="dropdown"><a href="#"><span>Sumber Daya</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="../index.php">Kepala Sekolah</a></li>
                  <li><a href="../index.php">Tenaga Pendidik</a></li>
                  <li><a href="../index.php">Fasilitas Sekolah</a></li>
                  <li><a href="../index.php">Ekstrakurikuler</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>PPDB</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="../alurpendaftaran.html">Petunjuk Teknis</a></li>
              <li><a href="../login_siswa/registrasi.php">Pendaftaran Ulang</a></li>
              <li><a href="../user/hasil_seleksi.php">Pengumuman Hasil Seleksi</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="../e-learning/index.php">E-Learning</a></li>
          <li><a class="nav-link scrollto" href="../index.php">Informasi</a></li>
          <li><a class="nav-link scrollto" href="../index.php">Berita</a></li>
          <li><a class="nav-link scrollto" href="../index.php">Kontak</a></li>
          <li class="dropdown"><a class="getstarted scrollto">Login<i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="../login_siswa/login_siswa.php">Siswa</a></li>
              <li><a href="../admin_menu/login.php">Admin</a></li>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1 class="pengumuman fw-bold">Pengumuman PPDB 2024</h1>
          <h2>Sistem Informasi SD Negeri 013 Tanjungpinang Barat Sekolah Pusat Keunggulan Bidang Seni dan Ekonomi Kreatif</h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="#berita" class="btn-get-started scrollto">Informasi</a>
            <a href="https://www.youtube.com/watch?v=d0809-x7R6g" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Lihat Video</span></a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="../assets/img/clients/pengumuman.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <!-- Pengumuman Hasil Seleksi -->
  <div class="container-fluid mt-4">
    <h2 class="pengumuman text-center fw-bold" id="cek-hasil">PENGUMUMAN</h2>
    <h4 class="tulisan-bawah ml-3 text-center">Informasi hasil pengumuman pendaftaran PPDB Online SDN 013 Tanjungpinang Barat tahun Ajaran 2023/2024. Hasil Pengumuman dapat terus berubah sampai batas waktu pendaftaran berakhir sesuai jadwal yang telah ditetapkan.</h4>
    <h6 class="mt-5 ml-3"><b>Search</b></h6>
    <div class="input-group mb-4 mt-3">
      <div class="form-outline kotak ml-3">
        <input placeholder="Masukkan NIK Siswa" type="text" id="getName" class="form-control text-center">
      </div>
    </div>
    <!-- Tabel -->
    <table class="table">
      <thead>
        <tr class="text-center">
          <th>NIK Siswa</th>
          <th>Nama Siswa</th>
          <th>Jenis Kelamin</th>
          <th>Tanggal Penerimaan</th>
          <th>Jalur Penerimaan</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody id="showdata" class="text-center">
        <?php
        include('../connect/connection.php');

        $sql = "SELECT biodata_siswa.id_siswa, login_siswa.nik, biodata_siswa.nama_siswa, biodata_siswa.jk_siswa, hasil_seleksi.tgl_penerimaan, hasil_seleksi.jalur_penerimaan, hasil_seleksi.status_penerimaan
        FROM biodata_siswa
        LEFT JOIN login_siswa ON biodata_siswa.id_login_siswa = login_siswa.id_login_siswa
        LEFT JOIN hasil_seleksi ON biodata_siswa.id_siswa = hasil_seleksi.id_siswa
        ORDER BY login_siswa.nik ASC";

        $query = mysqli_query($connect, $sql);

        if (mysqli_num_rows($query) > 0) {
          while ($row = mysqli_fetch_assoc($query)) {
            $statusClass = '';
            if ($row['status_penerimaan'] == 'Sudah di Setujui') {
              $statusClass = 'table-success';
            } elseif ($row['status_penerimaan'] == 'Tidak di Setujui') {
              $statusClass = 'table-danger';
            } else {
              $statusClass = 'table-warning';
            }
            echo "<tr class='$statusClass'>";
            echo "<td><h6>" . $row['nik'] . "</h6></td>";
            echo "<td><h6>" . $row['nama_siswa'] . "</h6></td>";
            echo "<td><h6>" . $row['jk_siswa'] . "</h6></td>";
            if ($row['tgl_penerimaan']) {
              echo "<td><h6>" . $row['tgl_penerimaan'] . "</h6></td>";
            } else {
              echo "<td><h6>-</h6></td>";
            }
            if ($row['jalur_penerimaan']) {
              echo "<td><h6>" . $row['jalur_penerimaan'] . "</h6></td>";
            } else {
              echo "<td><h6>-</h6></td>";
            }
            if ($row['status_penerimaan']) {
              echo "<td><h6>" . $row['status_penerimaan'] . "</h6></td>";
            } else {
              echo "<td><h6>Belum di Setujui</h6></td>";
            }
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='6'>DATA TIDAK DITEMUKAN</td></tr>";
          echo "<tr><td colspan='6'>SILAHKAN MASUKKAN NIK SISWA YANG SESUAI</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
  <!-- Pengumuman Hasil Seleksi -->

  <!-- Template Javascript -->
  <script src="../style/js/main.js"></script>

  <script>
    $(document).ready(function() {
      $('#getName').on("keyup", function() {
        var getName = $(this).val();
        $.ajax({
          method: 'POST',
          url: 'searchajax.php', // Pastikan ini sesuai dengan path ke file searchajax.php
          data: {
            nik: getName
          },
          success: function(response) {
            $("#showdata").html(response); // Isi hasil pencarian ke dalam elemen dengan id "showdata"
          }
        });
      });
    });
  </script>

  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
  <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="../lib/tempusdominus/js/moment.min.js"></script>
  <script src="../lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
  <!--=============== MAIN JS ===============-->
  <script src="../style/assets/js/main.js"></script>

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>