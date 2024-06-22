<?php
session_start();
$error = "true";

if(isset($_SESSION['page'])) {
    if(isset($_POST['no'], $_POST['username'], $_POST['role'])) { // Jika password tidak wajib diisi
        include 'connection.php'; // Memisahkan file koneksi

        // Escape input untuk menghindari SQL Injection
        $no = mysqli_real_escape_string($dbconnect, $_POST['no']);
        $username = mysqli_real_escape_string($dbconnect, $_POST['username']);
        $role = mysqli_real_escape_string($dbconnect, $_POST['role']);

        // Persiapkan query untuk mengubah username dan role
        $update_query = "UPDATE tb_pengguna SET username='$username', level='$role' WHERE no='$no'";

        // Cek apakah password diisi atau tidak
        if (!empty($_POST['password'])) { // Jika password diisi
            $password = mysqli_real_escape_string($dbconnect, $_POST['password']);

            // Hash the password before updating it in the database
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Tambahkan password ke dalam query update
            $update_query = "UPDATE tb_pengguna SET username='$username', password='$hashed_password', level='$role' WHERE no='$no'";
        }

        // Update data pengguna
        $sql = mysqli_query($dbconnect, $update_query);

        if($sql) {
            $error = "false";
        } else {
            $error_message = "Gagal mengupdate data pengguna. Silakan coba lagi.";
        }
    } else {
        $error_message = "Data yang dikirimkan tidak lengkap.";
    }
} else {
    $error_message = "Akses ditolak. Harap login terlebih dahulu.";
}

// Redirect dengan pesan kesalahan
header("location:../index.php?page=pengguna&error=".$error."&message=".$error_message);
?>