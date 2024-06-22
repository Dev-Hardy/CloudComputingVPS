<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <title>SDN 013 Tanjungpinang Barat</title>
  <meta content="" name="description" />
  <meta content="" name="keywords" />

  <!-- Favicons -->
  <link href="assets/img/clients/Tutwurihandayani.png" rel="icon">
  <link href="assets/img/clients/Tutwurihandayani.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css?= time();?>" rel="stylesheet">
  <style>
    .pengumuman {
      color: #278194;
      font-size: 40px;
      font-weight: 700;
    }

    .tulisan-bawah {
      font-size: 20px;
      font-family: "Times New Roman", Times, serif;
    }

    .btn-kotak {
      border-radius: 20px;
      padding: 5px 15px;
      color: white;
      background-color: blue;
    }

    /* Gaya untuk efek overlay dan transformasi gambar saat hover */
    .service-item .img {
      position: relative;
      overflow: hidden;
    }

    .service-item .img::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      /* Warna overlay */
      opacity: 0;
      transition: opacity 0.3s ease;
    }

    .service-item .img:hover::before {
      opacity: 0.7;
      /* Opacity overlay saat hover */
    }

    .service-item .img img {
      transition: transform 0.3s ease;
    }

    .service-item:hover .img img {
      transform: scale(1.05);
      /* Perbesar gambar saat hover */
    }

    /* Gaya untuk judul saat hover */
    .service-item .details {
      transition: transform 0.3s ease;
    }

    .service-item:hover .details {
      transform: translateY(-10px);
      /* Geser judul ke atas saat hover */
    }

    .service-item {
      position: relative;
      overflow: hidden;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease-in-out;
    }

    .service-item:hover {
      transform: translateY(-5px);
    }

    .service-item .img {
      overflow: hidden;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
    }

    .service-item .img img {
      transition: transform 0.3s ease-in-out;
    }

    .service-item:hover .img img {
      transform: scale(1.1);
    }

    .details {
      padding: 20px;
    }

    .details h3 {
      margin-bottom: 10px;
      font-size: 24px;
    }

    .details p {
      font-size: 16px;
      color: #777;
    }

    .details .bx-camera {
      position: absolute;
      bottom: 10px;
      right: 10px;
      font-size: 24px;
      color: #555;
      transition: color 0.3s ease-in-out;
    }

    .service-item:hover .details .bx-camera {
      color: #ff6b6b;
    }
  </style>
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      <div class="logo me-auto">
        <img src="assets/img/clients/LOGO SINDIKAT.png" alt="Logo" width="220" height="100" />
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="index.php">Beranda</a></li>
          <li class="dropdown">
            <a href="#"><span>Profil</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a class="nav-link scrollto active" href="index.php">Visi & Misi</a></li>
              <li><a class="nav-link scrollto active" href="index.php">Tata Tertib</a></li>
              <li><a class="nav-link scrollto active" href="keluarga.php">Keluarga Besar</a></li>
              <li class="dropdown">
                <a href="#"><span>Sumber Daya</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="index.php">Kepala Sekolah</a></li>
                  <li><a href="index.php">Tenaga Pendidik</a></li>
                  <li><a href="index.php">Fasilitas Sekolah</a></li>
                  <li><a href="index.php">Ekstrakurikuler</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#"><span>PPDB</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="alurpendaftaran.html">Petunjuk Teknis</a></li>
              <li><a href="login_siswa/registrasi.php">Pendaftaran Ulang</a></li>
              <li><a href="user/hasil_seleksi.php">Pengumuman Hasil Seleksi</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="e-learning/index.php">E-Learning</a></li>
          <li><a class="nav-link scrollto" href="index.php">Informasi</a></li>
          <li><a class="nav-link scrollto" href="index.php">Berita</a></li>
          <li><a class="nav-link scrollto" href="index.php">Kontak</a></li>
          <li class="dropdown">
            <a class="getstarted scrollto">Login<i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="login_siswa/login_siswa.php">Siswa</a></li>
              <li><a href="admin_menu/login.php">Admin</a></li>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->
    </div>
  </header>
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1 class="pengumuman fw-bold">SDN 013 Tanjungpinang Barat</h1>
          <h2>Keluarga Besar SDN 013 Tanjungpinang Barat</h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="#berita" class="btn-get-started scrollto">Informasi</a>
            <a href="https://www.youtube.com/watch?v=d0809-x7R6g" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Lihat Video</span></a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="assets/img/Keluarga/upacara.jpg" class="img-fluid animated" alt="" />
        </div>
      </div>
    </div>
  </section>
  <!-- End Hero -->

  <!-- ======= Guru Section ======= -->
  <section id="mitra" class="services section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Keluarga Besar SDN 013 Tanjungpinang Barat</h2>
        <p>SD Negeri 013 Tanjungpinang Barat merupakan salah satu sekolah dasar yang berada di Tanjungpinang Barat.</p><br><br>
      </div>

      <div class="row gy-5">

        <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
          <div class="service-item">
            <div class="img">
              <img src="assets/img/Keluarga/jajaran_guru.jpg" class="img-fluid" alt="">
            </div>
            <div class="details position-relative">
              <h3>Guru SDN 013</h3>
              <p>Jajaran Guru Sekolah Dasar 013 Tanjungpinang Barat</p>
              <a href="assets/img/keluarga/jajaran_guru.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Lapangan Upacara">
                <i class="bx bx-camera"></i>
              </a>
            </div>
          </div>
        </div><!-- End Service Item -->


        <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
          <div class="service-item">
            <div class="img">
              <img src="assets/img/Keluarga/upacara.jpg" class="img-fluid" alt="">
            </div>
            <div class="details position-relative">
              <a href="assets/img/Keluarga/upacara.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Lapangan Upacara"><i class="bx bx-camera"></i></a>
              <h3>Upacara SDN 013 TPI Barat</h3>
              </a>
              <p>Foto Bersama Guru-Guru dan Paskibraka SDN 013 TPI Barat</p>
            </div>
          </div>
        </div><!-- End Service Item -->


        <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
          <div class="service-item">
            <div class="img">
              <img src="assets/img/Keluarga/kajian.jpg" class="img-fluid" alt="">
            </div>
            <div class="details position-relative">
              <a href="assets/img/Keluarga/kajian.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Lapangan Upacara"><i class="bx bx-camera"></i></a>
              <h3>Kajian Bersama</h3>
              </a>
              <p>Kajian Bersama Guru-Guru SDN 013 TPI Barat</p>
            </div>
          </div>
        </div><!-- End Service Item -->

        <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
          <div class="service-item">
            <div class="img">
              <img src="assets/img/Keluarga/guru.jpg" class="img-fluid" alt="">
            </div>
            <div class="details position-relative">
              <a href="assets/img/sekolah/lapangan2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Lapangan Upacara"><i class="bx bx-camera"></i></a>
              <h3>Guru SDN 013</h3>
              </a>
              <p>Jajaran Guru Sekolah Dasar 013 Tanjungpinang Barat</p>
            </div>
          </div>
        </div><!-- End Service Item -->

        <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
          <div class="service-item">
            <div class="img">
              <img src="assets/img/Keluarga/guru.jpg" class="img-fluid" alt="">
            </div>
            <div class="details position-relative">
              <a href="assets/img/sekolah/lapangan2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Lapangan Upacara"><i class="bx bx-camera"></i></a>
              <h3>Guru SDN 013</h3>
              </a>
              <p>Jajaran Guru Sekolah Dasar 013 Tanjungpinang Barat</p>
            </div>
          </div>
        </div><!-- End Service Item -->


        <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
          <div class="service-item">
            <div class="img">
              <img src="assets/img/Keluarga/guru.jpg" class="img-fluid" alt="">
            </div>
            <div class="details position-relative">
              <a href="assets/img/sekolah/lapangan2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Lapangan Upacara"><i class="bx bx-camera"></i></a>
              <h3>Guru SDN 013</h3>
              </a>
              <p>Jajaran Guru Sekolah Dasar 013 Tanjungpinang Barat</p>
            </div>
          </div>
        </div><!-- End Service Item -->


      </div><!-- End row -->

    </div><!-- End Container -->
  </section><!-- End Services Section -->

  <!-- ======= Berita Section ======= -->
  <section id="berita" class="testimonials">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>Berita</h2>
        <p>Berita terkini yang sedang berkaitan dengan dunia pendidikan pada saat ini diharapkan agar bisa memberikan informasi yang akurat dan tepat mengikuti perkembangan dunia pendidikan 5.0.</p>
      </div>

      <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper-wrapper">
          <?php
          // Koneksi ke database
          $koneksi = mysqli_connect("localhost", "root", "", "ppdb_sd13");

          // Periksa koneksi
          if (mysqli_connect_errno()) {
            echo "Koneksi database gagal: " . mysqli_connect_error();
            exit();
          }

          // Query untuk mengambil data berita dari database
          $sql_berita = "SELECT * FROM berita";
          $result_berita = mysqli_query($koneksi, $sql_berita);

          // Periksa apakah ada data berita yang ditemukan
          if (mysqli_num_rows($result_berita) > 0) {
            // Loop melalui setiap baris data berita
            while ($row = mysqli_fetch_assoc($result_berita)) {
              // Tampilkan informasi berita dari database
              echo '<div class="swiper-slide">';
              echo '<div class="testimonial-wrap">';
              echo '<div class="testimonial-item">';
              echo '<div class="d-flex align-items-center">';
              echo '<img src="admin_menu/foto/berita/' . $row['foto_berita'] . '" class="testimonial-img flex-shrink-0" alt="">';
              echo '<div>';
              echo '<h3>' . $row['judul_berita'] . '</h3>';
              echo '<h4>' . $row['mitra'] . '</h4>';
              echo '<div class="stars">';
              echo '<i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
              echo '<p>';
              echo '<i class="bi bi-quote quote-icon-left"></i>';
              echo $row['penjelasan_berita'];
              echo '<i class="bi bi-quote quote-icon-right"></i>';
              echo '</p>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
            }
          } else {
            // Jika tidak ada data berita yang ditemukan
            echo '<p>Tidak ada data berita yang tersedia.</p>';
          }

          // Tutup koneksi database
          mysqli_close($koneksi);
          ?>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </section>
  <!-- End Testimonials Section -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <img src="assets/img/clients/sidikathitam.png" class="img-fluid animated" alt="">
          </div>
        </div>
      </div>
    </div>

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>SIDIKAT</h3>
            <p>
              Jl. Yos Sudarso No.24, Kp. Baru, Kec. Tanjungpinang Barat, Kota Tanjung Pinang, Kepulauan Riau<br>
              <strong>Telpon:</strong> +62 8214562<br>
              <strong>Email:</strong> 013sdntpibarat@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Lihat Kembali</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#kuota">Kuota PPDB 2024</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#tatacara">Tata Cara Pendaftaran</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Media Sosial</h4>
            <p>Mari berinteraksi bersama kami melalui media sosial SD Negeri 013 Tanjungpinang Barat
            <p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="youtube"><i class="bx bxl-youtube"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>SDN 013 Tanjungpinang Barat</span></strong>.
      </div>
      <div class="credits">
        Designed by <a href="#">TIM PKM-PM RBM</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>

</html>