<?php
if (isset($_SESSION['ses_id_login_siswa'])) {
    $id_login_siswa = $_SESSION['ses_id_login_siswa'];
    $koneksi = mysqli_connect("localhost", "root", "", "ppdb_sd13");

    if (!$koneksi) {
        die("Koneksi ke database gagal: " . mysqli_connect_error());
    }

    if (isset($_POST['Ubah'])) {
        $nama_ayah = mysqli_real_escape_string($koneksi, $_POST['nama_ayah']);
        $alamat_ayah = mysqli_real_escape_string($koneksi, $_POST['alamat_ayah']);
        $tgl_lahir_ayah = $_POST['tgl_lahir_ayah'];
        $tempat_lahir_ayah = mysqli_real_escape_string($koneksi, $_POST['tempat_lahir_ayah']);
        $no_hp_ayah = $_POST['no_hp_ayah'];
        $pekerjaan_ayah = mysqli_real_escape_string($koneksi, $_POST['pekerjaan_ayah']);
        $pend_terakhir_ayah = mysqli_real_escape_string($koneksi, $_POST['pend_terakhir_ayah']);

        // Memperbaiki query untuk mengambil id_ayah dari tabel biodata_siswa
        $sql_id_ayah = "SELECT biodata_ayah.id_ayah
                        FROM biodata_siswa
                        INNER JOIN biodata_ayah ON biodata_siswa.id_siswa = biodata_ayah.id_siswa
                        WHERE biodata_siswa.id_login_siswa = $id_login_siswa";

        $result_id_ayah = mysqli_query($koneksi, $sql_id_ayah);

        if ($result_id_ayah) {
            $row_id_ayah = mysqli_fetch_assoc($result_id_ayah);
            $id_ayah = $row_id_ayah['id_ayah'];

            // Memperbaiki query UPDATE untuk sesuai dengan id_ayah yang didapatkan
            $sql_ubah = "UPDATE biodata_ayah SET
                            nama_ayah='$nama_ayah',
                            alamat_ayah='$alamat_ayah',
                            tgl_lahir_ayah='$tgl_lahir_ayah',
                            tempat_lahir_ayah='$tempat_lahir_ayah',
                            no_hp_ayah='$no_hp_ayah',
                            pekerjaan_ayah='$pekerjaan_ayah',
                            pend_terakhir_ayah='$pend_terakhir_ayah'
                        WHERE id_ayah='$id_ayah'";

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
                            window.location = 'data.php?page=data-ayah';
                        }
                    });
                </script>";
            } else {
                echo "<script>
                    Swal.fire({
                        title: 'Ubah Data Gagal',
                        text: '" . mysqli_error($koneksi) . "',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.value) {
                            window.location = 'data.php?page=edit-ayah';
                        }
                    });
                </script>";
            }
        } else {
            die("Error dalam pengambilan data: " . mysqli_error($koneksi));
        }
    }

    $sql = $koneksi->query("SELECT biodata_siswa.*, biodata_ayah.*
        FROM biodata_siswa
        INNER JOIN biodata_ayah ON biodata_siswa.id_siswa = biodata_ayah.id_siswa
        WHERE biodata_siswa.id_login_siswa = $id_login_siswa");

    if ($sql) {
        $data_cek = $sql->fetch_assoc();
    } else {
        die("Error dalam pengambilan data: " . mysqli_error($koneksi));
    }
}
?>

<!-- Rest of your HTML form remains unchanged -->
<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i>Ubah Data Ayah</span></h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Ayah</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nama_ayah" name="nama_ayah" value="<?php echo $data_cek['nama_ayah']; ?>"/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tempat Lahir</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="tempat_lahir_ayah" name="tempat_lahir_ayah" value="<?php echo $data_cek['tempat_lahir_ayah']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Lahir</label>
				<div class="col-sm-5">
					<input type="date" class="form-control" id="tgl_lahir_ayah" name="tgl_lahir_ayah" value="<?php echo $data_cek['tgl_lahir_ayah']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="alamat_ayah" name="alamat_ayah" value="<?php echo $data_cek['alamat_ayah']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No Hp</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="no_hp_ayah" name="no_hp_ayah" value="<?php echo $data_cek['no_hp_ayah']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pekerjaan Ayah</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" value="<?php echo $data_cek['pekerjaan_ayah']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pendidikan Terakhir</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="pend_terakhir_ayah" name="pend_terakhir_ayah" value="<?php echo $data_cek['pend_terakhir_ayah']; ?>"
					/>
				</div>
			</div>

		</div>

		<div align="center" class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-ayah" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>