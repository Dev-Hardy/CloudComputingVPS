<?php session_start() ?>
<?php 
    if(isset($_POST["recover"])){
        include('../connect/connection.php');
        $email = $_POST["email"];

        $sql = mysqli_query($connect, "SELECT * FROM login_siswa WHERE email='$email'");
        $query = mysqli_num_rows($sql);
  	    $fetch = mysqli_fetch_assoc($sql);

        if(mysqli_num_rows($sql) <= 0){
            ?>
            <script>
                alert("<?php  echo "Maaf, Email Anda Tidak Terdaftar "?>");
            </script>
            <?php
        }else if($fetch["status"] == 0){
            ?>
               <script>
                   alert("Maaf, akun anda belum ter-verifikasi, Anda tidak dapat memulihkan kata sandi untuk saat ini");
                   window.location.replace("login.php");
               </script>
           <?php
        }else{
            // generate token by binaryhexa 
            $token = bin2hex(random_bytes(50));

            //session_start ();
            $_SESSION['token'] = $token;
            $_SESSION['email'] = $email;

            require "../Mail/phpmailer/PHPMailerAutoload.php";
            $mail = new PHPMailer;

            $mail->isSMTP();
            $mail->Host='smtp.gmail.com';
            $mail->Port=587;
            $mail->SMTPAuth=true;
            $mail->SMTPSecure='tls';

            // h-hotel account
            $mail->Username='013sdntanjungpinangbarat@gmail.com';
            $mail->Password='abzrczsogizfdwtc';

            // send by h-hotel email
            $mail->setFrom('013sdntanjungpinangbarat@gmail.com', 'Password Baru');
            // get email from input
            $mail->addAddress($_POST["email"]);
            //$mail->addReplyTo('lamkaizhe16@gmail.com');

            // HTML body
            $mail->isHTML(true);
            $mail->Subject="Perbarui Password Anda";
            $mail->Body="<b>Hai Pengguna PPDB SD Negeri 013 Tanjungpinang Barat</b>
            <h3>Kami menerima permintaan untuk mengatur ulang kata sandi Anda.</h3>
            <p>Silakan klik tautan di bawah ini untuk mengatur ulang kata sandi Anda:</p>
            http://localhost/included_all/login_siswa/changepass.php
            <br><br>";

            if(!$mail->send()){
                ?>
                    <script>
                        alert("<?php echo " Email tidak valid "?>");
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        window.location.replace("infopw.html");
                    </script>
                <?php
            }
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
    <title>Password | SIDIKAT</title>
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
              <h2 align="center"><strong>Dashboard Ganti Password|</strong>PPDB 2024</h2>
              <p align="center">Segera daftarkan putra dan putri anda di SD Negeri 013 Tanjungpinang Barat!</p>
            </div>
            <div class="card-body">
              <form action="#" method="POST" name="recover_psw">
                <div class="input-group mb-3">
                <input type="text" class="form-control form-control-lg bg-light fs-6" name="email" required placeholder="Masukkan Email" />
                </div>
                <div class="input-group mb-5 d-flex justify-content-between"></div>
                <div class="input-group mb-3">
                  <button class="btn btn-lg btn-primary w-100 fs-6" name="recover">Kirim</button>
                </div>
                <div class="row">
                  <small>Sudah Punya akun? <a href="login_siswa.php">Login</a></small>
                </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
