<?php
session_start();

// Jika tidak ada sesi atau sesi sudah tidak aktif
if (!isset($_SESSION['id']) || !isset($_SESSION['qrcode'])) {
  header("Location: index.php");
  exit();
}

// Melakukan logout
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Hapus semua data sesi
  session_unset();

  // Hancurkan sesi
  session_destroy();

  // Redirect kembali ke halaman login
  header("Location: index.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>E-LEARNING</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/clients/Tutwurihandayani.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-between">

      <div class="logo">
        <a href="home.php"><img src="../assets/img/clients/sidikatbiru.png" alt="" class="img-fluid" width="200" height="100"></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="getstarted scrollto" href="logout.php">Logout</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- #header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="clearfix">
    <div class="container" data-aos="fade-up">

    </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= Why Us Section ======= -->
    <section id="why-us">
      <div class="container" data-aos="fade-up">
        <header class="section-header">
          <h3>E-Learning</h3>
          <p><Strong>Selamat Datang di Sistem Pembelajaran Elektronik SDN 013 Tanjungpinang Barat</Strong></p>
        </header>

        <div class="row row-eq-height justify-content-center">

          <div class="col-lg-3 mb-4">
            <div class="card" data-aos="zoom-in" data-aos-delay="100">
              <i class="bi bi-youtube"></i>
              <div class="card-body">
                <h5 class="card-title">Konten YouTube</h5>
                <p class="card-text">Akses Materi Pembelajaran dalam bentuk Video YouTube</p>
                <a href="konten_yt.php" class="readmore">Lihat</a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 mb-4">
            <div class="card" data-aos="zoom-in" data-aos-delay="200">
              <i class="bi bi-journal-bookmark-fill"></i>
              <div class="card-body">
                <h5 class="card-title">Materi Pembelajaran</h5>
                <p class="card-text">Akses Materi Pembelajaran dalam bentuk Perpustakaan Digital</p>
                <a href="materi_pembelajaran.php" class="readmore">Lihat</a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 mb-4">
            <div class="card" data-aos="zoom-in" data-aos-delay="300">
              <i class="bi bi-joystick"></i>
              <div class="card-body">
                <h5 class="card-title">Game Interaktif</h5>
                <p class="card-text">Akses Permainan Interaktif untuk Membantu Proses Belajar dan Mengajar</p>
                <a href="game_interaktif.php" class="readmore">Lihat</a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 mb-4">
            <div class="card" data-aos="zoom-in" data-aos-delay="300">
              <i class="fas fa-dice"></i>
              <div class="card-body">
                <h5 class="card-title">Penghitungan Poin Game</h5>
                <p class="card-text">Perhitungan Permainan Game Monopoli Kepulauan Riau</p>
                <a href="penghitungpoin.html" class="readmore">Lihat</a>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Why Us Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footerr">

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>SDN 013 Tanjungpinang Barat</span></strong>.
      </div>
      <div class="creditss">
        Designed by<a href="#">TIM PKM-PM RBM</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>