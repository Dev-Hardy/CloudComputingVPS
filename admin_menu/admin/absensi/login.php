<?php
session_start();
if(isset($_SESSION['page'])) {
  header("location: index.php?page=dashboard&error=true");
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Presensi SDN 013 Tanjungpinang Barat</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Favicons -->
  <link href="vendor/img/Tutwurihandayani.png" rel="icon">
  <link href="vendor/img/Tutwurihandayani.png" rel="apple-touch-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="vendor/css/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="vendor/css/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vendor/css/admin-lte/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Custom CSS -->
  <style>
    .error-alert {
      display: none;
    }
  </style>
</head>
<body class="hold-transition login-page" style="background-image: url('vendor/img/login_bg.jpg'); background-position: center;
  background-repeat: no-repeat; background-size: cover; ">
<div class="login-box">
  <div class="card">
    <div class="card-header mt-3">
      <div class="login-logo">
        <img src="vendor/img/sidikatbiru.png" height="95" width="185">
      </div>
    </div>
    <div class="card-body login-card-body">
      <p class="login-box-msg">Masuk untuk mengolah presensi</p>

      <form action="konfig/cek-user.php" method="post">
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <?php
          if(isset($_GET['error']) && $_GET['error'] == 'true') {
            echo "<div class='alert alert-danger error-alert' role='alert'>Username atau Password anda salah. Silakan coba lagi!</div>";
          }
        ?>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-info btn-block">Masuk</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- jQuery -->
<script src="vendor/js/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="vendor/js/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="vendor/js/admin-lte/adminlte.min.js"></script>
<!-- Custom Script -->
<script>
  // Show error alert if there's an error
  $(document).ready(function(){
    $(".error-alert").slideDown();
  });
</script>
</body>
</html>
