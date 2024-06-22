<?php
include 'function.php';

if(isset($_POST['status']) && isset($_POST['id']) ){
	
	$status = mysqli_real_escape_string($dbconnect, $_POST['status']);
	$tag = mysqli_real_escape_string($dbconnect, $_POST['id']);
	

	if($status ==  "cek_admin" && $tag == $admin_uid ){
		echo "Xx23er4tXWhz"; //Administrator OK
	}
	else if ($status == "Xx23er4tXWhz" && $tag != ""){
		$sql = mysqli_query($dbconnect,"INSERT INTO tb_id VALUES ('$tag','','','1','','','')");
		if($sql){
			echo 'ID ditambahkan';
		}else{
			echo 'UID Tersedia';
		}
	}
	else{
		echo '1';
	}
	

}else{
	echo 'Coba Lagi';
}
mysqli_close($dbconnect);
?>