<?php
$sql_cek = "SELECT * FROM countdown_login";
$query_cek = mysqli_query($koneksi, $sql_cek);
$data_cek = mysqli_fetch_array($query_cek, MYSQLI_ASSOC);

$target_datetime = isset($_POST['target_datetime']) ? $_POST['target_datetime'] : '';
$status = isset($_POST['status']) ? $_POST['status'] : '';

?>

<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Ubah Setting PPDB
        </h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Pembukaan PPDB</label>
                <div class="col-sm-5">
                    <input type="datetime-local" class="form-control" id="target_datetime" name="target_datetime" value="<?php echo date('Y-m-d\TH:i', strtotime($data_cek['target_datetime'])); ?>" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-5">
                    <select class="form-control" id="status" name="status">
                        <option value="Aktif" <?php if ($data_cek['status'] == 'Aktif') echo 'selected'; ?>>Aktif</option>
                        <option value="NonAktif" <?php if ($data_cek['status'] == 'NonAktif') echo 'selected'; ?>>Tidak Aktif</option>
                    </select>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
        </div>
    </form>
</div>

<?php
if (isset($_POST['Ubah'])) {
    $sql_ubah = "UPDATE countdown_login SET
                        target_datetime='$target_datetime',
                        status='$status'";

    $query_ubah = mysqli_query($koneksi, $sql_ubah);

    if ($query_ubah) {
        echo "<script>
                Swal.fire({title: 'Ubah Data Berhasil', text: '', icon: 'success', confirmButtonText: 'OK'
                }).then((result) => {
                        if (result.value) {
                                window.location = 'data.php?page=data-setting-ppdb';
                        }
                })</script>";
    } else {
        echo "<script>
                Swal.fire({title: 'Ubah Data Gagal', text: '', icon: 'error', confirmButtonText: 'OK'
                }).then((result) => {
                        if (result.value) {
                                window.location = 'data.php?page=data-setting-ppdb';
                        }
                })</script>";
    }
}
?>
