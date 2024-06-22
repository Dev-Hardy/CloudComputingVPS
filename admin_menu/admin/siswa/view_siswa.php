<?php

if (isset($_GET['kode'])) {
    $sql_cek = "SELECT login_siswa.nik, biodata_siswa.*, berkas.pas_foto 
    FROM login_siswa
    LEFT JOIN biodata_siswa ON login_siswa.id_login_siswa = biodata_siswa.id_login_siswa
    LEFT JOIN berkas ON biodata_siswa.id_siswa = berkas.id_siswa WHERE biodata_siswa.id_siswa='" . $_GET['kode'] . "'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);

    if ($data_cek) {
        // Data ditemukan, tampilkan detail siswa
?>
        <div class="row">
            <div class="col-md-8">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Detail Siswa</h3>
                        <div class="card-tools">
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <table class="table">
                            <tbody>
                                <!-- Tampilkan data siswa di sini -->
                                <tr>
                                    <td style="width: 180px">
                                        <b>NIK</b>
                                    </td>
                                    <td>:
                                        <?php echo $data_cek['nik']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 180px">
                                        <b>Nama Siswa</b>
                                    </td>
                                    <td>:
                                        <?php echo $data_cek['nama_siswa']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 180px">
                                        <b>Tempat Lahir</b>
                                    </td>
                                    <td>:
                                        <?php echo $data_cek['tempat_lahir_siswa']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 180px">
                                        <b>Tanggal Lahir</b>
                                    </td>
                                    <td>:
                                        <?php echo $data_cek['tgl_lahir_siswa']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 180px">
                                        <b>Alamat</b>
                                    </td>
                                    <td>:
                                        <?php echo $data_cek['alamat_siswa']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 180px">
                                        <b>Jenis Kelamin</b>
                                    </td>
                                    <td>:
                                        <?php echo $data_cek['jk_siswa']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 180px">
                                        <b>Agama</b>
                                    </td>
                                    <td>:
                                        <?php echo $data_cek['agama_siswa']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 180px">
                                        <b>Anak Ke-</b>
                                    </td>
                                    <td>:
                                        <?php echo $data_cek['anak_ke']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 180px">
                                        <b>Jumlah Saudara</b>
                                    </td>
                                    <td>:
                                        <?php echo $data_cek['jumlah_saudara']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 180px">
                                        <b>Status</b>
                                    </td>
                                    <td>:
                                        <?php echo $data_cek['status_keluarga']; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="card-footer">
                            <a href="?page=data-siswa" class="btn btn-warning">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-success">
                    <div class="card-header">
                        <center>
                            <h3 class="card-title">
                                Foto Siswa
                            </h3>
                        </center>
                        <div class="card-tools">
                        </div>
                    </div>
                    <div class="card-body">
                        <?php if ($data_cek['pas_foto']) : ?>
                            <div class="text-center">
                                <img src="/ppdb-sd/src/siswa_menu/foto/<?php echo $data_cek['pas_foto']; ?>" width="280px" />
                            </div>
                            <h3 class="profile-username text-center">
                                <b class="text-danger">NAMA SISWA</b> <br>
                                <?php echo $data_cek['nama_siswa']; ?>
                            </h3>
                        <?php else : ?>
                            <div class="text-center text-danger">
                                Pas Foto Siswa Belum di Upload
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
<?php
    } else {
        // Data siswa tidak ditemukan
        echo '<div class="row text-center">';
        echo '<div align="center" class="col-md-8 mx-auto">';
        echo '<div class="card card-info">';
        echo '<div class="card-header">';
        echo '<h3 class="card-title">Detail Siswa</h3>';
        echo '<div class="card-tools"></div>';
        echo '</div>';
        echo '<div class="card-body">';
        echo '<p>Data Siswa Tidak ditemukan. Silakan kembali ke halaman sebelumnya.</p>';
        echo '</div>';
        echo '<div class="card-footer">';
        echo '<a href="?page=data-siswa" class="btn btn-warning">Kembali</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
}
?>