<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Konten YT</title>
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
                <i class="fa fa-table"></i> Data Konten YT - Muatan Lokal
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="table-responsive">
            <div>
				<a href="?page=add-konten-yt-lokal" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
                <br>
                <table id="example1" class="table table-bordered table-striped">
                    <thead class="tabel">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Judul Konten</th>
                            <th>Link YT</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">

                        <?php
                        $no = 1;
                        $sql = $koneksi->query("SELECT * from e_learning
                            WHERE kategori='konten_yt' AND jenis='muatan_lokal'");

                        while ($data = $sql->fetch_assoc()) {
                        ?>
                            <tr>
                                <td>
                                    <?php echo $no++; ?>
                                </td>
                                <td>
                                    <?php echo $data['judul_konten']; ?>
                                </td>
                                <td>
                                    <?php echo $data['link_yt']; ?>
                                </td>

                                <!-- Aksi Konten YT -->
                                <td>
                                    <?php if ($data) : ?>
                                        <a href="?page=edit-konten-yt-lokal&kode=<?php echo $data['id_learning']; ?>" title="Ubah Konten" class="btn btn-success btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="?page=del-konten-yt-lokal&kode=<?php echo $data['id_learning']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus Konten" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    <?php else : ?>
                                        <span>Data Konten YT Tidak Tersedia</span>
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