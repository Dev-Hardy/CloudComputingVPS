<?php

if (isset($_GET['kode'])) {
    $sql_cek = "SELECT * FROM login_admin WHERE id_pengguna='" . $_GET['kode'] . "'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>

<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Ubah Data
        </h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">

            <input type='hidden' class="form-control" name="id_pengguna" value="<?php echo $data_cek['id_pengguna']; ?>" readonly />

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama User</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" value="<?php echo $data_cek['nama_pengguna']; ?>" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $data_cek['username']; ?>" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Level</label>
                <div class="col-sm-4">
                    <select name="level" id="level" class="form-control">
                        <option value="">-- Pilih Level --</option>
                        <option value="Administrator" <?php echo ($data_cek['level'] == "Administrator") ? "selected" : ""; ?>>Administrator</option>
                        <option value="Guru" <?php echo ($data_cek['level'] == "Guru") ? "selected" : ""; ?>>Guru</option>
                    </select>

                </div>
            </div>

        </div>
        <div class="card-footer">
            <input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
            <a href="?page=data-pengguna" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>


<?php
// ...
if (isset($_POST['Ubah'])) {
    $id_pengguna = $_POST['id_pengguna'];
    $nama_pengguna = $_POST['nama_pengguna'];
    $username = $_POST['username'];
    $level = $_POST['level'];

    $sql_ubah = "UPDATE login_admin SET
        nama_pengguna='$nama_pengguna',
        username='$username',
        level='$level'
        WHERE id_pengguna='$id_pengguna'";

    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
            Swal.fire({
                title: 'Ubah Data Berhasil',
                text: '',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'data.php?page=data-pengguna';
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
                    window.location = 'data.php?page=data-pengguna';
                }
            });
        </script>";
    }
}
?>