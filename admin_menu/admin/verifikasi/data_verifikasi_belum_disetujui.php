<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-table"></i> Proses Verifikasi Berkas Belum Disetujui
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <br>
            <table id="example1" class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK Siswa</th>
                        <th>Nama Siswa</th>
                        <th>Lihat Berkas</th>
                        <th>Verifikasi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;
                    $sql = $koneksi->query("SELECT biodata_siswa.id_siswa, biodata_siswa.nama_siswa, login_siswa.nik, berkas.*, hasil_seleksi.status_penerimaan
                    FROM biodata_siswa
                    LEFT JOIN login_siswa ON biodata_siswa.id_login_siswa = login_siswa.id_login_siswa
                    LEFT JOIN berkas ON biodata_siswa.id_siswa = berkas.id_siswa
                    LEFT JOIN hasil_seleksi ON biodata_siswa.id_siswa = hasil_seleksi.id_siswa;
                    ");
                    while ($data = $sql->fetch_assoc()) {
                        // Cek jika status_penerimaan tidak ada data
                        if ($data['status_penerimaan'] === null) {
                    ?>

                        <tr>
                            <td>
                                <?php echo $no++; ?>
                            </td>
                            <td>
                                <?php echo $data['nik']; ?>
                            </td>
                            <td>
                                <?php echo $data['nama_siswa']; ?>
                            </td>
                            <td align="center">
                                <a href="?page=view-berkas-belum&kode=<?php echo $data['id_berkas']; ?>" title="Detail" class="btn btn-info btn-sm">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </td>
                            <td align="center">
                                <a href="?page=add-verifikasi&id_siswa=<?php echo $data['id_siswa']; ?>" title="Ubah" class="btn btn-success btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                        </tr>

                    <?php
                        }
                    }
                    // Cek jika tidak ada data
                    if ($no === 1) {
                        echo '<div class="row text-center">';
                        echo '<div align="center" class="col-md-8 mx-auto">';
                        echo '<div class="card card-info">';
                        echo '<div class="card-header">';
                        echo '<h3 class="card-title">Detail Proses Verifikasi</h3>';
                        echo '<div class="card-tools"></div>';
                        echo '</div>';
                        echo '<div class="card-body">';
                        echo '<p>Data Verifikasi Belum di Setujui tidak ditemukan. Silakan kembali ke halaman sebelumnya.</p>';
                        echo '</div>';
                        echo '<div class="card-footer">';
                        echo '<a href="?page=proses-verifikasi" class="btn btn-warning">Kembali</a>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </tbody>
                </tfoot>
            </table>
        </div>
    </div>
    <!-- /.card-body -->
</div>
