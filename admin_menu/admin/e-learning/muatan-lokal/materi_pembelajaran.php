<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Materi Pembelajaran</title>
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
                <i class="fa fa-table"></i> Data Materi Pembelajaran - Muatan Lokal
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="table-responsive">
                <div>
                    <a href="?page=add-materi-pembelajaran-lokal" class="btn btn-primary">
                        <i class="fa fa-edit"></i> Tambah Data</a>
                </div>
                <br>
                <table id="example1" class="table table-bordered table-striped">
                    <thead class="tabel">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Judul Materi</th>
                            <th>Jenis Materi</th>
                            <th>Link Materi</th>
                            <th>Created By</th>
                            <th>Download File</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">

                        <?php
                        // Array asosiatif untuk memetakan nilai di database ke label jenis materi
                        $jenis_materi_labels = array(
                            'pulau_penyengat' => 'Pulau Penyengat',
                            'pantun' => 'Pantun',
                            'pencak_silat' => 'Pencak Silat',
                            'cerita_rakyat' => 'Cerita Rakyat',
                            'tanaman_obat' => 'Tanaman Obat Keluarga',
                            'makanan_tradisional' => 'Makanan Tradisional',
                            'rumah_adat' => 'Rumah Adat',
                            'kepri' => 'Provinsi Kepulauan Riau',
                            'seni_musik' => 'Seni Musik Tradisional Melayu',
                            'seni_pentas' => 'Seni Pentas Melayu',
                            'ornamen_melayu' => 'Ornamen Melayu',
                            'tulisan_arab_melayu' => 'Tulisan Arab Melayu'
                        );
                        $no = 1;
                        // Mengambil data dari database
                        $sql = $koneksi->query("SELECT * FROM e_learning WHERE kategori='materi' AND jenis='muatan_lokal'");

                        while ($data = $sql->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data['judul_konten']; ?></td>
                                <td><?php echo isset($jenis_materi_labels[$data['materi']]) ? $jenis_materi_labels[$data['materi']] : 'Tidak Diketahui'; ?></td>
                                <td><?php echo $data['link_yt']; ?></td>
                                <td><?php echo $data['created_by']; ?></td>
                                <td>
                                    <a href="file_materi/<?php echo $data['file']; ?>" title="Download File" class="btn btn-success btn-sm" download>
                                        <i class="fa fa-download"></i>
                                    </a>
                                </td>
                                <td>
                                    <?php if ($data) : ?>
                                        <a href="?page=edit-materi-pembelajaran-lokal&kode=<?php echo $data['id_learning']; ?>" title="Ubah Materi Pembelajaran" class="btn btn-success btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="?page=del-materi-pembelajaran-lokal&kode=<?php echo $data['id_learning']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus Materi Pembelajaran" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    <?php else : ?>
                                        <span>Data Materi Pembelajaran Tidak Tersedia</span>
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