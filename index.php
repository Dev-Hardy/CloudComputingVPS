<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST['send'])) {
  $name = htmlentities($_POST['name']);
  $email = htmlentities($_POST['email']);
  $subject = htmlentities($_POST['subject']);
  $message = htmlentities($_POST['message']);

  $mail = new PHPMailer(true);
  try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = '013sdntanjungpinangbarat@gmail.com'; // Your G-Mail Address
    $mail->Password = 'abzrczsogizfdwtc'; // Your Gmail Password or App Password
    $mail->Port = 587; // Use 587 for TLS or 465 for SSL
    $mail->SMTPSecure = 'tls'; // Use 'tls' or 'ssl'
    $mail->isHTML(true);
    $mail->setFrom($email, $name);
    $mail->addAddress('013sdntanjungpinangbarat@gmail.com');
    $mail->Subject = "$email ($subject)";
    $mail->Body = $message;
    $mail->send();
    header("Location: index.php?email_sent=1"); // Change 'contact.php' to 'index.php'
    exit(); // Make sure to exit after header redirection
  } catch (Exception $e) {
    echo "Pesan tidak dapat dikirim!. Mailer Error: {$mail->ErrorInfo}";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SDN 013 Tanjungpinang Barat</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

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


</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">
      <div class="logo me-auto">
        <img src="assets/img/clients/LOGO SINDIKAT.png" alt="Logo" width="220" height="100">
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
          <li class="dropdown"><a href="#"><span>Profil</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a class="nav-link scrollto active" href="#visi">Visi & Misi</a></li>
              <li><a class="nav-link scrollto active" href="#tatib">Tata Tertib</a></li>
              <li><a class="nav-link scrollto active" href="keluarga.php">Keluarga Besar</a></li>
              <li class="dropdown"><a href="#"><span>Sumber Daya</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#kepsek">Kepala Sekolah</a></li>
                  <li><a href="#tenaga_pendidik">Tenaga Pendidik</a></li>
                  <li><a href="#fasilitas">Fasilitas Sekolah</a></li>
                  <li><a href="#mitra">Ekstrakurikuler</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>PPDB</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="alurpendaftaran.html">Petunjuk Teknis</a></li>
              <li><a href="login_siswa/registrasi.php">Pendaftaran Ulang</a></li>
              <li><a href="user/hasil_seleksi.php">Pengumuman Hasil Seleksi</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="e-learning/index.php">E-Learning</a></li>
          <li><a class="nav-link scrollto" href="#mitra">Informasi</a></li>
          <li><a class="nav-link scrollto" href="#berita">Berita</a></li>
          <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
          <li class="dropdown"><a class="getstarted scrollto">Login<i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="login_siswa/login_siswa.php">Siswa</a></li>
              <li><a href="admin_menu/login.php">Admin</a></li>
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
          <h1>Selamat Datang</h1>
          <h2>Sistem Informasi SD Negeri 013 Tanjungpinang Barat Sekolah Pusat Keunggulan Bidang Seni dan Ekonomi Kreatif</h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="#berita" class="btn-get-started scrollto">Informasi</a>
            <a href="https://www.youtube.com/watch?v=d0809-x7R6g" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Lihat Video</span></a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="assets/img/clients/Logo-3.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients section-bg">
      <div class="container">

        <div class="row" data-aos="zoom-in">

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/Tutwurihandayani.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/MB.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/Kurikulum.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/SD.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/mengajar.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/kota.png" class="img-fluid" alt="">
          </div>


        </div>

      </div>
    </section><!-- End Cliens Section -->

    <!-- ======= About Us Section ======= -->
    <section class="about" id="visi">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Profil <br> SD Negeri 013 Tanjungpinang Barat</h2>
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <img src="assets/img/clients/Kurikulum.png" class="img-fluid animated" alt="">
            <img src="assets/img/clients/MB.png" class="img-fluid animated" alt="">
            <img src="assets/img/clients/mengajar.png" class="img-fluid animated" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
            <div class="section-title">
              <h2>Visi</h2><br>
              Terwujudnya peserta didik yang berakhlak mulia, kreatif, sehat, cerdas, berwawasan dan berprofil pelajar pancasila.
            </div>
            <div class="section-title">
              <h2>Misi</h2>
            </div>
            <ul>
              <li><i class="ri-check-double-line"></i> Membiasakan siswa jujur dalam bertindak, serta bertanggung jawab terhadap diri, sekolah dan lingkungan.</li>
              <li><i class="ri-check-double-line"></i> Membiasakan siswa beribadah menurut agama dan kepercayaan masing-masing.</li>
              <li><i class="ri-check-double-line"></i> Membiasakan siswa melakukan 55: Seyum, Sapa, Salam, Sopan Santun dalam perilaku.</li>
              <li><i class="ri-check-double-line"></i> Membiasakan siswa menjaga Kesehatan diri, baik jasmani maupun rohani. </li>
              <li><i class="ri-check-double-line"></i> Membiasakan siswa meningkatkan kemampuan akademik maupun non akademik.</li>
              <li><i class="ri-check-double-line"></i> Membiasakan sikap peduli terhadap lingkungan dan pembinaan sikap santun pada orang tua, guru dan teman.</li>
              <li><i class="ri-check-double-line"></i> Membiasakan siswa untuk melestarikan lingkungan dengan melakukan tugas rutin sekolah.</li>
              <li><i class="ri-check-double-line"></i> Mengintegrasikan materi lingkungan hidup (LH) dalam mata pelajaran.</li>
              <li><i class="ri-check-double-line"></i> Membiasakan diri ikut kegiatan aksi lingkungan bersih.</li>
              <li><i class="ri-check-double-line"></i> Menjaga kelestarian lingkungan dengan mencegah pencemaran dan kerusakan lingkungan dengan program 7-K (Keamanan, Kebersihan, Keimanan, Keindahan, Ketertiban dan Kekeluargaan).</li>
              <li><i class="ri-check-double-line"></i> Mebangun lingkungan sekolah yang bertoleransi dalam kebhinekaan golbal, mencintai budaya local dan menjungung nilai gotong royonh.</li>
            </ul>
          </div>
        </div>
      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Tata Tertib ======= -->
    <section class="why-us section-bg" id="tatib">
      <div class="container-fluid" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">
            <div class="section-title">
              <h2>Tata Tertib</h2>
            </div>

            <div class="accordion-list">
              <ul>
                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed"><span>A.</span> <strong>Bagi Siswa</strong><i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                    <ol><i class="ri-check-double-line"></i> 1. Setiap hari kegiatan pagi dimulai pukul 07.00 wib.</ol>
                    <ol><i class="ri-check-double-line"></i> 2. Sepuluh menit sebelum kegiatan dimulai, semuasiswa harus sudah ada di sekolah.</ol>
                    <ol><i class="ri-check-double-line"></i> 3. Setiap hari pembelajaran dimulai pukul : 07.30 wib.</ol>
                    <ol><i class="ri-check-double-line"></i> 4. Pada waktu pelajaran berlangsung siswa tidak diperkenankan keluar masuk ruangan kelas , kecuali telah mendapat izin dari Guru Kelas. </ol>
                    <ol><i class="ri-check-double-line"></i> 5. Siswa yang berhalangan mengikuti pelajaran , apapun alasannya , orang tua / walinya harus memberitahukan secara tertulis atau lisan ke sekolah.</ol>
                    <ol><i class="ri-check-double-line"></i> 6. Setiap siswa wajib berpakaian seragam sekolah sesuai dengan ketentuan yang , yaitu : <br>
                      a.Hari Senin - Selasa berpakaian seragam putih merah <br>
                      b.Hari Rabu berpakaian batik <br>
                      c.Hari Kamis berpakaian pramuka / olahraga <br>
                      d.Hari Jum'at berpakaian baju kurung.</ol>
                    <ol><i class="ri-check-double-line"></i> 7. Siswa tidak boleh memakai perhiasan yang berlebihan di sekolah untuk menghindari hal - hal yang tidak diinginkan.</ol>
                    <ol><i class="ri-check-double-line"></i> 8. Siswa harus selalu berpakaian sopan dan rapi , baik di sekolah maupun di luar sekolah.</ol>
                    <ol><i class="ri-check-double-line"></i> 9. Setiap siswa wajib bersikap hormat kepada Kepala Sekolah , semua guru , penjaga sekolah dan lainnya. </ol>
                    <ol><i class="ri-check-double-line"></i> 10. Setiap siswa wajib mengikuti salah satu kegiatan ekstrakurikuler sekolah, seperti pramuka, marawis, karate, kesenian, dll.</ol>
                    </p>
                  </div>
                </li>

                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed"><span>B.</span> <strong>Bagi Guru</strong><i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                    <ol><i class="ri-check-double-line"></i> 1. Setiap hari pelajaran dimulai pukul 07.30 WIB. </ol>
                    <ol><i class="ri-check-double-line"></i> 2. Lima belas menit sebelum pelajaran dimulai , semua guru harus sudah ada di sekolah.</ol>
                    <ol><i class="ri-check-double-line"></i> 3. Guru yang berhalangan hadir wajib memberitahu baik Ilsan maupun tulisan kepada Kepala Sekolah.</ol>
                    <ol><i class="ri-check-double-line"></i> 4. Tata tertib berpakaian untuk guru : a Hari Senin s.d. Selasa berpakaian PDH Coklat b.Hari Rabu berpakalan PGRI / Hitam - Putih Hari Kamis berpakalan Pramuka / Olah Raga d.Pada peringatan hari - hari tertentu dapat menyesuaikan dengan anjuran dari atasan / dinas.</ol>
                    <ol><i class="ri-check-double-line"></i> 5. Setiap guru wajib menjaga nama baik sekolah berkenaan dengan tugas pokok dan fungsinya sebagai tenaga pendidik.</ol>
                    </p>
                  </div>
                </li>

                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-4" class="collapsed"><span>C.</span> <strong>Sanksi</strong><i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-4" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                      Sekolah dapat memberikan sanksi kepada warga ( siswa / guru ) yang melanggar Tata Tertib ini dengan alternatif sanksi sebagai berikut ini :
                    <ol><i class="ri-check-double-line"></i> 1. Peringatan lisan.</ol>
                    <ol><i class="ri-check-double-line"></i> 2. Peringatan tertulis.</ol>
                    </p>
                  </div>
                </li>
              </ul>
            </div>
          </div>

          <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style='background-image: url("assets/img/hero-img.png");' data-aos="zoom-in" data-aos-delay="150">&nbsp;</div>
        </div>

      </div>
    </section><!-- Tata Tertib-->


    <!-- ======= Skills Section ======= -->
    <section id="kepsek" class="skills">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 d-flex align-items-center" data-aos="fade-right" data-aos-delay="100">
            <img src="assets/img/guru/Kepala Sekolah.PNG" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left" data-aos-delay="100">
            <h3>Kepala Sekolah SD Negeri 013 Tanjungpinang Barat</h3>
            <p class="fst-italic" align="justify">
              Salam hangat untuk anak-anak yang hebat di SDN 013 Tanjungpinang Barat! Saya, sebagai Kepala Sekolah, merasa bangga dan bahagia melihat semangat belajar kalian yang luar biasa. Tahun ajaran baru ini merupakan kesempatan baru untuk tumbuh, belajar, dan mencapai potensi penuh kalian. Mari bersama-sama membangun lingkungan sekolah yang positif, menjaga semangat kebersamaan, dan bersinergi dalam mencapai prestasi. Saya yakin, dengan kerja keras dan tekad yang kuat, kalian akan meraih keberhasilan yang gemilang. Selamat belajar, teman-teman! Saya percaya, kita akan menciptakan tahun ajaran yang penuh prestasi dan kebahagiaan bersama-sama. Terima kasih.
            </p>
            <h5 align="center">
              - Marunah Kepala Sekolah SD Negeri 013 TPI Barat -
            </h5>
          </div>
        </div>

      </div>
    </section><!-- End Skills Section -->

    <!-- ======= DATA GURU ======= -->
    <section id="tenaga_pendidik" class="chefs section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Tenaga Pendidik</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
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

            // Query untuk mengambil data guru dari database
            $sql_guru = "SELECT * FROM data_guru";
            $result_guru = mysqli_query($koneksi, $sql_guru);

            // Periksa apakah ada data guru yang ditemukan
            if (mysqli_num_rows($result_guru) > 0) {
              // Loop melalui setiap baris data guru
              while ($row = mysqli_fetch_assoc($result_guru)) {
                // Tampilkan informasi guru dari database
                echo '<div class="swiper-slide event-item col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">';
                echo '<div class="chef-member">';
                echo '<div class="member-img">';
                echo '<img src="admin_menu/foto/guru/' . $row['foto_guru'] . '" class="img-fluid" alt="" />';
                echo '<div class="social">';
                echo '<a title="twitter" href="#"><i class="bi bi-twitter"></i></a>';
                echo '<a title="facebook" href="#"><i class="bi bi-facebook"></i></a>';
                echo '<a title="instagram" href="#"><i class="bi bi-instagram"></i></a>';
                echo '<a title="linkedin" href="#"><i class="bi bi-linkedin"></i></a>';
                echo '</div>';
                echo '</div>';
                echo '<div class="member-info">';
                echo '<h4>' . $row['nama_guru'] . '</h4>';
                echo '<span>' . $row['jenis_ptk'] . '</span>';
                echo '<p>' . $row['kata_pengantar'] . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
              }
            } else {
              // Jika tidak ada data guru yang ditemukan
              echo '<p>Tidak ada data guru yang tersedia.</p>';
            }

            // Tutup koneksi database
            mysqli_close($koneksi);
            ?>
          </div>
          <br>
          <br>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section>
    <!-- End Chefs Section -->


    <!-- ======= Portfolio Section ======= -->
    <section id="fasilitas" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Fasilitas</h2>
          <p>Berikut merupakan fasilitas yang disediakan oleh SDN 013 Tanjungpinang Barat untuk menunjang proses belajar dan mengajar.</p>
        </div>

        <ul id="portfolio-flters" class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
          <li data-filter="*" class="filter-active">Semua</li>
          <li data-filter=".filter-dalam">Dalam Ruangan</li>
          <li data-filter=".filter-luar">Luar Ruangan</li>
        </ul>

        <!--Bagian Luar-->

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

          <div class="col-lg-4 col-md-6 portfolio-item filter-luar">
            <div class="portfolio-img"><img src="assets/img/sekolah/lapangan2.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Lapangan Upacara</h4>
              <p>SDN 013 TPIBARAT</p>
              <a href="assets/img/sekolah/lapangan2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Lapangan Upacara"><i class="bx bx-camera"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-luar">
            <div class="portfolio-img"><img src="assets/img/sekolah/luarmushola.JPG" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Mushola</h4>
              <p>SDN 013 TPIBARAT</p>
              <a href="assets/img/sekolah/luarmushola.JPG" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Mushola"><i class="bx  bx-camera"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-dalam">
            <div class="portfolio-img"><img src="assets/img/sekolah/mushola.png" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Mushola</h4>
              <p>SDN 013 TPIBARAT</p>
              <a href="assets/img/sekolah/mushola.png" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Mushola"><i class="bx  bx-camera"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-luar">
            <div class="portfolio-img"><img src="assets/img/sekolah/parkiran.png" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Parkiran Guru dan Staf</h4>
              <p>SDN 013 TPIBARAT</p>
              <a href="assets/img/sekolah/parkiran.png" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Parkiran Kendaraan"><i class="bx  bx-camera"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-dalam">
            <div class="portfolio-img"><img src="assets/img/sekolah/rapat.JPG" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Ruang Rapat</h4>
              <p>SDN 013 TPIBARAT</p>
              <a href="assets/img/sekolah/rapat.JPG" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Ruang Rapat"><i class="bx  bx-camera"></i></a>

            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-luar">
            <div class="portfolio-img"><img src="assets/img/sekolah/perpustakaan.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Perpustakaan</h4>
              <p>SDN 013 TPIBARAT</p>
              <a href="assets/img/sekolah/perpustakaan.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Perpustakaan"><i class="bx  bx-camera"></i></a>

            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-luar">
            <div class="portfolio-img"><img src="assets/img/sekolah/uks2.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>UKS</h4>
              <p>SDN 013 TPIBARAT</p>
              <a href="assets/img/sekolah/uks2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Unit Kesehatan Sekolah"><i class="bx  bx-camera"></i></a>

            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-luar">
            <div class="portfolio-img"><img src="assets/img/sekolah/papan.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Papan Sekolah</h4>
              <p>SDN 013 TPIBARAT</p>
              <a href="assets/img/sekolah/papan.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Papan Nama Sekolah"><i class="bx  bx-camera"></i></a>

            </div>
          </div>

          <!--Bagian Dalam-->

          <div class="col-lg-4 col-md-6 portfolio-item filter-dalam">
            <div class="portfolio-img"><img src="assets/img/sekolah/kelas.JPG" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Ruang Kelas</h4>
              <p>SDN 013 TPIBARAT</p>
              <a href="assets/img/sekolah/kelas.JPG" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Ruang Kelas"><i class="bx  bx-camera"></i></a>

            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-dalam">
            <div class="portfolio-img"><img src="assets/img/sekolah/guru.JPG" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Ruang Guru</h4>
              <p>SDN 013 TPIBARAT</p>
              <a href="assets/img/sekolah/guru.JPG" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Ruang Guru"><i class="bx  bx-camera"></i></a>

            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-dalam">
            <div class="portfolio-img"><img src="assets/img/sekolah/mading.JPG" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Majalah Dinding</h4>
              <p>SDN 013 TPIBARAT</p>
              <a href="assets/img/sekolah/mading.JPG" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Majalah Dinding"><i class="bx  bx-camera"></i></a>

            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-dalam">
            <div class="portfolio-img"><img src="assets/img/sekolah/perpustakaan.png" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Perpustakaan</h4>
              <p>SDN 013 TPIBARAT</p>
              <a href="assets/img/sekolah/perpustakaan.png" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Perpustakaan"><i class="bx  bx-camera"></i></a>

            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-dalam">
            <div class="portfolio-img"><img src="assets/img/sekolah/uks.JPG" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Unit Kesehatan Siswa</h4>
              <p>SDN 013 TPIBARAT</p>
              <a href="assets/img/sekolah/uks.JPG" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Unit Kesehatan Siswa"><i class="bx  bx-camera"></i></a>

            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-dalam">
            <div class="portfolio-img"><img src="assets/img/sekolah/tu.JPG" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Ruang Tata Usaha</h4>
              <p>SDN 013 TPIBARAT</p>
              <a href="assets/img/sekolah/tu.JPG" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Ruang Tata Usaha"><i class="bx  bx-camera"></i></a>

            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-dalam">
            <div class="portfolio-img"><img src="assets/img/sekolah/wc.JPG" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Toilet Siswa</h4>
              <p>SDN 013 TPIBARAT</p>
              <a href="assets/img/sekolah/wc.JPG" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Toilet Siswa"><i class="bx  bx-camera"></i></a>

            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-luar">
            <div class="portfolio-img"><img src="assets/img/sekolah/tampakatas.png" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Ruang Kelas Dari Atas</h4>
              <p>SDN 013 TPIBARAT</p>
              <a href="assets/img/sekolah/tampakatas.png" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Ruang Kelas Dari Atas"><i class="bx  bx-camera"></i></a>

            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-luar">
            <div class="portfolio-img"><img src="assets/img/sekolah/lapangan.png" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Lapangan Olahraga</h4>
              <p>SDN 013 TPIBARAT</p>
              <a href="assets/img/sekolah/lapangan.png" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Lapangan Olahraga"><i class="bx  bx-camera"></i></a>

            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Mitra Section ======= -->
    <section id="mitra" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Ekstrakurikuler</h2>
          <p>SD Negeri 013 Tanjungpinang Barat memiliki beberapa Ekstrakurikuler yang mengajak siswa dan siswinya berpartisipasi dalam kegiatan tersebut. Dengan adanya kegiatan ini dapat membentuk minat dan bakat para siswa/siswi yang di terapkan sejak dini dan menjadi bekal untuk kedepannya</p><br><br>
          <div class="row">
            <div class="col-xl-3 col-md-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
              <div class="icon-box">
                <div align="center">
                  <img src="assets/img/portfolio/karate.jpg" alt="" style="width: 50%; height: auto;">
                </div><br>
                <h4 align="center">Karate</h4>

              </div>
            </div>

            <div class="col-xl-3 col-md-4 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="300">
              <div class="icon-box">
                <div align="center"><br>
                  <img src="assets/img/portfolio/pramuka.png" alt="" style="width: 50%; height: auto;">
                </div><br>
                <h4 align="center">Pramuka</h4>

              </div>
            </div>

            <div class="col-xl-3 col-md-4 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="400">
              <div class="icon-box">
                <div align="center"><br>
                  <img src="assets/img/portfolio/menari.png" alt="" style="width: 50%; height: auto;">
                </div><br>
                <h4 align="center">Menari</h4>
              </div>
            </div>

            <div class="col-xl-3 col-md-4 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="400">
              <div class="icon-box">
                <div align="center"><br>
                  <img src="assets/img/portfolio/paduan.png" alt="" style="width: 50%; height: auto;">
                </div><br>
                <h4 align="center">Paduan Suara</h4>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section><!-- End Services Section -->

    <!-- ======= Youtube Section ======= -->
    <section id="youtube" class="cta">
      <div class="container" data-aos="zoom-in">
        <div class="row">
          <!-- Video Frame 1 -->
          <div class="col-xl-6 col-md-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="500">
            <div class="icon-box video-box">
              <div class="video-container">
                <iframe width="100%" height="300" src="https://www.youtube.com/embed/d0809-x7R6g" frameborder="0" allowfullscreen></iframe>
              </div><br>
              <h1 style="color:aqua" align="center"><strong>Pendidikan Indonesia</strong></h1>
              <p align="center">Pendidikan Indonesia mencakup sistem pendidikan nasional yang terdiri dari pendidikan formal, informal, dan nonformal. Terkait Undang-Undang Sistem Pendidikan Nasional (UU No. 20 Tahun 2003), pendidikan di Indonesia dibagi menjadi tiga tingkatan, yaitu dasar, menengah, dan tinggi. Pendidikan dasar dan menengah wajib, sementara perguruan tinggi menyediakan berbagai program studi.</p>
            </div>
          </div>

          <!-- Video Frame 2 -->
          <div class="col-xl-6 col-md-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="600">
            <div class="icon-box video-box">
              <div class="video-container">
                <iframe width="100%" height="300" src="https://www.youtube.com/embed/d7mb5uhDliM" frameborder="0" allowfullscreen></iframe>
              </div><br>
              <h1 style="color:aqua" align="center"><strong>Merdeka Belajar</strong></h1>
              <p align="center">Merdeka Belajar, sebagai paradigma pendidikan di Indonesia, memberikan siswa keleluasaan untuk memilih mata pelajaran, metode pembelajaran, dan kegiatan ekstrakurikuler sesuai dengan minat dan bakat mereka. Guru, sebagai fasilitator, mendukung pengembangan keterampilan abad ke-21 seperti berpikir kritis, kreativitas, dan komunikasi.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Youtube Section -->


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


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Pelayanan Sistem</h2>
          <p>Jika anda butuh informasi lebih lanjut mengenai Sistem Informasi Digital Akademik SD Negeri 013 Tanjungpinang Barat, Dapat mengirimkan pesan email dengan menggunakan formulir dibawah ini. Atas perhatiannya kami ucapkan Terimaksih.</p>
        </div>

        <div class="row">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Lokasi:</h4>
                <p>Jl. Yos Sudarso No.24, Kp. Baru, Kec. Tanjungpinang Barat., Kota Tanjung Pinang, Kepulauan Riau</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>013sdntanjungpinangbarat.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+62 8127856</p>
              </div>

              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.3166410309204!2d104.4384927302599!3d0.9086125207322081!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d972f15918f419%3A0x22bec178aa6ceae3!2sSdn%20013%20Tanjungpinang%20Barat!5e0!3m2!1sid!2sid!4v1696679325835!5m2!1sid!2sid" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
            </div>
          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="#" method="post" role="form" class="emaill">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Nama</label>
                  <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="email" id="email" required>
                </div>
              </div>
              <div class="form-group">
                <label for="subject">Subjek</label>
                <input type="text" class="form-control" name="subject" id="subject" required>
              </div>
              <div class="form-group">
                <label for="message">Pesan</label>
                <textarea class="form-control" name="message" id="message" rows="10" required></textarea>
              </div>
              <div class="text-center">
                <button type="submit" name="send">Kirim</button>
              </div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

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
              <li><i class="bx bx-chevron-right"></i> <a href="#beranda">Beranda</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Profil</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">PPDB</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#mitra">Informasi</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#berita">Berita</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Pengaduan layanan</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#contact">Pelayanan Sistem</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#contact">Kontak</a></li>
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

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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