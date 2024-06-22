<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <title>Website Resmi SDN 013 Tanjungpinang Barat</title>
  <meta content="" name="description" />
  <meta content="" name="keywords" />

  <!-- Favicons -->
  <link href="../style/img/logo.png" rel="icon" />
  <!--=============== REMIXICONS ===============-->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

  <!-- Tambahkan tag script ini ke dalam bagian <head> file HTML Anda -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

  <!-- Vendor CSS Files -->
  <link href="../style/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../style/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
  <link href="../style/vendor/aos/aos.css" rel="stylesheet" />
  <link href="../style/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
  <link href="../style/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

  <!-- Template Main CSS File -->
  <link href="../style/style.css" rel="stylesheet" />
  <link rel="stylesheet" href="../style/assets/css/styles.css">
  <style>

  </style>
</head>

<body>
  <!--=============== HEADER ===============-->
  <header class="header">
    <nav class="nav container">
      <div class="nav__data">
        <a href="#" class="nav__logo">
          <img src="../style/assets/navbar_logo.png" alt="navbar_logo">
        </a>

        <div class="nav__toggle" id="nav-toggle">
          <i class="ri-menu-line nav__burger"></i>
          <i class="ri-close-line nav__close"></i>
        </div>
      </div>

      <!--=============== NAV MENU ===============-->
      <div class="nav__menu" id="nav-menu">
        <ul class="nav__list">
          <li><a href="/ppdb-sd/index.php" class="nav__link ri-home-5-line">Home</a></li>

          <!--=============== DROPDOWN 1 ===============-->
          <li class="dropdown__item">
            <div class="nav__link ri-profile-line">
              Profil <i class="ri-arrow-down-s-line dropdown__arrow"></i>
            </div>

            <ul class="dropdown__menu">
              <li>
                <a href="/ppdb-sd/index.php" class="dropdown__link">
                  <i class="ri-pie-chart-line"></i> Visi Misi
                </a>
              </li>

              <li>
                <a href="/ppdb-sd/index.php" class="dropdown__link">
                  <i class="ri-pushpin-2-line"></i> Tata Tertib
                </a>
              </li>

              <!--=============== DROPDOWN SUBMENU ===============-->
              <li class="dropdown__subitem">
                <div class="dropdown__link">
                  <i class="ri-bar-chart-line"></i> Sumberdaya <i class="ri-add-line dropdown__add"></i>
                </div>

                <ul class="dropdown__submenu">
                  <li>
                    <a href="/ppdb-sd/index.php" class="dropdown__sublink">
                      <i class="ri-user-line"></i> Data Kepala Sekolah
                    </a>
                  </li>

                  <li>
                    <a href="/ppdb-sd/index.php" class="dropdown__sublink">
                      <i class="ri-team-line"></i> Data Guru
                    </a>
                  </li>

                  <li>
                    <a href="/ppdb-sd/index.php" class="dropdown__sublink">
                      <i class="ri-building-2-line"></i> Fasilitas Sekolah
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>

          <!--=============== DROPDOWN 2 ===============-->
          <li class="dropdown__item">
            <div class="nav__link ri-school-line">
              PPDB 2023 <i class="ri-arrow-down-s-line dropdown__arrow"></i>
            </div>

            <ul class="dropdown__menu">
              <li>
                <a href="petunjuk_teknis.php" class="dropdown__link">
                  <i class="ri-search-eye-line"></i> Petunjuk Teknis
                </a>
              </li>

              <li>
                <a href="/ppdb-sd/src/login_siswa/index.php" class="dropdown__link">
                  <i class="ri-lock-line"></i> Pendaftaran Ulang
                </a>
              </li>

              <li>
                <a href="hasil_seleksi.php" class="dropdown__link">
                  <i class="ri-file-search-line"></i> Pengumuman Hasil Seleksi
                </a>
              </li>
            </ul>
          </li>

          <li><a href="/ppdb-sd/index.php" class="nav__link ri-article-line">Berita</a></li>

          <li><a href="#footer" class="nav__link ri-information-line">Informasi Resmi</a></li>

          <li><a href="/ppdb-sd/src/admin_menu/login.php" class="nav__link ri-admin-line">Admin Menu</a></li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- End Header -->

  <!-- Carousel Start -->
  <div id="header" class="container-fluid p-0 mb-5 mt-3">
    <div id="blog-carousel" class="carousel slide overlay-bottom" data-ride="carousel">
      <div class="carousel-inner">
        <div align="center" class="carousel-item active">
          <h1 class="display text-black m-0 mt-2">- JADWAL PENDAFTARAN -</h1>
          <img class="mr-5" src="../style/img/jadwal_ppdb.png" alt="Image" width="1000px" />
          <h1 class="display text-black m-0 mt-2" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"><strong>TATA CARA PENDAFTARAN</strong></h1>
          <img class="mr-5" src="../style/img/tata_cara.png" alt="Image" width="1000px" />
          <img class="mr-5" src="../style/img/kuota_ppdb.png" alt="Image" width="1000px" />
        </div>
      </div>
    </div>
  </div>
  <!-- Carousel End -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer mt-5">
    <div class="container">
      <div class="row gy-3">
        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-geo-alt icon"></i>
          <div>
            <h4>ALAMAT</h4>
            <p>
              Jl. Yos Sudarso, Tanjungpinang Barat, Kota Tanjungpinang<br />
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 footer-links d-flex">
          <i class="bi bi-telephone icon"></i>
          <div>
            <h4>Kontak</h4>
            <p>
              <strong>Phone:</strong> (0771) 315306<br />
              <strong>Email:</strong> sdn013_tpibarat@yahoo.co.id<br />
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Kunjungi Sosial Media untuk Informasi Lainnya</h4>
          <div class="social-links d-flex">
            <a title="facebook" href="https://www.facebook.com/profile.php?id=100068154853700" class="facebook"><i class="bi bi-facebook"></i></a>
            <a title="youtube" href="https://youtube.com/@sdn013tanjungpinangbarat2?si=ZXFFSBWgbQRcyJC2" class="youtube"><i class="bi bi-youtube"></i></a>
            <a title="whats-app" href="#" class="whats-app"><i class="bi bi-whatsapp"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 footer-links d-flex">
          <i class="bi bi-clock icon"></i>
          <div>
            <h4>Jam Sekolah</h4>
            <div>
              <h6 class="text-white text-uppercase">SISWA</h6>
              <p>
                - Senin-Kamis : <br />
                07.00 AM-14.30 PM
              </p>
              <p>
                - Jumat : <br />
                07.00 AM-11.00 PM
              </p>
              <h6 class="text-white text-uppercase">STAFF</h6>
              <p>
                - Senin-Kamis : <br />
                07.00 AM-15.30 PM
              </p>
              <p>
                - Jumat : <br />
                07.00 AM-11.00 PM
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>SDN 013 Tanjungpinang Barat</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by MAMANG UI PROJECT
      </div>
    </div>
  </footer>
  <!-- End Footer -->
  <!-- End Footer -->

  <!-- Template Javascript -->
  <script src="../style/js/main.js"></script>

  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
  <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="../lib/tempusdominus/js/moment.min.js"></script>
  <script src="../lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

  <!--=============== MAIN JS ===============-->
  <script src="../style/assets/js/main.js"></script>

</body>

</html>