<?php
session_start();
if(isset($_SESSION['page'])) {

    if(isset($_GET['id'])) {
        include 'connection.php';
        $uid = $_GET['id'];

        // Start a transaction
        mysqli_begin_transaction($dbconnect);

        try {
            // Delete from tb_id
            $sql = mysqli_query($dbconnect, "DELETE FROM tb_id WHERE id='$uid'");
            if (!$sql) {
                throw new Exception('Failed to delete from tb_id: ' . mysqli_error($dbconnect));
            }

            // Delete from tb_absen_masuk
            $del_absen_masuk = mysqli_query($dbconnect, "DELETE FROM tb_absen_masuk WHERE id='$uid'");
            if (!$del_absen_masuk) {
                throw new Exception('Failed to delete from tb_absen_masuk: ' . mysqli_error($dbconnect));
            }

            // Delete from tb_absen_keluar
            $del_absen_keluar = mysqli_query($dbconnect, "DELETE FROM tb_absen_keluar WHERE id='$uid'");
            if (!$del_absen_keluar) {
                throw new Exception('Failed to delete from tb_absen_keluar: ' . mysqli_error($dbconnect));
            }

            // Commit the transaction
            mysqli_commit($dbconnect);

            header("location: ../index.php?page=pendaftaran&error=false");
        } catch (Exception $e) {
            // Rollback the transaction on error
            mysqli_rollback($dbconnect);
            header("location: ../index.php?page=pendaftaran&error=true&message=" . urlencode($e->getMessage()));
        }
    } else {
        header("location: ../index.php?page=pendaftaran&error=true");
    }
} else {
    header("location: ../index.php?page=dashboard&error=true");
}
?>