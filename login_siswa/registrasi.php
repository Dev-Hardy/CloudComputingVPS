<?php session_start(); ?>
<?php
include('../connect/connection.php');

if (isset($_POST["register"])) {
  $nama_pendek = $_POST["nama_pendek"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $nik = $_POST["nik"];

  $check_email_query = mysqli_query($connect, "SELECT * FROM login_siswa WHERE email ='$email'");
  $rowCountEmail = mysqli_num_rows($check_email_query);

  $check_nik_query = mysqli_query($connect, "SELECT * FROM login_siswa WHERE nik ='$nik'");
  $rowCountNik = mysqli_num_rows($check_nik_query);

  if (!empty($email) && !empty($password)) {
    if ($rowCountEmail > 0) {
?>
      <script>
        alert("Pengguna Dengan Email Tersebut Sudah Ada!");
      </script>
    <?php
    } elseif ($rowCountNik > 0) {
    ?>
      <script>
        alert("NIK Sudah Didaftarkan!");
      </script>
      <?php
    } else {
      $password_hash = password_hash($password, PASSWORD_BCRYPT);

      $result = mysqli_query($connect, "INSERT INTO login_siswa (email, nik, nama_pendek, password, status) VALUES ('$email', '$nik', '$nama_pendek', '$password_hash', 0)");

      if ($result) {
        $otp = rand(100000, 999999);
        $_SESSION['otp'] = $otp;
        $_SESSION['mail'] = $email;
        require "../Mail/phpmailer/PHPMailerAutoload.php";
        $mail = new PHPMailer;

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';

        $mail->Username = '013sdntanjungpinangbarat@gmail.com';
        $mail->Password = 'abzrczsogizfdwtc';

        $mail->setFrom('013sdntanjungpinangbarat@gmail.com', 'Registrasi Berhasil');
        $mail->addAddress($_POST["email"]);

        $mail->isHTML(true);
        $mail->Subject = "Verifikasi Akun Anda!";
        $mail->Body = "<p>Selamat datang di SD Negeri 013 Tanjungpinang Barat!<br> Terimakasih telah melakukan pendaftaran akun PPDB SD Negeri 013 Tanjungpinang Barat. <br> Berikut Ini Adalah Kode OTP Untuk Verifikasi Akun Anda: </p> <h3>Kode OTP: $otp</h3>";

        if (!$mail->send()) {
      ?>
          <script>
            alert("<?php echo "Registerasi Gagal, Email Tidak Valid" ?>");
          </script>
        <?php
        } else {
        ?>
          <script>
            alert("<?php echo "Registerasi Berhasil, Kode OTP Telah Dikirim! " ?>");
            window.location.replace('otp.php');
          </script>
<?php
        }
      }
    }
  }
}
?>

<?php
date_default_timezone_set('Asia/Jakarta');
include('../connect/connection.php');

if (isset($_POST["register"])) {
    $nama_pendek = $_POST["nama_pendek"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $nik = $_POST["nik"];

    $check_email_query = mysqli_query($connect, "SELECT * FROM login_siswa WHERE email ='$email'");
    $rowCountEmail = mysqli_num_rows($check_email_query);

    $check_nik_query = mysqli_query($connect, "SELECT * FROM login_siswa WHERE nik ='$nik'");
    $rowCountNik = mysqli_num_rows($check_nik_query);

    if (!empty($email) && !empty($password)) {
        if ($rowCountEmail > 0) {
?>
            <script>
                alert("Pengguna Dengan Email Tersebut Sudah Ada!");
            </script>
        <?php
        } elseif ($rowCountNik > 0) {
        ?>
            <script>
                alert("NIK Sudah Didaftarkan!");
            </script>
        <?php
        } else {
            $password_hash = password_hash($password, PASSWORD_BCRYPT);

            $result = mysqli_query($connect, "INSERT INTO login_siswa (email, nik, nama_pendek, password, status) VALUES ('$email', '$nik', '$nama_pendek', '$password_hash', 0)");

            if ($result) {
                $otp = rand(100000, 999999);
                $_SESSION['otp'] = $otp;
                $_SESSION['mail'] = $email;
                require "Mail/phpmailer/PHPMailerAutoload.php";
                $mail = new PHPMailer;

                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = 587;
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = 'tls';

                $mail->Username = '013sdntanjungpinangbarat@gmail.com';
                $mail->Password = 'abzrczsogizfdwtc';

                $mail->setFrom('013sdntanjungpinangbarat@gmail.com', 'Registrasi Berhasil');
                $mail->addAddress($_POST["email"]);

                $mail->isHTML(true);
                $mail->Subject = "Verifikasi Akun Anda!";
                $mail->Body = "<p>Selamat datang di SD Negeri 013 Tanjungpinang Barat!<br> Terimakasih telah melakukan pendaftaran akun PPDB SD Negeri 013 Tanjungpinang Barat. <br> Berikut Ini Adalah Kode OTP Untuk Verifikasi Akun Anda: </p> <h3>Kode OTP: $otp</h3>";

                if (!$mail->send()) {
        ?>
                    <script>
                        alert("<?php echo "Registerasi Gagal, Email Tidak Valid" ?>");
                    </script>
                <?php
                } else {
                ?>
                    <script>
                        alert("<?php echo "Registerasi Berhasil, Kode OTP Telah Dikirim! " ?>");
                        window.location.replace('otp.php');
                    </script>
<?php
                }
            }
        }
    }
}
?>

<?php
include('../connect/connection.php');

// Mengecek status countdown dari database
$query_countdown = mysqli_query($connect, "SELECT * FROM countdown_login");
$countdown_data = mysqli_fetch_assoc($query_countdown);

$status = $countdown_data['status'];

if ($status == 'NonAktif') {
    // Jika status adalah 'NonAktif', tampilkan pesan "Coming Soon"
    echo "<h1 style='text-align: center; margin-top: 100px;'>Coming Soon</h1>";
} else {
    // Jika status adalah 'Aktif', lanjutkan dengan menampilkan countdown
    $currentDateTime = date("Y-m-d H:i:s"); // Waktu saat ini
    $targetDateTime = $countdown_data["target_datetime"]; // Waktu target dari database

    // Menghitung selisih waktu antara waktu saat ini dan waktu target
    $timeDiff = strtotime($targetDateTime) - strtotime($currentDateTime);
    $remainingTime = $timeDiff > 0 ? $timeDiff : 0;

    // Inisialisasi variabel untuk menyimpan status countdown
    $countdownFinished = false;

    if ($remainingTime > 0) {
        // Jika masih ada waktu yang tersisa, set status countdown
        $countdownFinished = false;
    } else {
        // Jika waktu sudah habis, set status countdown selesai
        $countdownFinished = true;
    }

    if ($countdownFinished) {
        // Jika countdown telah selesai, tampilkan formulir registrasi
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Registrasi | SIDIKAT</title>
            <!-- Favicons -->
            <link href="../assets/img/clients/Tutwurihandayani.png" rel="icon">
            <link href="../assets/img/clients/Tutwurihandayani.png" rel="apple-touch-icon">

            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
            <link rel="stylesheet" href="../assets/css/login.css?= time();?>" />
        </head>

        <body>
            <!-- Formulir Registrasi -->
            <div class="container d-flex justify-content-center align-items-center min-vh-100">
                <!----------------------- Login Container -------------------------->

                <div class="row border rounded-5 p-3 bg-white shadow box-area">
                    <!--------------------------- Left Box ----------------------------->

                    <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #103cbe">
                        <div class="featured-image mb-3">
                            <img src="../assets/img/clients/ppdbnew.png" class="img-fluid" style="width: 250px" />
                        </div>
                        <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600">Segera Daftar</p>
                        <small class="text-white text-wrap text-center" style="width: 17rem; font-family: 'Courier New', Courier, monospace">Masuk dan input berkas yang di perlukan.</small>
                    </div>

                    <!-------------------- ------ Right Box ---------------------------->

                    <div class="col-md-6 right-box">
                        <div class="row align-items-center">
                            <div class="header-text mb-4">
                                <h2 align="center"><strong>Dashboard Registrasi|</strong>PPDB 2024</h2>
                                <p align="center">Segera daftarkan putra dan putri anda di SD Negeri 013 Tanjungpinang Barat!</p>
                            </div>

                            <div class="card-body">
                                <form action="#" method="POST" name="register">
                                    <!-- Username input -->
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control form-control-lg bg-light fs-6" name="nama_pendek" required placeholder="Username" />
                                    </div>

                                    <!-- NIK input -->
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control form-control-lg bg-light fs-6" name="nik" required placeholder="NIK Siswa" />
                                    </div>

                                    <!-- Email input -->
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control form-control-lg bg-light fs-6" name="email" required placeholder="Alamat Email" />
                                    </div>

                                    <!-- Password input with custom eye icon -->
                                    <div class="input-group mb-1">
                                        <input type="password" class="form-control form-control-lg bg-light fs-6" name="password" id="password" required pattern=".{6,}" title="Password Harus 6 Karakter" placeholder="Password" />
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <img src="eye-icon.png" alt="Toggle Password" id="eye-icon" style="width: 20px; height: 30px;">
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Other input fields (if any) -->

                                    <!-- Submit button -->
                                    <div class="input-group mb-5 d-flex justify-content-between"></div>
                                    <div class="input-group mb-3">
                                        <button class="btn btn-lg btn-primary w-100 fs-6" name="register">Daftar</button>
                                    </div>

                                    <!-- Login link -->
                                    <div class="row">
                                        <small>Sudah punya akun? <a href="login.php">Login</a></small>
                                    </div>
                                </form>

                                <script>
                                    // JavaScript to toggle password visibility
                                    const passwordInput = document.getElementById('password');
                                    const eyeIcon = document.getElementById('eye-icon');

                                    eyeIcon.src = '../assets/eye/close.png'; // Set the default image source

                                    eyeIcon.addEventListener('click', function () {
                                        if (passwordInput.type === 'password') {
                                            passwordInput.type = 'text';
                                            eyeIcon.src = '../assets/eye/open.png'; // Change to closed eye icon image
                                        } else {
                                            passwordInput.type = 'password';
                                            eyeIcon.src = '../assets/eye/close.png'; // Change to open eye icon image
                                        }
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                const toggle = document.getElementById('togglePassword');
                const password = document.getElementById('password');
                let isPasswordVisible = false;

                toggle.addEventListener('click', function() {
                    isPasswordVisible = !isPasswordVisible;
                    password.type = isPasswordVisible ? 'text' : 'password';
                    this.classList.toggle('bi-eye', isPasswordVisible);
                    this.classList.toggle('bi-eye-slash', !isPasswordVisible);
                });
            </script>
        </body>

        </html>
    <?php
    } else {
        // Jika countdown masih berjalan, tampilkan countdown
    ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Countdown | PPDB</title>
            <!-- Favicons -->
            <link href="assets/img/clients/Tutwurihandayani.png" rel="icon">
            <link href="assets/img/clients/Tutwurihandayani.png" rel="apple-touch-icon">

            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
            <link rel="stylesheet" href="assets/css/login.css?= time();?>" />
            <style>
                /* Center the countdown and align text below */
                #countdown-container {
                    text-align: center;
                    margin-top: 50px;
                    display: none;
                    /* Sembunyikan elemen countdown */
                }

                #countdown {
                    font-size: 44px;
                    font-weight: bold;
                    font-family: Garamond;
                }

                #datetime {
                    font-size: 38px;
                    margin-top: 10px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    margin-bottom: 10px;
                }

                /* Tambahkan gaya untuk container waktu */
                .time-container {
                    text-align: center;
                    margin-bottom: 10px;
                }

                /* Tambahkan gaya untuk label waktu */
                .time-label {
                    font-size: 20px;
                    margin-bottom: 5px;
                    color: red;
                }

                .time-box {
                    background-color: #007bff;
                    color: #fff;
                    border-radius: 4px;
                    padding: 8px 12px;
                    margin: 0 5px;
                }

                .btn-back {
                    background-color: #007bff;
                    color: #fff;
                    border: none;
                    padding: 8px 12px;
                    border-radius: 4px;
                    text-decoration: none;
                    display: inline-block;
                }

                .btn-back:hover {
                    background-color: #0056b3;
                    color: #fff;
                }
            </style>
        </head>

        <body>
            <div id="countdown-container">
                <img src="../assets/img/clients/ppdbnew.png" alt="Logo" style="width: 100px; height: auto; margin-bottom: 10px;">
                <p id="countdown">Pendaftaran Ulang PPDB SDN 013 TPI Barat Dibuka Pada</p>
                <div id="datetime">
                    <div class="time-container">
                        <div class="time-label">Hari</div>
                        <div class="time-box" id="day-box"></div>
                    </div>
                    <div class="time-container">
                        <div class="time-label">Jam</div>
                        <div class="time-box" id="hour-box"></div>
                    </div>
                    <div class="time-container">
                        <div class="time-label">Menit</div>
                        <div class="time-box" id="minute-box"></div>
                    </div>
                    <div class="time-container">
                        <div class="time-label">Detik</div>
                        <div class="time-box" id="second-box"></div>
                    </div>
                </div>
                <?php if (!$countdownFinished) : ?>
                    <!-- Tombol "Back" untuk kembali ke halaman sebelumnya -->
                    <a href="javascript:history.go(-1);" class="btn-back" style="text-decoration: none;">
                        <i class="bi bi-arrow-left" style="font-size: 1.2em;"></i> Kembali
                    </a>
                <?php endif; ?>
            </div>

            <script>
                function updateCountdown(serverTime) {
                    var remainingTime = <?php echo $remainingTime; ?>;
                    var countdownElement = document.getElementById('countdown');
                    var dayBox = document.getElementById('day-box');
                    var hourBox = document.getElementById('hour-box');
                    var minuteBox = document.getElementById('minute-box');
                    var secondBox = document.getElementById('second-box');

                    var intervalId = setInterval(function() {
                        remainingTime = remainingTime - 1;

                        // Update kotak hari, jam, menit, dan detik
                        var days = Math.floor(remainingTime / 86400);
                        var hours = Math.floor((remainingTime % 86400) / 3600);
                        var minutes = Math.floor((remainingTime % 3600) / 60);
                        var seconds = remainingTime % 60;

                        dayBox.innerText = (days < 10 ? "0" : "") + days;
                        hourBox.innerText = (hours < 10 ? "0" : "") + hours;
                        minuteBox.innerText = (minutes < 10 ? "0" : "") + minutes;
                        secondBox.innerText = (seconds < 10 ? "0" : "") + seconds;

                        var countdown = remainingTime > 0 ? formatTime(remainingTime) : "00:00:00";

                        // Tampilkan countdown baru pada elemen dengan id "countdown"
                        countdownElement.innerHTML = 'Pendaftaran Ulang PPDB SDN 013 TPI Barat Dibuka Pada  <br>' + formatTimeYMD(serverTime + remainingTime * 1000);

                        // Hentikan countdown jika waktu habis
                        if (remainingTime <= 0) {
                            clearInterval(intervalId);
                            // Redirect ke halaman login setelah countdown selesai
                            window.location.href = "login.php";
                        }
                    }, 1000);
                }

                // Function to format time
                function formatTime(seconds) {
                    var hours = Math.floor(seconds / 3600);
                    var minutes = Math.floor((seconds % 3600) / 60);
                    var remainingSeconds = seconds % 60;

                    return (
                        (hours < 10 ? "0" : "") + hours + ":" +
                        (minutes < 10 ? "0" : "") + minutes + ":" +
                        (remainingSeconds < 10 ? "0" : "") + remainingSeconds
                    );
                }

                // Function to format date
                function formatTimeYMD(dateTime) {
                    var dateObject = new Date(dateTime);

                    // Array nama bulan untuk konversi
                    var monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

                    var day = ('0' + dateObject.getDate()).slice(-2);
                    var month = monthNames[dateObject.getMonth()];
                    var year = dateObject.getFullYear();

                    var formattedDate = '<span style="color: red; font-size:35px;">' + day + ' ' + month + ' ' + year + '</span>';
                    return formattedDate;
                }

                // Panggil fungsi untuk memulai countdown saat halaman dimuat
                window.onload = function() {
                    var serverTime = new Date(<?php echo json_encode(time() * 1000); ?>);
                    updateCountdown(serverTime);
                    // Tampilkan elemen countdown setelah JavaScript dijalankan
                    document.getElementById('countdown-container').style.display = 'block';
                };
            </script>
        </body>

        </html>
    <?php
    }
}
?>