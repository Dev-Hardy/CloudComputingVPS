<?php
if (isset($_GET['kode'])) {
    $sql_cek = "SELECT * FROM login_siswa WHERE id_login_siswa='" . $_GET['kode'] . "'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}

$nik = isset($_POST['nik']) ? mysqli_real_escape_string($koneksi, $_POST['nik']) : '';
$nama_pendek = isset($_POST['nama_pendek']) ? mysqli_real_escape_string($koneksi, $_POST['nama_pendek']) : '';
$email = isset($_POST['email']) ? mysqli_real_escape_string($koneksi, $_POST['email']) : '';
$password = isset($_POST['password']) ? mysqli_real_escape_string($koneksi, $_POST['password']) : '';

?>

<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Ubah Data Akun PPDB
        </h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">NIK</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="nik" name="nik" value="<?php echo $data_cek['nik']; ?>" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Pendek</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="nama_pendek" name="nama_pendek" value="<?php echo $data_cek['nama_pendek']; ?>" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $data_cek['email']; ?>" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-5">
                    <input type="password" class="form-control" id="password" name="password"/>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
            <a href="?page=data-akun-ppdb" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<?php
if (isset($_POST['Ubah'])) {
    $sql_ubah = "UPDATE login_siswa SET
                        nik='$nik',
                        nama_pendek='$nama_pendek',
                        email='$email',
                        password='$password'
                    WHERE id_login_siswa='" . $_GET['kode'] . "'";

    $query_ubah = mysqli_query($koneksi, $sql_ubah);

    if ($query_ubah) {
        echo "<script>
                Swal.fire({title: 'Ubah Data Berhasil', text: '', icon: 'success', confirmButtonText: 'OK'
                }).then((result) => {
                        if (result.value) {
                                window.location = 'data.php?page=data-akun-ppdb';
                        }
                })</script>";
    } else {
        echo "<script>
                Swal.fire({title: 'Ubah Data Gagal', text: '', icon: 'error', confirmButtonText: 'OK'
                }).then((result) => {
                        if (result.value) {
                                window.location = 'data.php?page=data-akun-ppdb';
                        }
                })</script>";
    }
}
?>