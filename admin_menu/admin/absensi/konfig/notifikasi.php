<?php
session_start();
if(isset($_SESSION['page'])){

include 'connection.php';
$sql = mysqli_query($dbconnect,"SELECT * FROM tb_id WHERE notifikasi='1'");
$cek = mysqli_num_rows($sql);
    if($cek > 0){
    echo $cek." UID baru ditambahkan";
    }else{
    echo "0";
    }

}else{
    header("location: ../index.php?page=dashboard&error=true");
}
?>
