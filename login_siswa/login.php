<?php
include('../connect/connection.php');

if (isset($_POST["login"])) {
    $nik = mysqli_real_escape_string($connect, trim($_POST['nik']));
    $password = trim($_POST['password']);

    $sql = mysqli_query($connect, "SELECT * FROM login_siswa where nik = '$nik'");
    $count = mysqli_num_rows($sql);

    if ($count > 0) {
      $fetch = mysqli_fetch_assoc($sql);
      $hashpassword = $fetch["password"];
  
      if ($fetch["status"] == 0) {
          ?>
          <script>
              alert("Harap Verifikasi Akun Email Sebelum Login.");
          </script>
          <?php
      } else if (password_verify($password, $hashpassword)) {
          session_start();
          $_SESSION["ses_id_login_siswa"] = $fetch["id_login_siswa"];
          $_SESSION["ses_email"] = $fetch["email"];
          $_SESSION["ses_nama_pendek"] = $fetch["nama_pendek"];
          $_SESSION["ses_nik"] = $fetch["nik"];
          $_SESSION["ses_password"] = $fetch["password"];
          $_SESSION["ses_status"] = $fetch["status"];
          ?>
          <script>
              alert("Login Berhasil! Anda akan dialihkan ke halaman utama.");
              window.location.href = "/included_all/siswa_menu/data.php";
          </script>
          <?php
      } else {
          ?>
          <script>
              alert("NIK Atau Kata Sandi Tidak Valid, Silakan Coba Lagi.");
          </script>
          <?php
      }
  } else {
      ?>
      <script>
          alert("Anda belum terdaftar. Silakan registrasi.");
      </script>
      <?php
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicons -->
    <link href="../assets/img/clients/Tutwurihandayani.png" rel="icon">
    <link href="../assets/img/clients/Tutwurihandayani.png" rel="apple-touch-icon">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <link rel="stylesheet" href="../assets/css/login.css?= time();?>" />
    <title>Login | SIDIKAT</title>
  </head>
  <body>
    <!----------------------- Main Container -------------------------->

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
              <h2 align="center"><strong>Dashboard Login|</strong>PPDB 2024</h2>
              <p align="center">Segera daftarkan putra dan putri anda di SD Negeri 013 Tanjungpinang Barat!</p>
            </div>
            <div class="card-body">
              <form action="#" method="POST" name="login">
              <div class="input-group mb-3">
                <input type="text" name="nik" required class="form-control form-control-lg bg-light fs-6" placeholder="NIK Siswa" />
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
              <div class="input-group mb-5 d-flex justify-content-between">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="formCheck" />
                  <label for="formCheck" class="form-check-label text-secondary"><small>Ingat Saya</small></label>
                </div>
                <div class="forgot">
                  <small><a href="resetpw.php">Dapatkan Password?</a></small>
                </div>
              </div>
              <div class="input-group mb-3">
                <button class="btn btn-lg btn-primary w-100 fs-6" name="login">Login</button>
              </div>
              <div class="row">
                <small>Belum punya akun? <a href="registrasi.php">Daftar akun</a></small>
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
  </body>
</html>
