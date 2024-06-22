<?php session_start() ;
?>
<?php
    if(isset($_POST["reset"])){
        include('../connect/connection.php');
        $psw = $_POST["password"];

        $token = $_SESSION['token'];
        $Email = $_SESSION['email'];

        $hash = password_hash( $psw , PASSWORD_DEFAULT );

        $sql = mysqli_query($connect, "SELECT * FROM login_siswa WHERE email='$Email'");
        $query = mysqli_num_rows($sql);
  	    $fetch = mysqli_fetch_assoc($sql);

        if($Email){
            $new_pass = $hash;
            mysqli_query($connect, "UPDATE login_siswa SET password='$new_pass' WHERE email='$Email'");
            ?>
            <script>
                window.location.replace("login.php");
                alert("<?php echo "Kata Sandi Anda Telah Berhasil di Ubah"?>");
            </script>
            <?php
        }else{
            ?>
            <script>
                alert("<?php echo "Silakan Coba Lagi"?>");
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
    <title>Password Baru | SIDIKAT</title>
  </head>
  <body>
    <!----------------------- Main Container -------------------------->

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
      <!----------------------- Login Container -------------------------->

      <div class="row border rounded-5 p-3 bg-white shadow box-area">
        <!--------------------------- Left Box ----------------------------->

        <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #103cbe">
          <div class="featured-image mb-3">
            <img src="../assets/img/clients/logoputih.png" class="img-fluid" style="width: 250px" />
          </div>
          <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600">Segera Daftar</p>
          <small class="text-white text-wrap text-center" style="width: 17rem; font-family: 'Courier New', Courier, monospace">Masuk dan input berkas yang di perlukan.</small>
        </div>

        <!-------------------- ------ Right Box ---------------------------->

        <div class="col-md-6 right-box">
          <div class="row align-items-center">
            <div class="header-text mb-4">
              <h2 align="center"><strong>Dashboard Password Baru|</strong>PPDB 2024</h2>
              <p align="center">Segera daftarkan putra dan putri anda di SD Negeri 013 Tanjungpinang Barat!</p>
            </div>
            <div class="card-body">
              <form action="#" method="POST" name="login">
                <!-- Password input with custom eye icon -->
              <div class="input-group mb-1">
                  <input type="password" class="form-control form-control-lg bg-light fs-6" name="password" id="password" required pattern=".{6,}" title="Password Harus 6 Karakter" placeholder="Password" />
                    <div class="input-group-append">
                       <span class="input-group-text">
                          <img src="eye-icon.png" alt="Toggle Password" id="eye-icon" style="width: 20px; height: 30px;">
                        </span>
                     </div>
                </div>
                <div class="input-group mb-5 d-flex justify-content-between"></div>
                <div class="input-group mb-3">
                  <button class="btn btn-lg btn-primary w-100 fs-6" name="reset">Kirim</button>
                </div>
                <div class="row">
                  <small>Sudah punya akun? <a href="login_siswa.php">Login</a></small>
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
