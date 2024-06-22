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
                                        window.location = 'data.php?page=materi-pembelajaran-lokal';
                                }
                        })</script>";
            } else {
                echo "<script>
                        Swal.fire({title: 'Ubah Data Gagal', text: '', icon: 'error', confirmButtonText: 'OK'
                        }).then((result) => {
                                if (result.value) {
                                        window.location = 'data.php?page=materi-pembelajaran-lokal';
                                }
                        })</script>";
            }
        } else {
            echo "<script>
                    Swal.fire({title: 'Unggah File Gagal', text: '', icon: 'error', confirmButtonText: 'OK'
                    }).then((result) => {
                            if (result.value) {
                                    window.location = 'data.php?page=materi-pembelajaran-lokal';
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
                                    window.location = 'data.php?page=materi-pembelajaran-lokal';
                            }
                    })</script>";
        } else {
            echo "<script>
                    Swal.fire({title: 'Ubah Data Gagal', text: '', icon: 'error', confirmButtonText: 'OK'
                    }).then((result) => {
                            if (result.value) {
                                    window.location = 'data.php?page=materi-pembelajaran-lokal';
                            }
                    })</script>";
        }
    }
}
?>

<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Ubah Materi Pembelajaran - Muatan Lokal Budaya Melayu
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
                        <option value="pantun" <?php if ($materi == 'pantun') echo 'selected'; ?>>Pantun</option>
                        <option value="pulau_penyengat" <?php if ($materi == 'pulau_penyengat') echo 'selected'; ?>>Pulau Penyengat</option>
                        <option value="pencak_silat" <?php if ($materi == 'pencak_silat') echo 'selected'; ?>>Pencak Silat</option>
                        <option value="cerita_rakyat" <?php if ($materi == 'cerita_rakyat') echo 'selected'; ?>>Cerita Rakyat</option>
                        <option value="tanaman_obat" <?php if ($materi == 'tanaman_obat') echo 'selected'; ?>>Tanaman Obat Keluarga</option>
                        <option value="makanan_tradisional" <?php if ($materi == 'makanan_tradisional') echo 'selected'; ?>>Makanan Tradisional</option>
                        <option value="rumah_adat" <?php if ($materi == 'rumah_adat') echo 'selected'; ?>>Rumah Adat</option>
                        <option value="kepri" <?php if ($materi == 'kepri') echo 'selected'; ?>>Provinsi Kepulauan Riau</option>
                        <option value="seni_musik" <?php if ($materi == 'seni_musik') echo 'selected'; ?>>Seni Musik Tradisional Melayu</option>
                        <option value="seni_pentas" <?php if ($materi == 'seni_pentas') echo 'selected'; ?>>Seni Pentas Melayu</option>
                        <option value="ornamen_melayu" <?php if ($materi == 'ornamen_melayu') echo 'selected'; ?>>Ornamen Melayu</option>
                        <option value="tulisan_arab_melayu" <?php if ($materi == 'tulisan_arab_melayu') echo 'selected'; ?>>Tulisan Arab Melayu</option>
                    </select>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
            <a href="?page=materi-pembelajaran-lokal" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>