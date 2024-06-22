<?php
// Menghubungkan ke database
$koneksi = mysqli_connect("localhost", "root", "", "ppdb_sd13");

// Memeriksa koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}

// Melakukan query untuk mengambil data konten yt Muatan Lokal
$query_muatan_lokal = "SELECT * FROM e_learning WHERE kategori = 'konten_yt' AND jenis = 'muatan_lokal'";
$result_muatan_lokal = mysqli_query($koneksi, $query_muatan_lokal);

// Memeriksa apakah query berhasil dieksekusi
if (!$result_muatan_lokal) {
    // Jika query gagal, tampilkan pesan error atau lakukan penanganan yang sesuai
    echo "Gagal mengambil data konten yt Muatan Lokal: " . mysqli_error($koneksi);
} else {
    // Menyiapkan array untuk menyimpan data konten yt Muatan Lokal
    $videos_muatan_lokal = array();

    // Mengambil hasil query dan menyimpannya ke dalam array
    while ($row = mysqli_fetch_assoc($result_muatan_lokal)) {
        $videos_muatan_lokal[] = $row;
    }
}

// Melakukan query untuk mengambil data konten yt Muatan Pengetahuan Umum
$query_muatan_umum = "SELECT * FROM e_learning WHERE kategori = 'konten_yt' AND jenis = 'muatan_umum'";
$result_muatan_umum = mysqli_query($koneksi, $query_muatan_umum);

// Memeriksa apakah query berhasil dieksekusi
if (!$result_muatan_umum) {
    // Jika query gagal, tampilkan pesan error atau lakukan penanganan yang sesuai
    echo "Gagal mengambil data konten yt Muatan Pengetahuan Umum: " . mysqli_error($koneksi);
} else {
    // Menyiapkan array untuk menyimpan data konten yt Muatan Pengetahuan Umum
    $videos_muatan_umum = array();

    // Mengambil hasil query dan menyimpannya ke dalam array
    while ($row = mysqli_fetch_assoc($result_muatan_umum)) {
        $videos_muatan_umum[] = $row;
    }
}

// Menutup koneksi database
mysqli_close($koneksi);
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

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css?= time();?>" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex justify-content-between">

            <div class="logo">
                <a href="konten_yt.php"><img src="../assets/img/clients/sidikatbiru.png" alt="" class="img-fluid" width="150" height="100"></a>
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="getstarted scrollto" href="logout.php">Logout</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle text-dark"></i>

            </nav><!-- .navbar -->

        </div>
    </header><!-- #header -->

    <main id="main"><br><br>
        <!-- ======= Mitra Section ======= -->
        <section id="mitra" class="services section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Konten YouTube</h2>
                    <h5>Materi yang tersedia merupakan materi yang diambil dari berbagai sumber media pembelajaran ayo lihat dan pelajari!</h5>
                </div>
                <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="muatan-lokal-tab" data-bs-toggle="tab" data-bs-target="#muatan-lokal" type="button" role="tab" aria-controls="muatan-lokal" aria-selected="true">Muatan Lokal</button>
                        <br>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="muatan-umum-tab" data-bs-toggle="tab" data-bs-target="#muatan-umum" type="button" role="tab" aria-controls="muatan-umum" aria-selected="false">Muatan Pengetahuan Umum</button>
                        <br>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="muatan-lokal" role="tabpanel" aria-labelledby="muatan-lokal-tab">
                        <div class="row">
                            <?php $count = 0; ?>
                            <?php foreach ($videos_muatan_lokal as $video) : ?>
                                <?php $count++; ?>
                                <div class="col-xl-6 col-md-6 mb-4" data-aos="zoom-in" data-aos-delay="500">
                                    <div class="icon-box" style="margin-bottom: 20px; background-color: #f8f9fa; padding: 15px; border-radius: 10px;">
                                        <div align="center">
                                            <a href="<?php echo $video['link_yt']; ?>" target="_blank" rel="noopener noreferrer">
                                                <iframe class="video-frame" style="border: 3px solid black; border-radius: 5px; width: 100%; height: 50vh;" src="<?php echo $video['link_yt']; ?>" frameborder="0" allowfullscreen></iframe>
                                            </a>
                                            <div class="judul_konten mt-3" style="text-align: center;">
                                                <h2 style="color: coral; font-size: 20px;"><strong><?php echo $video['judul_konten']; ?></strong></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php if ($count % 2 == 0) : ?>
                        </div>
                        <div class="row">
                        <?php endif; ?>
                    <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="muatan-umum" role="tabpanel" aria-labelledby="muatan-umum-tab">
                        <div class="row">
                            <?php $count = 0; ?>
                            <?php foreach ($videos_muatan_umum as $video) : ?>
                                <?php $count++; ?>
                                <div class="col-xl-6 col-md-6 mb-4" data-aos="zoom-in" data-aos-delay="500">
                                    <div class="icon-box" style="margin-bottom: 20px; background-color: #f8f9fa; padding: 15px; border-radius: 10px;">
                                        <div align="center">
                                            <a href="<?php echo $video['link_yt']; ?>" target="_blank" rel="noopener noreferrer">
                                                <iframe class="video-frame" style="border: 3px solid black; border-radius: 5px; width: 100%; height: 50vh;" src="<?php echo $video['link_yt']; ?>" frameborder="0" allowfullscreen></iframe>
                                            </a>
                                            <div class="judul_konten mt-3" style="text-align: center;">
                                                <h2 style="color: coral; font-size: 20px;"><strong><?php echo $video['judul_konten']; ?></strong></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php if ($count % 2 == 0) : ?>
                        </div>
                        <div class="row">
                        <?php endif; ?>
                    <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Services Section -->

    </main><!-- End #main -->

    <footer id="footer">
        <div class="footer-newsletter">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <img src="../assets/img/clients/sidikathitam.png" class="img-fluid animated" alt="">
                    </div>
                </div>
            </div>
        </div>

    </footer>

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