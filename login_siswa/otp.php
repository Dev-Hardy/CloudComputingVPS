<?php session_start() ?>
<?php 
    include('../connect/connection.php');
    if(isset($_POST["verify"])){
        $otp = $_SESSION['otp'];
        $email = $_SESSION['mail'];
        $otp_code = $_POST['otp_code'];

        if($otp != $otp_code){
            ?>
           <script>
               alert("Kode OTP Tidak Valid");
           </script>
           <?php
        }else{
            mysqli_query($connect, "UPDATE login_siswa SET status = 1 WHERE email = '$email'");
            ?>
             <script>
                 alert("Verifikasi Akun Selesai, Anda Dapat Masuk Sekarang");
                   window.location.replace("login.php");
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
    <title>OTP | SIDIKAT</title>
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
              <h2 align="center"><strong>Dashboard Kode OTP|</strong>PPDB 2024</h2>
              <p align="center">Segera daftarkan putra dan putri anda di SD Negeri 013 Tanjungpinang Barat!</p>
            </div>
            <div class="card-body">
              <form action="#" method="POST">
                <div class="input-group mb-3">
                <input type="text" class="form-control form-control-lg bg-light fs-6" name="otp_code" required autofocus  placeholder="Masukkan Kode OTP" />
                </div>
                <div class="input-group mb-5 d-flex justify-content-between"></div>
                <div class="input-group mb-3">
                  <button class="btn btn-lg btn-primary w-100 fs-6" name="verify">Kirim</button>
                </div>
                </div> <div class="row">
                  <small>Belum punya akun? <a href="registrasi.php">Login</a></small>
                </div>
              </form>
            </div>
            

          </div>
        </div>
      </div>
    </div>
  </body>
</html>
