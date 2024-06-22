<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <style>
        thead .tabel {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .tabel-aksi {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fa fa-table"></i> Data Siswa
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="table-responsive">
                <br>
                <table id="example1" class="table table-bordered table-striped">
                    <thead class="tabel">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Foto</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Tempat Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Biodata Ayah</th>
                            <th>Biodata Ibu</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">

                        <?php
                        $no = 1;
                        $sql = $koneksi->query("SELECT login_siswa.nik, biodata_siswa.*, berkas.pas_foto 
                            FROM login_siswa
                            LEFT JOIN biodata_siswa ON login_siswa.id_login_siswa = biodata_siswa.id_login_siswa
                            LEFT JOIN berkas ON biodata_siswa.id_siswa = berkas.id_siswa
                            WHERE biodata_siswa.id_siswa IS NOT NULL");

                        while ($data = $sql->fetch_assoc()) {
                        ?>
                            <tr>
                                <td>
                                    <?php echo $no++; ?>
                                </td>
                                <td align="center">
                                    <img src="/ppdb-sd/src/siswa_menu/foto/<?php echo $data['pas_foto']; ?>" width="70px" />
                                </td>
                                <td>
                                    <?php echo $data['nik']; ?>
                                </td>
                                <td>
                                    <?php echo $data['nama_siswa']; ?>
                                </td>
                                <td>
                                    <?php echo $data['tempat_lahir_siswa']; ?>
                                </td>
                                <td>
                                    <?php echo $data['jk_siswa']; ?>
                                </td>

                                <!-- Biodata Ayah -->
                                <!-- Biodata Ayah -->
                                <td>
                                    <?php
                                    // Query untuk mendapatkan data dari login_siswa, biodata_siswa, dan biodata_ayah
                                    $queryDataAyah = $koneksi->query("SELECT login_siswa.nik, biodata_siswa.*, biodata_ayah.* 
                                        FROM login_siswa
                                        LEFT JOIN biodata_siswa ON login_siswa.id_login_siswa = biodata_siswa.id_login_siswa
                                        LEFT JOIN biodata_ayah ON biodata_siswa.id_siswa = biodata_ayah.id_siswa 
                                        WHERE biodata_siswa.id_siswa = '{$data['id_siswa']}'");
                                    $dataAyah = $queryDataAyah->fetch_assoc();

                                    // Periksa apakah data tersedia
                                    if ($dataAyah) :
                                    ?>
                                        <a href="?page=view-ayah&kode=<?php echo $dataAyah['id_ayah']; ?>" title="Detail Ayah" class="btn btn-info btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="?page=edit-ayah&kode=<?php echo $dataAyah['id_ayah']; ?>" title="Ubah Ayah" class="btn btn-success btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    <?php else : ?>
                                        <span>Data Ayah Tidak Tersedia</span>
                                    <?php endif; ?>
                                </td>

                                <!-- Biodata Ibu -->
                                <td>
                                    <?php
                                    // Query untuk mendapatkan data dari login_siswa, biodata_siswa, dan biodata_ayah
                                    $queryDataIbu = $koneksi->query("SELECT login_siswa.nik, biodata_siswa.*, biodata_ibu.* 
                                        FROM login_siswa
                                        LEFT JOIN biodata_siswa ON login_siswa.id_login_siswa = biodata_siswa.id_login_siswa
                                        LEFT JOIN biodata_ibu ON biodata_siswa.id_siswa = biodata_ibu.id_siswa 
                                        WHERE biodata_siswa.id_siswa = '{$data['id_siswa']}'");
                                    $dataIbu = $queryDataIbu->fetch_assoc();

                                    // Periksa apakah data tersedia
                                    if ($dataIbu) :
                                    ?>
                                        <a href="?page=view-ibu&kode=<?php echo $dataIbu['id_ibu']; ?>" title="Detail Ibu" class="btn btn-info btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="?page=edit-ibu&kode=<?php echo $dataIbu['id_ibu']; ?>" title="Ubah Ibu" class="btn btn-success btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    <?php else : ?>
                                        <span>Data Ibu Tidak Tersedia</span>
                                    <?php endif; ?>
                                </td>

                                <!-- Aksi Biodata Siswa -->
                                <td>
                                    <?php
                                    // Query untuk mendapatkan data login_siswa.nik, biodata_siswa.*, berkas.pas_foto
                                    $queryBiodata = $koneksi->query("SELECT login_siswa.nik, biodata_siswa.*, berkas.pas_foto 
                                                FROM login_siswa
                                                LEFT JOIN biodata_siswa ON login_siswa.id_login_siswa = biodata_siswa.id_login_siswa
                                                LEFT JOIN berkas ON biodata_siswa.id_siswa = berkas.id_siswa 
                                                WHERE biodata_siswa.id_siswa = '{$data['id_siswa']}'");
                                    $dataBiodata = $queryBiodata->fetch_assoc();

                                    if ($dataBiodata) : ?>
                                        <a href="?page=view-siswa&kode=<?php echo $dataBiodata['id_siswa']; ?>" title="Detail Siswa" class="btn btn-info btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="?page=edit-siswa&kode=<?php echo $dataBiodata['id_siswa']; ?>" title="Ubah Siswa" class="btn btn-success btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="?page=del-siswa&kode=<?php echo $dataBiodata['id_siswa']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus Siswa" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    <?php else : ?>
                                        <span>Data Siswa Tidak Tersedia</span>
                                    <?php endif; ?>
                                </td>


                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
</body>

</html>