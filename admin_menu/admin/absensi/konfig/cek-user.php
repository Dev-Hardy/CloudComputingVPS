<?php
session_start();
include 'connection.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = mysqli_real_escape_string($dbconnect, $_POST['username']);
    $password = mysqli_real_escape_string($dbconnect, $_POST['password']);

    $sql = mysqli_query($dbconnect, "SELECT * FROM tb_pengguna WHERE username='$username'");
    $user = mysqli_fetch_assoc($sql);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['page'] = 'dashboard';
        $_SESSION['username'] = $username;
        $_SESSION['level'] = $user['level']; // Tambahkan ini untuk menyimpan level pengguna
        header("location: ../index.php?page=dashboard");
    } else {
        header("location: ../login.php?error=true");
    }
} else {
    header("location: ../login.php?error=true");
}
?>
