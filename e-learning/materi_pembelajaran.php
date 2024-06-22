<?php
// Menghubungkan ke database
$koneksi = mysqli_connect("localhost", "root", "", "ppdb_sd13");

// Memeriksa koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}

// Query untuk Muatan Lokal - Pantun
$query_pantun = "SELECT * FROM e_learning WHERE kategori = 'materi' AND jenis = 'muatan_lokal' AND materi = 'pantun'";
$result_pantun = mysqli_query($koneksi, $query_pantun);

// Query untuk Muatan Lokal - Pulau Penyengat
$query_pulau_penyengat = "SELECT * FROM e_learning WHERE kategori = 'materi' AND jenis = 'muatan_lokal' AND materi = 'pulau_penyengat'";
$result_pulau_penyengat = mysqli_query($koneksi, $query_pulau_penyengat);

// Query untuk Muatan Lokal - Pencak Silat
$query_pencak_silat = "SELECT * FROM e_learning WHERE kategori = 'materi' AND jenis = 'muatan_lokal' AND materi = 'pencak_silat'";
$result_pencak_silat = mysqli_query($koneksi, $query_pencak_silat);

// Query untuk Muatan Lokal - Cerita Rakyat
$query_cerita_rakyat = "SELECT * FROM e_learning WHERE kategori = 'materi' AND jenis = 'muatan_lokal' AND materi = 'cerita_rakyat'";
$result_cerita_rakyat = mysqli_query($koneksi, $query_cerita_rakyat);

// Query untuk Muatan Lokal - Tanaman Obat Keluarga
$query_tanaman_obat = "SELECT * FROM e_learning WHERE kategori = 'materi' AND jenis = 'muatan_lokal' AND materi = 'tanaman_obat'";
$result_tanaman_obat = mysqli_query($koneksi, $query_tanaman_obat);

// Query untuk Muatan Lokal - Makanan Tradisional Melayu
$query_makanan_tradisional = "SELECT * FROM e_learning WHERE kategori = 'materi' AND jenis = 'muatan_lokal' AND materi = 'makanan_tradisional'";
$result_makanan_tradisional = mysqli_query($koneksi, $query_makanan_tradisional);

// Query untuk Muatan Lokal - Rumah Adat
$query_rumah_adat = "SELECT * FROM e_learning WHERE kategori = 'materi' AND jenis = 'muatan_lokal' AND materi = 'rumah_adat'";
$result_rumah_adat = mysqli_query($koneksi, $query_rumah_adat);

// Query untuk Muatan Lokal - Kepulauan Riau
$query_kepri = "SELECT * FROM e_learning WHERE kategori = 'materi' AND jenis = 'muatan_lokal' AND materi = 'kepri'";
$result_kepri = mysqli_query($koneksi, $query_kepri);

// Query untuk Muatan Lokal - Seni Musik Tradisional Melayu
$query_seni_musik = "SELECT * FROM e_learning WHERE kategori = 'materi' AND jenis = 'muatan_lokal' AND materi = 'seni_musik'";
$result_seni_musik = mysqli_query($koneksi, $query_seni_musik);

// Query untuk Muatan Lokal - Seni Pentas Melayu
$query_seni_pentas = "SELECT * FROM e_learning WHERE kategori = 'materi' AND jenis = 'muatan_lokal' AND materi = 'seni_pentas'";
$result_seni_pentas = mysqli_query($koneksi, $query_seni_pentas);

// Query untuk Muatan Lokal - Ornamen Melayu
$query_ornamen_melayu = "SELECT * FROM e_learning WHERE kategori = 'materi' AND jenis = 'muatan_lokal' AND materi = 'ornamen_melayu'";
$result_ornamen_melayu = mysqli_query($koneksi, $query_ornamen_melayu);

// Query untuk Muatan Lokal - Tulisan Arab Melayu
$query_tulisan_arab_melayu = "SELECT * FROM e_learning WHERE kategori = 'materi' AND jenis = 'muatan_lokal' AND materi = 'tulisan_arab_melayu'";
$result_tulisan_arab_melayu = mysqli_query($koneksi, $query_tulisan_arab_melayu);

// Query untuk Muatan Pengetahuan Umum - Matematika
$query_matematika = "SELECT * FROM e_learning WHERE kategori = 'materi' AND jenis = 'muatan_umum' AND materi = 'matematika'";
$result_matematika = mysqli_query($koneksi, $query_matematika);

// Query untuk Muatan Pengetahuan Umum - IPA
$query_ipa = "SELECT * FROM e_learning WHERE kategori = 'materi' AND jenis = 'muatan_umum' AND materi = 'ipa'";
$result_ipa = mysqli_query($koneksi, $query_ipa);

// Query untuk Muatan Pengetahuan Umum - AGAMA
$query_agama = "SELECT * FROM e_learning WHERE kategori = 'materi' AND jenis = 'muatan_umum' AND materi = 'agama'";
$result_agama = mysqli_query($koneksi, $query_agama);

// Query untuk Muatan Pengetahuan Umum - Bahasa Indonesia
$query_bahasa_indonesia = "SELECT * FROM e_learning WHERE kategori = 'materi' AND jenis = 'muatan_umum' AND materi = 'bahasa_indonesia'";
$result_bahasa_indonesia = mysqli_query($koneksi, $query_bahasa_indonesia);

// Query untuk Muatan Pengetahuan Umum - IPS
$query_ips = "SELECT * FROM e_learning WHERE kategori = 'materi' AND jenis = 'muatan_umum' AND materi = 'ips'";
$result_ips = mysqli_query($koneksi, $query_ips);

// Query untuk Muatan Pengetahuan Umum - PKN
$query_pkn = "SELECT * FROM e_learning WHERE kategori = 'materi' AND jenis = 'muatan_umum' AND materi = 'pkn'";
$result_pkn = mysqli_query($koneksi, $query_pkn);

// Query untuk Muatan Pengetahuan Umum - PJOK
$query_pjok = "SELECT * FROM e_learning WHERE kategori = 'materi' AND jenis = 'muatan_umum' AND materi = 'pjok'";
$result_pjok = mysqli_query($koneksi, $query_pjok);

// Query untuk Muatan Pengetahuan Umum - Seni Budaya
$query_seni_budaya = "SELECT * FROM e_learning WHERE kategori = 'materi' AND jenis = 'muatan_umum' AND materi = 'seni_budaya'";
$result_seni_budaya = mysqli_query($koneksi, $query_seni_budaya);

// Melakukan query untuk mengambil jumlah data materi pembelajaran
$query_count_lokal = "SELECT COUNT(*) as total FROM e_learning WHERE kategori = 'materi' AND jenis = 'muatan_lokal'";
$result_count_lokal = mysqli_query($koneksi, $query_count_lokal);
$row_count_lokal = mysqli_fetch_assoc($result_count_lokal);
$total_materi_lokal = $row_count_lokal['total'];

// Melakukan query untuk mengambil jumlah data materi pembelajaran
$query_count_umum = "SELECT COUNT(*) as total FROM e_learning WHERE kategori = 'materi' AND jenis = 'muatan_umum' ";
$result_count_umum = mysqli_query($koneksi, $query_count_umum);
$row_count_umum = mysqli_fetch_assoc($result_count_umum);
$total_materi_umum = $row_count_umum['total'];

// Melakukan query untuk mengambil data materi pembelajaran
$query = "SELECT * FROM e_learning WHERE kategori = 'materi'";
$result = mysqli_query($koneksi, $query);

// Memeriksa apakah query berhasil dieksekusi
if (!$result) {
    // Jika query gagal, tampilkan pesan error atau lakukan penanganan yang sesuai
    echo "Gagal mengambil data materi pembelajaran: " . mysqli_error($koneksi);
    exit();
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

    <link rel="stylesheet" href="fontawesome-free-5/css/all.min.css">

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

    <style>
        /*--------------------------------------------------------------
    # Cta
    --------------------------------------------------------------*/
        .cta {
            background: linear-gradient(rgba(40, 58, 90, 0.9), rgba(40, 58, 90, 0.9)), url("../assets/img/gedung.png") fixed center center;
            background-size: cover;
            padding: 120px 0;
        }

        .cta h3 {
            color: #fff;
            font-size: 28px;
            font-weight: 700;
        }

        .cta p {
            color: #fff;
        }

        .cta .cta-btn {
            font-family: "Jost", sans-serif;
            font-weight: 500;
            font-size: 16px;
            letter-spacing: 1px;
            display: inline-block;
            padding: 12px 40px;
            border-radius: 50px;
            transition: 0.5s;
            margin: 10px;
            border: 2px solid #fff;
            color: #fff;
        }

        .cta .cta-btn:hover {
            background: #47b2e4;
            border: 2px solid #47b2e4;
        }

        @media (min-width: 769px) {
            .cta .cta-btn-container {
                display: flex;
                align-items: center;
                justify-content: flex-end;
            }
        }

        /*--------------------------------------------------------------
            # Features
        --------------------------------------------------------------*/
        .features {
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
            padding-top: 20px;
        }

        .features .row {
            display: flex;
            justify-content: center;
            align-items: center;
            border: 2px solid #ddd;
            border-radius: 5px;
            margin: 10px 0;
        }

        .features .col-lg-6 {
            display: flex;
            flex-direction: column;
        }

        .features .icon-box {
            padding-left: 15px;
            text-align: left;
        }

        .features .icon-box h4 {
            font-size: 20px;
            font-weight: 700;
            margin: 5px 0 10px 0;
        }

        .features .icon-box i {
            font-size: 48px;
            color: #ffc451;
        }

        .features .icon-box p {
            font-size: 15px;
            color: #848484;
            margin: 0;
        }

        .features .image {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
            box-sizing: border-box;
        }

        .features .image img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .btn-download-certificate {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 20px;
            background-color: red;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn-download-certificate:hover {
            background-color: rgb(9, 207, 9);
            color: #fff;
        }

        .features .icon-box .download i {
            font-size: 15px;
            color: #fff;
            /* Menambah margin agar ikon terpisah dari teks */
        }

        .features .icon-box .date i {
            font-size: 15px;
            color: black;
        }

        @media (max-width: 767px) {
            .download {
                margin-bottom: 5px;
                font-size: 15px
            }
        }

        /*--------------------------------------------------------------
# Section Title
--------------------------------------------------------------*/
        .section-title1 {
            padding-bottom: 40px;
        }

        .section-title1 h2 {
            font-size: 14px;
            font-weight: 500;
            padding: 0;
            line-height: 1px;
            margin: 0 0 5px 0;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #aaaaaa;
            font-family: "Poppins", sans-serif;
        }

        .section-title1 h5 {
            padding: 0;
            line-height: 1px;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: black;
            font-family: "Poppins", sans-serif;
        }

        .section-title1 h5::after {
            content: "";
            width: 120px;
            height: 2px;
            display: inline-block;
            background: #ffde9e;
            margin: 4px 10px;
        }


        .section-title1 h2::after {
            content: "";
            width: 120px;
            height: 2px;
            display: inline-block;
            background: #ffde9e;
            margin: 4px 10px;
        }

        .section-title1 p {
            margin: 0;
            margin: 0;
            font-size: 36px;
            font-weight: 700;
            text-transform: uppercase;
            font-family: "Poppins", sans-serif;
            color: #151515;
        }

        @media (max-width: 767px) {
            .section-title1 h5 {
                margin-top: 30px;
                margin-bottom: -15px;
            }
        }

        .nav-link.active-red {
            background-color: red;
            color: red !important;
        }
    </style>

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

    <main id="main">
        <section id="mitra" class="services section-bg">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2 class="mt-4">Materi Pembelajaran</h2>
                    <h5>Materi yang tersedia merupakan materi yang diambil dari berbagai sumber media pembelajaran ayo lihat dan pelajari!</h5>
                </div>
                <div class="section-title1 mt-5">
                    <h2>Materi Pembelajaran</h2>
                    <p>Silahkan Lihat Materi Pembelajaran</p>
                    <h2>Total Materi Muatan Lokal: <?php echo $total_materi_lokal; ?></h2> <br>
                    <h2>Total Materi Muatan Pengetahuan Umum: <?php echo $total_materi_umum; ?></h2>
                </div>
            </div>
        </section>

        <!-- Kode section Features di sini -->
        <section id="features" class="features">
            <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="muatan-lokal-tab" data-bs-toggle="tab" data-bs-target="#muatan-lokal" type="button" role="tab" aria-controls="muatan-lokal" aria-selected="true">Muatan Lokal</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="muatan-umum-tab" data-bs-toggle="tab" data-bs-target="#muatan-umum" type="button" role="tab" aria-controls="muatan-umum" aria-selected="false">Muatan Pengetahuan Umum</button>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <!-- Muatan Lokal -->
                <div class="tab-pane fade show active" id="muatan-lokal" role="tabpanel" aria-labelledby="muatan-lokal-tab">
                    <ul class="nav nav-tabs justify-content-center" id="muatanLokalTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pantun-tab" data-bs-toggle="tab" data-bs-target="#pantun" type="button" role="tab" aria-controls="pantun" aria-selected="true">Pantun</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pulau_penyengat-tab" data-bs-toggle="tab" data-bs-target="#pulau_penyengat" type="button" role="tab" aria-controls="pulau_penyengat" aria-selected="false">Pulau Penyengat</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pencak_silat-tab" data-bs-toggle="tab" data-bs-target="#pencak_silat" type="button" role="tab" aria-controls="pencak_silat" aria-selected="true">Pencak Silat</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="cerita_rakyat-tab" data-bs-toggle="tab" data-bs-target="#cerita_rakyat" type="button" role="tab" aria-controls="cerita_rakyat" aria-selected="false">Cerita Rakyat</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="tanaman_obat-tab" data-bs-toggle="tab" data-bs-target="#tanaman_obat" type="button" role="tab" aria-controls="tanaman_obat" aria-selected="true">Tanaman Obat Keluarga</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="makanan_tradisional-tab" data-bs-toggle="tab" data-bs-target="#makanan_tradisional" type="button" role="tab" aria-controls="makanan_tradisional" aria-selected="false">Makanan Tradisional</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="rumah_adat-tab" data-bs-toggle="tab" data-bs-target="#rumah_adat" type="button" role="tab" aria-controls="rumah_adat" aria-selected="true">Rumah Adat</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="kepri-tab" data-bs-toggle="tab" data-bs-target="#kepri" type="button" role="tab" aria-controls="kepri" aria-selected="false">Provinsi Kepulauan Riau</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="seni_musik-tab" data-bs-toggle="tab" data-bs-target="seni_musik" type="button" role="tab" aria-controls="sen_musik" aria-selected="true">Seni Musik Tradisional Melayu</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="seni_pentas-tab" data-bs-toggle="tab" data-bs-target="#seni_pentas" type="button" role="tab" aria-controls="seni_pentas" aria-selected="false">Seni Pentas Melayu</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="ornamen_melayu-tab" data-bs-toggle="tab" data-bs-target="#ornamen_melayu" type="button" role="tab" aria-controls="ornamen_melayu" aria-selected="true">Ornamen Melayu</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="tulisan_arab_melayu-tab" data-bs-toggle="tab" data-bs-target="#tulisan_arab_melayu" type="button" role="tab" aria-controls="tulisan_arab_melayu" aria-selected="false">Tulisan Arab Melayu</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="muatanLokalTabContent">
                        <!-- Pantun -->
                        <div class="tab-pane fade show active" id="pantun" role="tabpanel" aria-labelledby="pantun-tab">
                            <div class="container" data-aos="fade-up">
                                <?php while ($row = mysqli_fetch_assoc($result_pantun)) : ?>
                                    <div class="row">
                                        <div class="col-lg-12" data-aos="fade-left" data-aos-delay="100">
                                            <div class="icon-box mt-5 mt-lg-0" data-aos="zoom-in" data-aos-delay="150">
                                                <i class="bx bx-receipt"></i>
                                                <h4>Judul Materi: <?php echo $row['judul_konten']; ?></h4>
                                                <div class="date mt-2">
                                                    <?php if ($row['link_yt'] != '-') : ?>
                                                        <a href="<?php echo $row['link_yt']; ?>" target="_blank">Link Materi - Klik Disini</a>
                                                    <?php else : ?>
                                                        Link Materi: <?php echo $row['link_yt']; ?>
                                                    <?php endif; ?>
                                                </div>
                                                <h5>Created by: <?php echo $row['created_by']; ?></h5>
                                                <div class="download mt-2 mb-2">
                                                    <a href="../admin_menu/file_materi/<?php echo $row['file']; ?>" download="<?php echo $row['file']; ?>" class="btn-download-certificate">
                                                        <i class="fas fa-download"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                        <!-- Pulau Penyengat -->
                        <div class="tab-pane fade" id="pulau_penyengat" role="tabpanel" aria-labelledby="pulau_penyengat-tab">
                            <div class="container" data-aos="fade-up">
                                <?php while ($row = mysqli_fetch_assoc($result_pulau_penyengat)) : ?>
                                    <div class="row">
                                        <div class="col-lg-12" data-aos="fade-left" data-aos-delay="100">
                                            <div class="icon-box mt-5 mt-lg-0" data-aos="zoom-in" data-aos-delay="150">
                                                <i class="bx bx-receipt"></i>
                                                <h4>Judul Materi: <?php echo $row['judul_konten']; ?></h4>
                                                <div class="date mt-2">
                                                    <?php if ($row['link_yt'] != '-') : ?>
                                                        <a href="<?php echo $row['link_yt']; ?>" target="_blank">Link Materi - Klik Disini</a>
                                                    <?php else : ?>
                                                        Link Materi: <?php echo $row['link_yt']; ?>
                                                    <?php endif; ?>
                                                </div>
                                                <h5>Created by: <?php echo $row['created_by']; ?></h5>
                                                <div class="download mt-2 mb-2">
                                                    <a href="../admin_menu/file_materi/<?php echo $row['file']; ?>" download="<?php echo $row['file']; ?>" class="btn-download-certificate">
                                                        <i class="fas fa-download"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                        <!-- Pencak Silat -->
                        <div class="tab-pane fade" id="pencak_silat" role="tabpanel" aria-labelledby="pencak_silat-tab">
                            <div class="container" data-aos="fade-up">
                                <?php while ($row = mysqli_fetch_assoc($result_pencak_silat)) : ?>
                                    <div class="row">
                                        <div class="col-lg-12" data-aos="fade-left" data-aos-delay="100">
                                            <div class="icon-box mt-5 mt-lg-0" data-aos="zoom-in" data-aos-delay="150">
                                                <i class="bx bx-receipt"></i>
                                                <h4>Judul Materi: <?php echo $row['judul_konten']; ?></h4>
                                                <div class="date mt-2">
                                                    <?php if ($row['link_yt'] != '-') : ?>
                                                        <a href="<?php echo $row['link_yt']; ?>" target="_blank">Link Materi - Klik Disini</a>
                                                    <?php else : ?>
                                                        Link Materi: <?php echo $row['link_yt']; ?>
                                                    <?php endif; ?>
                                                </div>
                                                <h5>Created by: <?php echo $row['created_by']; ?></h5>
                                                <div class="download mt-2 mb-2">
                                                    <a href="../admin_menu/file_materi/<?php echo $row['file']; ?>" download="<?php echo $row['file']; ?>" class="btn-download-certificate">
                                                        <i class="fas fa-download"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                        <!-- Cerita Rakyat -->
                        <div class="tab-pane fade" id="cerita_rakyat" role="tabpanel" aria-labelledby="cerita_rakyat-tab">
                            <div class="container" data-aos="fade-up">
                                <?php while ($row = mysqli_fetch_assoc($result_cerita_rakyat)) : ?>
                                    <div class="row">
                                        <div class="col-lg-12" data-aos="fade-left" data-aos-delay="100">
                                            <div class="icon-box mt-5 mt-lg-0" data-aos="zoom-in" data-aos-delay="150">
                                                <i class="bx bx-receipt"></i>
                                                <h4>Judul Materi: <?php echo $row['judul_konten']; ?></h4>
                                                <div class="date mt-2">
                                                    <?php if ($row['link_yt'] != '-') : ?>
                                                        <a href="<?php echo $row['link_yt']; ?>" target="_blank">Link Materi - Klik Disini</a>
                                                    <?php else : ?>
                                                        Link Materi: <?php echo $row['link_yt']; ?>
                                                    <?php endif; ?>
                                                </div>
                                                <h5>Created by: <?php echo $row['created_by']; ?></h5>
                                                <div class="download mt-2 mb-2">
                                                    <a href="../admin_menu/file_materi/<?php echo $row['file']; ?>" download="<?php echo $row['file']; ?>" class="btn-download-certificate">
                                                        <i class="fas fa-download"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                        <!-- Tanaman Obat Keluarga -->
                        <div class="tab-pane fade" id="tanaman_obat" role="tabpanel" aria-labelledby="tanaman_obat-tab">
                            <div class="container" data-aos="fade-up">
                                <?php while ($row = mysqli_fetch_assoc($result_tanaman_obat)) : ?>
                                    <div class="row">
                                        <div class="col-lg-12" data-aos="fade-left" data-aos-delay="100">
                                            <div class="icon-box mt-5 mt-lg-0" data-aos="zoom-in" data-aos-delay="150">
                                                <i class="bx bx-receipt"></i>
                                                <h4>Judul Materi: <?php echo $row['judul_konten']; ?></h4>
                                                <div class="date mt-2">
                                                    <?php if ($row['link_yt'] != '-') : ?>
                                                        <a href="<?php echo $row['link_yt']; ?>" target="_blank">Link Materi - Klik Disini</a>
                                                    <?php else : ?>
                                                        Link Materi: <?php echo $row['link_yt']; ?>
                                                    <?php endif; ?>
                                                </div>
                                                <h5>Created by: <?php echo $row['created_by']; ?></h5>
                                                <div class="download mt-2 mb-2">
                                                    <a href="../admin_menu/file_materi/<?php echo $row['file']; ?>" download="<?php echo $row['file']; ?>" class="btn-download-certificate">
                                                        <i class="fas fa-download"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                        <!-- Makanan Tradisional Melayu -->
                        <div class="tab-pane fade" id="makanan_tradisional" role="tabpanel" aria-labelledby="makanan_tradisional-tab">
                            <div class="container" data-aos="fade-up">
                                <?php while ($row = mysqli_fetch_assoc($result_makanan_tradisional)) : ?>
                                    <div class="row">
                                        <div class="col-lg-12" data-aos="fade-left" data-aos-delay="100">
                                            <div class="icon-box mt-5 mt-lg-0" data-aos="zoom-in" data-aos-delay="150">
                                                <i class="bx bx-receipt"></i>
                                                <h4>Judul Materi: <?php echo $row['judul_konten']; ?></h4>
                                                <div class="date mt-2">
                                                    <?php if ($row['link_yt'] != '-') : ?>
                                                        <a href="<?php echo $row['link_yt']; ?>" target="_blank">Link Materi - Klik Disini</a>
                                                    <?php else : ?>
                                                        Link Materi: <?php echo $row['link_yt']; ?>
                                                    <?php endif; ?>
                                                </div>
                                                <h5>Created by: <?php echo $row['created_by']; ?></h5>
                                                <div class="download mt-2 mb-2">
                                                    <a href="../admin_menu/file_materi/<?php echo $row['file']; ?>" download="<?php echo $row['file']; ?>" class="btn-download-certificate">
                                                        <i class="fas fa-download"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                            <!-- Rumah Adat -->
                            <div class="tab-pane fade" id="rumah_adat" role="tabpanel" aria-labelledby="rumah_adat-tab">
                                <div class="container" data-aos="fade-up">
                                    <?php while ($row = mysqli_fetch_assoc($result_rumah_adat)) : ?>
                                        <div class="row">
                                            <div class="col-lg-12" data-aos="fade-left" data-aos-delay="100">
                                                <div class="icon-box mt-5 mt-lg-0" data-aos="zoom-in" data-aos-delay="150">
                                                    <i class="bx bx-receipt"></i>
                                                    <h4>Judul Materi: <?php echo $row['judul_konten']; ?></h4>
                                                    <div class="date mt-2">
                                                        <?php if ($row['link_yt'] != '-') : ?>
                                                            <a href="<?php echo $row['link_yt']; ?>" target="_blank">Link Materi - Klik Disini</a>
                                                        <?php else : ?>
                                                            Link Materi: <?php echo $row['link_yt']; ?>
                                                        <?php endif; ?>
                                                    </div>
                                                    <h5>Created by: <?php echo $row['created_by']; ?></h5>
                                                    <div class="download mt-2 mb-2">
                                                        <a href="../admin_menu/file_materi/<?php echo $row['file']; ?>" download="<?php echo $row['file']; ?>" class="btn-download-certificate">
                                                            <i class="fas fa-download"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                            <!-- Provinsi Kepulauan Riau -->
                            <div class="tab-pane fade" id="kepri" role="tabpanel" aria-labelledby="kepri-tab">
                                <div class="container" data-aos="fade-up">
                                    <?php while ($row = mysqli_fetch_assoc($result_kepri)) : ?>
                                        <div class="row">
                                            <div class="col-lg-12" data-aos="fade-left" data-aos-delay="100">
                                                <div class="icon-box mt-5 mt-lg-0" data-aos="zoom-in" data-aos-delay="150">
                                                    <i class="bx bx-receipt"></i>
                                                    <h4>Judul Materi: <?php echo $row['judul_konten']; ?></h4>
                                                    <div class="date mt-2">
                                                        <?php if ($row['link_yt'] != '-') : ?>
                                                            <a href="<?php echo $row['link_yt']; ?>" target="_blank">Link Materi - Klik Disini</a>
                                                        <?php else : ?>
                                                            Link Materi: <?php echo $row['link_yt']; ?>
                                                        <?php endif; ?>
                                                    </div>
                                                    <h5>Created by: <?php echo $row['created_by']; ?></h5>
                                                    <div class="download mt-2 mb-2">
                                                        <a href="../admin_menu/file_materi/<?php echo $row['file']; ?>" download="<?php echo $row['file']; ?>" class="btn-download-certificate">
                                                            <i class="fas fa-download"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                            <!-- Seni Musik Tradisional -->
                            <div class="tab-pane fade" id="seni_musik" role="tabpanel" aria-labelledby="seni_musik-tab">
                                <div class="container" data-aos="fade-up">
                                    <?php while ($row = mysqli_fetch_assoc($result_seni_musik)) : ?>
                                        <div class="row">
                                            <div class="col-lg-12" data-aos="fade-left" data-aos-delay="100">
                                                <div class="icon-box mt-5 mt-lg-0" data-aos="zoom-in" data-aos-delay="150">
                                                    <i class="bx bx-receipt"></i>
                                                    <h4>Judul Materi: <?php echo $row['judul_konten']; ?></h4>
                                                    <div class="date mt-2">
                                                        <?php if ($row['link_yt'] != '-') : ?>
                                                            <a href="<?php echo $row['link_yt']; ?>" target="_blank">Link Materi - Klik Disini</a>
                                                        <?php else : ?>
                                                            Link Materi: <?php echo $row['link_yt']; ?>
                                                        <?php endif; ?>
                                                    </div>
                                                    <h5>Created by: <?php echo $row['created_by']; ?></h5>
                                                    <div class="download mt-2 mb-2">
                                                        <a href="../admin_menu/file_materi/<?php echo $row['file']; ?>" download="<?php echo $row['file']; ?>" class="btn-download-certificate">
                                                            <i class="fas fa-download"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                            <!-- Seni Pentas -->
                            <div class="tab-pane fade" id="seni_pentas" role="tabpanel" aria-labelledby="seni_pentas-tab">
                                <div class="container" data-aos="fade-up">
                                    <?php while ($row = mysqli_fetch_assoc($result_seni_pentas)) : ?>
                                        <div class="row">
                                            <div class="col-lg-12" data-aos="fade-left" data-aos-delay="100">
                                                <div class="icon-box mt-5 mt-lg-0" data-aos="zoom-in" data-aos-delay="150">
                                                    <i class="bx bx-receipt"></i>
                                                    <h4>Judul Materi: <?php echo $row['judul_konten']; ?></h4>
                                                    <div class="date mt-2">
                                                        <?php if ($row['link_yt'] != '-') : ?>
                                                            <a href="<?php echo $row['link_yt']; ?>" target="_blank">Link Materi - Klik Disini</a>
                                                        <?php else : ?>
                                                            Link Materi: <?php echo $row['link_yt']; ?>
                                                        <?php endif; ?>
                                                    </div>
                                                    <h5>Created by: <?php echo $row['created_by']; ?></h5>
                                                    <div class="download mt-2 mb-2">
                                                        <a href="../admin_menu/file_materi/<?php echo $row['file']; ?>" download="<?php echo $row['file']; ?>" class="btn-download-certificate">
                                                            <i class="fas fa-download"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                                <!-- Ornamen Melayu -->
                                <div class="tab-pane fade" id="ornamen_melayu" role="tabpanel" aria-labelledby="ornamen_melayu-tab">
                                    <div class="container" data-aos="fade-up">
                                        <?php while ($row = mysqli_fetch_assoc($result_ornamen_melayu)) : ?>
                                            <div class="row">
                                                <div class="col-lg-12" data-aos="fade-left" data-aos-delay="100">
                                                    <div class="icon-box mt-5 mt-lg-0" data-aos="zoom-in" data-aos-delay="150">
                                                        <i class="bx bx-receipt"></i>
                                                        <h4>Judul Materi: <?php echo $row['judul_konten']; ?></h4>
                                                        <div class="date mt-2">
                                                            <?php if ($row['link_yt'] != '-') : ?>
                                                                <a href="<?php echo $row['link_yt']; ?>" target="_blank">Link Materi - Klik Disini</a>
                                                            <?php else : ?>
                                                                Link Materi: <?php echo $row['link_yt']; ?>
                                                            <?php endif; ?>
                                                        </div>
                                                        <h5>Created by: <?php echo $row['created_by']; ?></h5>
                                                        <div class="download mt-2 mb-2">
                                                            <a href="../admin_menu/file_materi/<?php echo $row['file']; ?>" download="<?php echo $row['file']; ?>" class="btn-download-certificate">
                                                                <i class="fas fa-download"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                    </div>
                                </div>
                                <!-- Tulisan Arab Melayu -->
                                <div class="tab-pane fade" id="tulisan_arab_melayu" role="tabpanel" aria-labelledby="tulisan_arab_melayu-tab">
                                    <div class="container" data-aos="fade-up">
                                        <?php while ($row = mysqli_fetch_assoc($result_tulisan_arab_melayu)) : ?>
                                            <div class="row">
                                                <div class="col-lg-12" data-aos="fade-left" data-aos-delay="100">
                                                    <div class="icon-box mt-5 mt-lg-0" data-aos="zoom-in" data-aos-delay="150">
                                                        <i class="bx bx-receipt"></i>
                                                        <h4>Judul Materi: <?php echo $row['judul_konten']; ?></h4>
                                                        <div class="date mt-2">
                                                            <?php if ($row['link_yt'] != '-') : ?>
                                                                <a href="<?php echo $row['link_yt']; ?>" target="_blank">Link Materi - Klik Disini</a>
                                                            <?php else : ?>
                                                                Link Materi: <?php echo $row['link_yt']; ?>
                                                            <?php endif; ?>
                                                        </div>
                                                        <h5>Created by: <?php echo $row['created_by']; ?></h5>
                                                        <div class="download mt-2 mb-2">
                                                            <a href="../admin_menu/file_materi/<?php echo $row['file']; ?>" download="<?php echo $row['file']; ?>" class="btn-download-certificate">
                                                                <i class="fas fa-download"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Muatan Pengetahuan Umum -->
                <div class="tab-pane fade" id="muatan-umum" role="tabpanel" aria-labelledby="muatan-umum-tab">
                    <ul class="nav nav-tabs justify-content-center" id="muatanUmumTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="matematika-tab" data-bs-toggle="tab" data-bs-target="#matematika" type="button" role="tab" aria-controls="matematika" aria-selected="true">Matematika</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="ipa-tab" data-bs-toggle="tab" data-bs-target="#ipa" type="button" role="tab" aria-controls="ipa" aria-selected="false">IPA</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="ips-tab" data-bs-toggle="tab" data-bs-target="#ips" type="button" role="tab" aria-controls="ips" aria-selected="true">IPS</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="bahasa_indonesia-tab" data-bs-toggle="tab" data-bs-target="#bahasa_indonesia" type="button" role="tab" aria-controls="bahasa_indonesia" aria-selected="false">Bahasa Indonesia</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pkn-tab" data-bs-toggle="tab" data-bs-target="#pkn" type="button" role="tab" aria-controls="pkn" aria-selected="true">PKN</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="agama-tab" data-bs-toggle="tab" data-bs-target="#agama" type="button" role="tab" aria-controls="agama" aria-selected="false">Agama</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="seni_budaya-tab" data-bs-toggle="tab" data-bs-target="#seni_budaya" type="button" role="tab" aria-controls="seni_budaya" aria-selected="true">Seni Budaya</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pjok-tab" data-bs-toggle="tab" data-bs-target="#pjok" type="button" role="tab" aria-controls="pjok" aria-selected="false">PJOK</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="muatanUmumTabContent">
                        <!-- Matematika -->
                        <div class="tab-pane fade show active" id="matematika" role="tabpanel" aria-labelledby="matematika-tab">
                            <div class="container" data-aos="fade-up">
                                <?php while ($row = mysqli_fetch_assoc($result_matematika)) : ?>
                                    <div class="row">
                                        <div class="col-lg-12" data-aos="fade-left" data-aos-delay="100">
                                            <div class="icon-box mt-5 mt-lg-0" data-aos="zoom-in" data-aos-delay="150">
                                                <i class="bx bx-receipt"></i>
                                                <h4>Judul Materi: <?php echo $row['judul_konten']; ?></h4>
                                                <div class="date mt-2">
                                                    <?php if ($row['link_yt'] != '-') : ?>
                                                        <a href="<?php echo $row['link_yt']; ?>" target="_blank">Link Materi - Klik Disini</a>
                                                    <?php else : ?>
                                                        Link Materi: <?php echo $row['link_yt']; ?>
                                                    <?php endif; ?>
                                                </div>
                                                <h5>Created by: <?php echo $row['created_by']; ?></h5>
                                                <div class="download mt-2 mb-2">
                                                    <a href="../admin_menu/file_materi/<?php echo $row['file']; ?>" download="<?php echo $row['file']; ?>" class="btn-download-certificate">
                                                        <i class="fas fa-download"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                        <!-- IPA -->
                        <div class="tab-pane fade" id="ipa" role="tabpanel" aria-labelledby="ipa-tab">
                            <div class="container" data-aos="fade-up">
                                <?php while ($row = mysqli_fetch_assoc($result_ipa)) : ?>
                                    <div class="row">
                                        <div class="col-lg-12" data-aos="fade-left" data-aos-delay="100">
                                            <div class="icon-box mt-5 mt-lg-0" data-aos="zoom-in" data-aos-delay="150">
                                                <i class="bx bx-receipt"></i>
                                                <h4>Judul Materi: <?php echo $row['judul_konten']; ?></h4>
                                                <div class="date mt-2">
                                                    <?php if ($row['link_yt'] != '-') : ?>
                                                        <a href="<?php echo $row['link_yt']; ?>" target="_blank">Link Materi - Klik Disini</a>
                                                    <?php else : ?>
                                                        Link Materi: <?php echo $row['link_yt']; ?>
                                                    <?php endif; ?>
                                                </div>
                                                <h5>Created by: <?php echo $row['created_by']; ?></h5>
                                                <div class="download mt-2 mb-2">
                                                    <a href="../admin_menu/file_materi/<?php echo $row['file']; ?>" download="<?php echo $row['file']; ?>" class="btn-download-certificate">
                                                        <i class="fas fa-download"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                        <!-- AGAMA -->
                        <div class="tab-pane fade" id="agama" role="tabpanel" aria-labelledby="agama-tab">
                            <div class="container" data-aos="fade-up">
                                <?php while ($row = mysqli_fetch_assoc($result_agama)) : ?>
                                    <div class="row">
                                        <div class="col-lg-12" data-aos="fade-left" data-aos-delay="100">
                                            <div class="icon-box mt-5 mt-lg-0" data-aos="zoom-in" data-aos-delay="150">
                                                <i class="bx bx-receipt"></i>
                                                <h4>Judul Materi: <?php echo $row['judul_konten']; ?></h4>
                                                <div class="date mt-2">
                                                    <?php if ($row['link_yt'] != '-') : ?>
                                                        <a href="<?php echo $row['link_yt']; ?>" target="_blank">Link Materi - Klik Disini</a>
                                                    <?php else : ?>
                                                        Link Materi: <?php echo $row['link_yt']; ?>
                                                    <?php endif; ?>
                                                </div>
                                                <h5>Created by: <?php echo $row['created_by']; ?></h5>
                                                <div class="download mt-2 mb-2">
                                                    <a href="../admin_menu/file_materi/<?php echo $row['file']; ?>" download="<?php echo $row['file']; ?>" class="btn-download-certificate">
                                                        <i class="fas fa-download"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                        <!-- IPS -->
                        <div class="tab-pane fade" id="ips" role="tabpanel" aria-labelledby="ips-tab">
                            <div class="container" data-aos="fade-up">
                                <?php while ($row = mysqli_fetch_assoc($result_ips)) : ?>
                                    <div class="row">
                                        <div class="col-lg-12" data-aos="fade-left" data-aos-delay="100">
                                            <div class="icon-box mt-5 mt-lg-0" data-aos="zoom-in" data-aos-delay="150">
                                                <i class="bx bx-receipt"></i>
                                                <h4>Judul Materi: <?php echo $row['judul_konten']; ?></h4>
                                                <div class="date mt-2">
                                                    <?php if ($row['link_yt'] != '-') : ?>
                                                        <a href="<?php echo $row['link_yt']; ?>" target="_blank">Link Materi - Klik Disini</a>
                                                    <?php else : ?>
                                                        Link Materi: <?php echo $row['link_yt']; ?>
                                                    <?php endif; ?>
                                                </div>
                                                <h5>Created by: <?php echo $row['created_by']; ?></h5>
                                                <div class="download mt-2 mb-2">
                                                    <a href="../admin_menu/file_materi/<?php echo $row['file']; ?>" download="<?php echo $row['file']; ?>" class="btn-download-certificate">
                                                        <i class="fas fa-download"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                        <!-- PKN -->
                        <div class="tab-pane fade" id="pkn" role="tabpanel" aria-labelledby="pkn-tab">
                            <div class="container" data-aos="fade-up">
                                <?php while ($row = mysqli_fetch_assoc($result_pkn)) : ?>
                                    <div class="row">
                                        <div class="col-lg-12" data-aos="fade-left" data-aos-delay="100">
                                            <div class="icon-box mt-5 mt-lg-0" data-aos="zoom-in" data-aos-delay="150">
                                                <i class="bx bx-receipt"></i>
                                                <h4>Judul Materi: <?php echo $row['judul_konten']; ?></h4>
                                                <div class="date mt-2">
                                                    <?php if ($row['link_yt'] != '-') : ?>
                                                        <a href="<?php echo $row['link_yt']; ?>" target="_blank">Link Materi - Klik Disini</a>
                                                    <?php else : ?>
                                                        Link Materi: <?php echo $row['link_yt']; ?>
                                                    <?php endif; ?>
                                                </div>
                                                <h5>Created by: <?php echo $row['created_by']; ?></h5>
                                                <div class="download mt-2 mb-2">
                                                    <a href="../admin_menu/file_materi/<?php echo $row['file']; ?>" download="<?php echo $row['file']; ?>" class="btn-download-certificate">
                                                        <i class="fas fa-download"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                        <!-- Bahasa Indonesia -->
                        <div class="tab-pane fade" id="bahasa_indonesia" role="tabpanel" aria-labelledby="bahasa_indonesia-tab">
                            <div class="container" data-aos="fade-up">
                                <?php while ($row = mysqli_fetch_assoc($result_bahasa_indonesia)) : ?>
                                    <div class="row">
                                        <div class="col-lg-12" data-aos="fade-left" data-aos-delay="100">
                                            <div class="icon-box mt-5 mt-lg-0" data-aos="zoom-in" data-aos-delay="150">
                                                <i class="bx bx-receipt"></i>
                                                <h4>Judul Materi: <?php echo $row['judul_konten']; ?></h4>
                                                <div class="date mt-2">
                                                    <?php if ($row['link_yt'] != '-') : ?>
                                                        <a href="<?php echo $row['link_yt']; ?>" target="_blank">Link Materi - Klik Disini</a>
                                                    <?php else : ?>
                                                        Link Materi: <?php echo $row['link_yt']; ?>
                                                    <?php endif; ?>
                                                </div>
                                                <h5>Created by: <?php echo $row['created_by']; ?></h5>
                                                <div class="download mt-2 mb-2">
                                                    <a href="../admin_menu/file_materi/<?php echo $row['file']; ?>" download="<?php echo $row['file']; ?>" class="btn-download-certificate">
                                                        <i class="fas fa-download"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                        <!-- PJOK -->
                        <div class="tab-pane fade" id="pjok" role="tabpanel" aria-labelledby="pjok-tab">
                            <div class="container" data-aos="fade-up">
                                <?php while ($row = mysqli_fetch_assoc($result_pjok)) : ?>
                                    <div class="row">
                                        <div class="col-lg-12" data-aos="fade-left" data-aos-delay="100">
                                            <div class="icon-box mt-5 mt-lg-0" data-aos="zoom-in" data-aos-delay="150">
                                                <i class="bx bx-receipt"></i>
                                                <h4>Judul Materi: <?php echo $row['judul_konten']; ?></h4>
                                                <div class="date mt-2">
                                                    <?php if ($row['link_yt'] != '-') : ?>
                                                        <a href="<?php echo $row['link_yt']; ?>" target="_blank">Link Materi - Klik Disini</a>
                                                    <?php else : ?>
                                                        Link Materi: <?php echo $row['link_yt']; ?>
                                                    <?php endif; ?>
                                                </div>
                                                <h5>Created by: <?php echo $row['created_by']; ?></h5>
                                                <div class="download mt-2 mb-2">
                                                    <a href="../admin_menu/file_materi/<?php echo $row['file']; ?>" download="<?php echo $row['file']; ?>" class="btn-download-certificate">
                                                        <i class="fas fa-download"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                        <!-- Seni Budaya -->
                        <div class="tab-pane fade" id="seni_budaya" role="tabpanel" aria-labelledby="seni_budaya-tab">
                            <div class="container" data-aos="fade-up">
                                <?php while ($row = mysqli_fetch_assoc($result_seni_budaya)) : ?>
                                    <div class="row">
                                        <div class="col-lg-12" data-aos="fade-left" data-aos-delay="100">
                                            <div class="icon-box mt-5 mt-lg-0" data-aos="zoom-in" data-aos-delay="150">
                                                <i class="bx bx-receipt"></i>
                                                <h4>Judul Materi: <?php echo $row['judul_konten']; ?></h4>
                                                <div class="date mt-2">
                                                    <?php if ($row['link_yt'] != '-') : ?>
                                                        <a href="<?php echo $row['link_yt']; ?>" target="_blank">Link Materi - Klik Disini</a>
                                                    <?php else : ?>
                                                        Link Materi: <?php echo $row['link_yt']; ?>
                                                    <?php endif; ?>
                                                </div>
                                                <h5>Created by: <?php echo $row['created_by']; ?></h5>
                                                <div class="download mt-2 mb-2">
                                                    <a href="../admin_menu/file_materi/<?php echo $row['file']; ?>" download="<?php echo $row['file']; ?>" class="btn-download-certificate">
                                                        <i class="fas fa-download"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

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

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabLinks = document.querySelectorAll('#muatanLokalTab .nav-link');

            tabLinks.forEach(link => {
                link.addEventListener('click', function() {
                    tabLinks.forEach(link => link.classList.remove('active-red'));
                    this.classList.add('active-red');
                });
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabLinks = document.querySelectorAll('#muatanUmumTab .nav-link');

            tabLinks.forEach(link => {
                link.addEventListener('click', function() {
                    tabLinks.forEach(link => link.classList.remove('active-red'));
                    this.classList.add('active-red');
                });
            });
        });
    </script>

</body>

</html>