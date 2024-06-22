<?php
// Lakukan koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "ppdb_sd13");

if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// Periksa apakah pengguna sudah login
if (isset($_SESSION['ses_id_login_siswa'])) {
    // Ambil ID login siswa dari sesi
    $id_login_siswa = $_SESSION['ses_id_login_siswa'];

    // Query untuk mengambil data berkas dari tabel berkas berdasarkan id_siswa
    $sql_cek = "SELECT * FROM berkas
    INNER JOIN biodata_siswa ON berkas.id_siswa = biodata_siswa.id_siswa
    INNER JOIN login_siswa ON biodata_siswa.id_login_siswa = login_siswa.id_login_siswa
    WHERE login_siswa.id_login_siswa = $id_login_siswa";
    $query_cek = mysqli_query($koneksi, $sql_cek);

    $data_cek = null; // Mendefinisikan variabel $data_cek dengan nilai awal null

    if (mysqli_num_rows($query_cek) > 0) {
        // Data berkas ditemukan, lanjutkan dengan menampilkan formulir
        $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
    }

    if (isset($_POST['Ubah'])) {
        // Tentukan direktori penyimpanan berkas
        $target_directory = 'foto/';

        // Inisialisasi variabel-variabel berkas lama
        $ktp_lama = $data_cek['ktp'];
        $kk_lama = $data_cek['kartu_keluarga'];
        $akta_lahir_lama = $data_cek['akta_lahir'];
        $pas_foto_lama = $data_cek['pas_foto'];

        // Tentukan nama berkas baru
        $ktp_baru = @$_FILES['ktp']['name'];
        $kk_baru = @$_FILES['kk']['name'];
        $akta_lahir_baru = @$_FILES['akta_lahir']['name'];
        $pas_foto_baru = @$_FILES['pas_foto']['name'];

        // Inisialisasi variabel-variabel untuk cek apakah berkas baru diunggah
        $pindah_ktp = false;
        $pindah_kk = false;
        $pindah_akta_lahir = false;
        $pindah_pas_foto = false;

        // Cek dan hapus berkas lama jika berkas baru diunggah
        if (!empty($ktp_baru)) {
            unlink($target_directory . $ktp_lama);
            $pindah_ktp = move_uploaded_file($_FILES['ktp']['tmp_name'], $target_directory . $ktp_baru);
        }

        if (!empty($kk_baru)) {
            unlink($target_directory . $kk_lama);
            $pindah_kk = move_uploaded_file($_FILES['kk']['tmp_name'], $target_directory . $kk_baru);
        }

        if (!empty($akta_lahir_baru)) {
            unlink($target_directory . $akta_lahir_lama);
            $pindah_akta_lahir = move_uploaded_file($_FILES['akta_lahir']['tmp_name'], $target_directory . $akta_lahir_baru);
        }

        if (!empty($pas_foto_baru)) {
            unlink($target_directory . $pas_foto_lama);
            $pindah_pas_foto = move_uploaded_file($_FILES['pas_foto']['tmp_name'], $target_directory . $pas_foto_baru);
        }

        // Pastikan minimal satu berkas telah diunggah dengan sukses
        if ($pindah_ktp || $pindah_kk || $pindah_akta_lahir || $pindah_pas_foto) {
            // Ubah kode SQL untuk mengupdate data berkas di tabel berkas
            $sql_ubah_berkas = "UPDATE berkas SET";
            $update_fields = [];
            $param_types = "";
            $param_values = [];

            if ($pindah_ktp) {
                $update_fields[] = "ktp=?";
                $param_types .= "s";
                $param_values[] = $ktp_baru;
            }

            if ($pindah_kk) {
                $update_fields[] = "kartu_keluarga=?";
                $param_types .= "s";
                $param_values[] = $kk_baru;
            }

            if ($pindah_akta_lahir) {
                $update_fields[] = "akta_lahir=?";
                $param_types .= "s";
                $param_values[] = $akta_lahir_baru;
            }

            if ($pindah_pas_foto) {
                $update_fields[] = "pas_foto=?";
                $param_types .= "s";
                $param_values[] = $pas_foto_baru;
            }

            $sql_ubah_berkas .= " " . implode(', ', $update_fields);
            $sql_ubah_berkas .= " WHERE id_siswa=?";
            $param_types .= "i";
            $param_values[] = $data_cek['id_siswa'];

            $stmt = mysqli_prepare($koneksi, $sql_ubah_berkas);

            if ($stmt) {
                mysqli_stmt_bind_param($stmt, $param_types, ...$param_values);
                $query_ubah_berkas = mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);

                if ($query_ubah_berkas) {
                    // Query berhasil dieksekusi, tampilkan pesan sukses
                    echo "<script>
                        Swal.fire({
                            title: 'Ubah Data Berkas Berhasil',
                            text: '',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.value) {
                                window.location = 'data.php?page=data-berkas-berkas';
                            }
                        });
                    </script>";
                } else {
                    // Query gagal dieksekusi, tampilkan pesan gagal
                    echo "<script>
                        Swal.fire({
                            title: 'Ubah Data Berkas Gagal',
                            text: '',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.value) {
                                window.location = 'data.php?page=edit-berkas&kode=$id_login_siswa';
                            }
                        });
                    </script>";
                }
            } else {
                echo "Error dalam menyiapkan pernyataan SQL: " . mysqli_error($koneksi);
            }
        } else {
            echo "Gagal mengunggah satu atau lebih berkas.";
        }
    }

    if (!is_null($data_cek)) {
        // Data berkas ditemukan, lanjutkan dengan menampilkan formulir
?>
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa fa-edit"></i>Ubah Berkas Persyaratan
                </h3>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <!-- ... (bagian formulir dan tampilan berkas) -->
                    <!-- Menampilkan foto KTP -->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Berkas KTP</label>
                        <div class="col-sm-6">
                            <img src="foto/<?php echo $data_cek['ktp']; ?>" width="160px" />
                        </div>
                    </div>

                    <!-- Mengunggah ulang foto KTP -->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ubah Berkas KTP</label>
                        <div class="col-sm-6">
                            <input type="file" id="ktp" name="ktp">
                            <p class="help-block">
                                <font color="red">"Format file Jpg/Png"</font>
                            </p>
                        </div>
                    </div>

                    <!-- Menampilkan foto Kartu Keluarga -->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Berkas Kartu Keluarga</label>
                        <div class="col-sm-6">
                            <img src="foto/<?php echo $data_cek['kartu_keluarga']; ?>" width="160px" />
                        </div>
                    </div>

                    <!-- Mengunggah ulang foto Kartu Keluarga -->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ubah Berkas KK</label>
                        <div class="col-sm-6">
                            <input type="file" id="kk" name="kk">
                            <p class="help-block">
                                <font color="red">"Format file Jpg/Png"</font>
                            </p>
                        </div>
                    </div>

                    <!-- Menampilkan foto Akta Lahir -->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Berkas Akta Lahir</label>
                        <div class="col-sm-6">
                            <img src="foto/<?php echo $data_cek['akta_lahir']; ?>" width="160px" />
                        </div>
                    </div>

                    <!-- Mengunggah ulang foto Akta Lahir -->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ubah Berkas Akta Lahir</label>
                        <div class="col-sm-6">
                            <input type="file" id="akta_lahir" name="akta_lahir">
                            <p class="help-block">
                                <font color="red">"Format file Jpg/Png"</font>
                            </p>
                        </div>
                    </div>

                    <!-- Menampilkan foto Pas Foto -->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Berkas Pas Foto</label>
                        <div class="col-sm-6">
                            <img src="foto/<?php echo $data_cek['pas_foto']; ?>" width="160px" />
                        </div>
                    </div>

                    <!-- Mengunggah ulang foto Pas Foto -->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ubah Berkas Pas Foto</label>
                        <div class="col-sm-6">
                            <input type="file" id="pas_foto" name="pas_foto">
                            <p class="help-block">
                                <font color="red">"Format file Jpg/Png"</font>
                            </p>
                        </div>
                    </div>
                </div>
        </div>
        <div class="card-footer">
            <input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
            <a href="?page=data-berkas" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
        </form>
        </div>
<?php
    } else {
        // Data berkas tidak ditemukan, tampilkan pesan
        echo '<div class="card card-success">';
        echo '<div class="card-header"><h3 class="card-title">Ubah Berkas Persyaratan</h3></div>';
        echo '<div class="card-body">';
        echo '<p align="center">Data Berkas Tidak Ditemukan</p>';
        echo '<p align="center">Pastikan Anda Mengisi Berkas Persyaratan pada Menu Upload Berkas</p>';
        echo '<div class="mb-2" align="center">';
        echo '<a href="?page=data-berkas-berkas" class="btn btn-primary"><i class="fa fa-edit"></i> Upload Berkas</a>';
        echo '</div>';
        echo '</div>'; // Akhir card-body
        echo '</div>'; // Akhir card
    }
} else {
    // Tampilkan pesan atau alihkan ke halaman login jika pengguna belum login
    echo 'Anda harus login terlebih dahulu atau Anda tidak memiliki akses.';
    // Contoh alihkan ke halaman login:
    // header("Location: login.php");
}
?>