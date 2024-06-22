<?php
if (isset($_GET['kode'])) {
    $sql_cek = "SELECT * FROM e_learning WHERE id_learning='" . $_GET['kode'] . "'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}

$judul_konten = isset($_POST['judul_konten']) ? mysqli_real_escape_string($koneksi, $_POST['judul_konten']) : '';
$link_yt = isset($_POST['link_yt']) ? mysqli_real_escape_string($koneksi, $_POST['link_yt']) : '';
$materi = isset($_POST['materi']) ? mysqli_real_escape_string($koneksi, $_POST['materi']) : $data_cek['materi'];

if (isset($_POST['Ubah'])) {
    // Jika ada file baru yang diunggah
    if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $file_name = $_FILES['file']['name'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_destination = 'file_materi/' . $file_name;

        // Hapus file PDF lama jika ada
        $old_file = $data_cek['file'];
        if (file_exists($old_file)) {
            unlink($old_file);
        }

        // Pindahkan file yang diunggah
        if (move_uploaded_file($file_tmp, $file_destination)) {
            // Update database dengan file baru
            $sql_ubah = "UPDATE e_learning SET
                            judul_konten='$judul_konten',
                            link_yt='$link_yt',
                            materi='$materi',
                            file='$file_destination'
                        WHERE id_learning='" . $_GET['kode'] . "'";

            $query_ubah = mysqli_query($koneksi, $sql_ubah);

            if ($query_ubah) {
                echo "<script>
                        Swal.fire({title: 'Ubah Data Berhasil', text: '', icon: 'success', confirmButtonText: 'OK'
                        }).then((result) => {
                                if (result.value) {
                                        window.location = 'data.php?page=materi-pembelajaran-umum';
                                }
                        })</script>";
            } else {
                echo "<script>
                        Swal.fire({title: 'Ubah Data Gagal', text: '', icon: 'error', confirmButtonText: 'OK'
                        }).then((result) => {
                                if (result.value) {
                                        window.location = 'data.php?page=materi-pembelajaran-umum';
                                }
                        })</script>";
            }
        } else {
            echo "<script>
                    Swal.fire({title: 'Unggah File Gagal', text: '', icon: 'error', confirmButtonText: 'OK'
                    }).then((result) => {
                            if (result.value) {
                                    window.location = 'data.php?page=materi-pembelajaran-umum';
                            }
                    })</script>";
        }
    } else {
        // Jika tidak ada file yang diunggah, update data tanpa file
        $sql_ubah = "UPDATE e_learning SET
                        judul_konten='$judul_konten',
                        link_yt='$link_yt',
                        materi='$materi'
                    WHERE id_learning='" . $_GET['kode'] . "'";

        $query_ubah = mysqli_query($koneksi, $sql_ubah);

        if ($query_ubah) {
            echo "<script>
                    Swal.fire({title: 'Ubah Data Berhasil', text: '', icon: 'success', confirmButtonText: 'OK'
                    }).then((result) => {
                            if (result.value) {
                                    window.location = 'data.php?page=materi-pembelajaran-umum';
                            }
                    })</script>";
        } else {
            echo "<script>
                    Swal.fire({title: 'Ubah Data Gagal', text: '', icon: 'error', confirmButtonText: 'OK'
                    }).then((result) => {
                            if (result.value) {
                                    window.location = 'data.php?page=materi-pembelajaran-umum';
                            }
                    })</script>";
        }
    }
}
?>

<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Ubah Materi Pembelajaran - Muatan Pengetahuan Umum
        </h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Judul Materi</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="judul_konten" name="judul_konten" value="<?php echo $data_cek['judul_konten']; ?>" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Link Materi</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="link_yt" name="link_yt" value="<?php echo $data_cek['link_yt']; ?>" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">File</label>
                <div class="col-sm-5">
                    <input type="file" class="form-control" id="file" name="file" accept=".pdf" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jenis Materi</label>
                <div class="col-sm-5">
                    <select class="form-control" name="materi">
                        <option value="agama" <?php if ($materi == 'agama') echo 'selected'; ?>>Agama</option>
                        <option value="bahasa_indonesia" <?php if ($materi == 'bahasa_indonesia') echo 'selected'; ?>>Bahasa Indonesia</option>
                        <option value="ipa" <?php if ($materi == 'ipa') echo 'selected'; ?>>IPA</option>
                        <option value="ips" <?php if ($materi == 'ips') echo 'selected'; ?>>IPS</option>
                        <option value="pkn" <?php if ($materi == 'pkn') echo 'selected'; ?>>PKN</option>
                        <option value="pjok" <?php if ($materi == 'pjok') echo 'selected'; ?>>PJOK</option>
                        <option value="seni_budaya" <?php if ($materi == 'seni_budaya') echo 'selected'; ?>>Seni Budaya</option>
                        <option value="mtk" <?php if ($materi == 'mtk') echo 'selected'; ?>>Matematika</option>
                    </select>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
            <a href="?page=materi-pembelajaran-umum" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>