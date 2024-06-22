<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Game Interaktif</title>
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
                <i class="fa fa-table"></i> Data Game Interaktif - Muatan Lokal
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="table-responsive">
                <div>
                    <a href="?page=add-game-interaktif-lokal" class="btn btn-primary">
                        <i class="fa fa-edit"></i> Tambah Data</a>
                </div>
                <br>
                <table id="example1" class="table table-bordered table-striped">
                    <thead class="tabel">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Judul Game</th>
                            <th>Link Game</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">

                        <?php
                        $no = 1;
                        $sql = $koneksi->query("SELECT * from e_learning
                            WHERE kategori='game' AND jenis = 'muatan_lokal'");

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

                                <!-- Aksi Game Interaktif -->
                                <td>
                                    <?php if ($data) : ?>
                                        <a href="?page=edit-game-interaktif-lokal&kode=<?php echo $data['id_learning']; ?>" title="Ubah Game" class="btn btn-success btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="?page=del-game-interaktif-lokal&kode=<?php echo $data['id_learning']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus Konten" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    <?php else : ?>
                                        <span>Data Game Interaktif Tidak Tersedia</span>
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