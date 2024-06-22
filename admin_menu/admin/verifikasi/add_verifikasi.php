<?php
if (isset($_GET['id_siswa'])) {
    $id_siswa = $_GET['id_siswa'];

    // Check if id_siswa exists in the berkas table
    $sql_check_berkas = "SELECT * FROM berkas WHERE id_siswa = '$id_siswa'";
    $query_check_berkas = mysqli_query($koneksi, $sql_check_berkas);

    if ($query_check_berkas && mysqli_num_rows($query_check_berkas) > 0) {
        // Data id_siswa exists in the berkas table, show the form
        if (isset($_POST['Simpan'])) {
            // Ambil data dari formulir
            $tgl_penerimaan = mysqli_real_escape_string($koneksi, $_POST['tgl_penerimaan']);
            $jalur_penerimaan = mysqli_real_escape_string($koneksi, $_POST['jalur_penerimaan']);
            $status_penerimaan = mysqli_real_escape_string($koneksi, $_POST['status_penerimaan']);

            // Masukkan data ke tabel hasil_seleksi
            $sql_insert = "INSERT INTO hasil_seleksi (id_siswa, tgl_penerimaan, jalur_penerimaan, status_penerimaan) VALUES ('$id_siswa', '$tgl_penerimaan', '$jalur_penerimaan', '$status_penerimaan')";
            $query_insert = mysqli_query($koneksi, $sql_insert);

            if ($query_insert) {
                echo "<script>
                        Swal.fire({
                            title: 'Data berhasil ditambahkan',
                            text: '',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.value) {
                                window.location = 'data.php?page=data-verifikasi-belum';
                            }
                        });
                    </script>";
            } else {
                echo "<script>
                        Swal.fire({
                            title: 'Gagal menambahkan data',
                            text: '',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.value) {
                                window.location = 'data.php?page=data-verifikasi-belum';
                            }
                        });
                </script>";
            }
        }
?>
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa fa-edit"></i>Tambah Data Hasil Seleksi
                </h3>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <!-- Formulir untuk menambahkan data -->
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Jalur Penerimaan</label>
                        <div class="col-sm-4">
                            <select name="jalur_penerimaan" id="jalur_penerimaan" class="form-control">
                                <option value="">-- Pilih --</option>
                                <?php
                                $jalurOptions = ["Zonasi", "Afirmasi", "Perpindahan Orangtua","-"];
                                foreach ($jalurOptions as $jalur) {
                                    echo "<option value='$jalur'>$jalur</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tanggal Pengecekan Status</label>
                        <div class="col-sm-5">
                            <input type="date" class="form-control" id="tgl_penerimaan" name="tgl_penerimaan" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-danger">Status Verifikasi</label>
                        <div class="col-sm-4">
                            <select name="status_penerimaan" id="status_penerimaan" class="form-control">
                                <option value="" disabled selected>Belum di Setujui</option>
                                <option value="Sudah di Setujui">Verifikasi di Terima</option>
                                <option value="Tidak di Setujui">Verifikasi di Tolak</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <input type="submit" name="Simpan" value="Simpan" class="btn btn-success">
                    <a href="?page=data-verifikasi-belum" title="Kembali" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
<?php
    } else {
        echo '<div class="row text-center">';
        echo '<div align="center" class="col-md-8 mx-auto">';
        echo '<div class="card card-info">';
        echo '<div class="card-header">';
        echo '<h3 class="card-title">Detail Proses Verifikasi</h3>';
        echo '<div class="card-tools"></div>';
        echo '</div>';
        echo '<div class="card-body">';
        echo '<p>Data Siswa Belum Lengkap. Tidak bisa diproses jika data siswa belum lengkap. <br> Pastikan data siswa lengkap sebelum masuk proses verifikasi</p>';
        echo '</div>';
        echo '<div class="card-footer">';
        echo '<a href="?page=proses-verifikasi" class="btn btn-warning">Kembali</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "ID siswa tidak ditemukan.";
}
