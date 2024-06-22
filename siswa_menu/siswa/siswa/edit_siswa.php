<?php
if (isset($_SESSION['ses_id_login_siswa'])) {
	// Ambil ID login siswa dari sesi
	$id_login_siswa = $_SESSION['ses_id_login_siswa'];

	// Lakukan koneksi ke database dan pastikan koneksi disetel dengan benar
	$koneksi = mysqli_connect("localhost", "root", "", "ppdb_sd13");

	if (!$koneksi) {
		die("Koneksi ke database gagal: " . mysqli_connect_error());
	}

	// Query untuk mengambil data siswa berdasarkan ID login siswa yang sudah login
	$sql = $koneksi->query("SELECT * FROM biodata_siswa
        INNER JOIN login_siswa ON biodata_siswa.id_login_siswa = login_siswa.id_login_siswa
        WHERE biodata_siswa.id_login_siswa = $id_login_siswa");

	if ($sql) {
		$data_cek = $sql->fetch_assoc(); // Ambil data dari hasil kueri
	} else {
		die("Error dalam pengambilan data: " . mysqli_error($koneksi));
	}
}
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i>Ubah Data Siswa
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIK</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nik" name="nik" value="<?php echo $data_cek['nik']; ?>" readonly />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Siswa</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="<?php echo $data_cek['nama_siswa']; ?>" />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tempat Lahir</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="tempat_lahir_siswa" name="tempat_lahir_siswa" value="<?php echo $data_cek['tempat_lahir_siswa']; ?>" />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Lahir</label>
				<div class="col-sm-5">
					<input type="date" class="form-control" id="tgl_lahir_siswa" name="tgl_lahir_siswa" value="<?php echo $data_cek['tgl_lahir_siswa']; ?>" />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="alamat_siswa" name="alamat_siswa" value="<?php echo $data_cek['alamat_siswa']; ?>" />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-4">
					<select name="jk_siswa" id="jk_siswa" class="form-control">
						<option value="">-- Pilih --</option>
						<?php
						//cek data yg dipilih sebelumnya
						if ($data_cek['jk_siswa'] == "Laki-Laki") echo "<option value='Laki-Laki' selected>Laki-Laki</option>";
						else echo "<option value='Laki-Laki'>Laki-Laki</option>";

						if ($data_cek['jk_siswa'] == "Perempuan") echo "<option value='Perempuan' selected>Perempuan</option>";
						else echo "<option value='Perempuan'>Perempuan</option>";
						?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Agama</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="agama_siswa" name="agama_siswa" value="<?php echo $data_cek['agama_siswa']; ?>" />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Anak Ke-</label>
				<div class="col-sm-1">
					<input type="number" class="form-control" id="anak_ke" name="anak_ke" value="<?php echo $data_cek['anak_ke']; ?>" />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jumlah Saudara</label>
				<div class="col-sm-1">
					<input type="number" class="form-control" id="jumlah_saudara" name="jumlah_saudara" value="<?php echo $data_cek['jumlah_saudara']; ?>" />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Status</label>
				<div class="col-sm-4">
					<select name="status_keluarga" id="status_keluarga" class="form-control">
						<option value="">-- Pilih --</option>
						<?php
						//cek data yg dipilih sebelumnya
						if ($data_cek['status_keluarga'] == "Anak Kandung") echo "<option value='Anak Kandung' selected>Anak Kandung</option>";
						else echo "<option value='Anak Kandung'>Anak Kandung</option>";

						if ($data_cek['status_keluarga'] == "Anak Angkat") echo "<option value='Anak Angkat' selected>Anak Angkat</option>";
						else echo "<option value='Anak Angkat'>Anak Angkat</option>";

						if ($data_cek['status_keluarga'] == "Lainnya") echo "<option value='Lainnya' selected>Lainnya</option>";
						else echo "<option value='Lainnya'>Lainnya</option>";
						?>
					</select>
				</div>
			</div>

		</div>

		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-siswa" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php
// Periksa apakah pengguna sudah login
if (isset($_SESSION['ses_id_login_siswa'])) {
    $id_login_siswa = $_SESSION['ses_id_login_siswa'];
    $koneksi = mysqli_connect("localhost", "root", "", "ppdb_sd13");

    if (!$koneksi) {
        die("Koneksi ke database gagal: " . mysqli_connect_error());
    }

    if (isset($_POST['Ubah'])) {
        // Perbarui data siswa berdasarkan id_login_siswa
        $nama_siswa = mysqli_real_escape_string($koneksi, $_POST['nama_siswa']);
        $alamat_siswa = mysqli_real_escape_string($koneksi, $_POST['alamat_siswa']);
        $tgl_lahir_siswa = $_POST['tgl_lahir_siswa'];
        $status_keluarga = $_POST['status_keluarga'];
        $tempat_lahir_siswa = mysqli_real_escape_string($koneksi, $_POST['tempat_lahir_siswa']);
        $jk_siswa = $_POST['jk_siswa'];
        $agama_siswa = $_POST['agama_siswa'];
        $anak_ke = $_POST['anak_ke'];
        $jumlah_saudara = $_POST['jumlah_saudara'];

        $sql_ubah = "UPDATE biodata_siswa SET
                        nama_siswa='$nama_siswa',
                        alamat_siswa='$alamat_siswa',
                        tgl_lahir_siswa='$tgl_lahir_siswa',
                        status_keluarga='$status_keluarga',
                        tempat_lahir_siswa='$tempat_lahir_siswa',
                        jk_siswa='$jk_siswa',
                        agama_siswa='$agama_siswa',
                        anak_ke='$anak_ke',
                        jumlah_saudara='$jumlah_saudara'
                    WHERE id_login_siswa='$id_login_siswa'";

        $query_ubah = mysqli_query($koneksi, $sql_ubah);

        if ($query_ubah) {
            echo "<script>
                Swal.fire({
                    title: 'Ubah Data Berhasil',
                    text: '',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'data.php?page=data-siswa';
                    }
                });
            </script>";
        } else {
            echo "<script>
                Swal.fire({
                    title: 'Ubah Data Gagal',
                    text: '',
                    icon: 'error',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'data.php?page=edit-siswa';
                    }
                });
            </script>";
        }
    }

    // Ambil data siswa dari database untuk ditampilkan dalam formulir
    $sql = $koneksi->query("SELECT * FROM biodata_siswa WHERE id_login_siswa = $id_login_siswa");

    if ($sql) {
        $data_cek = $sql->fetch_assoc();
    } else {
        die("Error dalam pengambilan data: " . mysqli_error($koneksi));
    }
}
?>