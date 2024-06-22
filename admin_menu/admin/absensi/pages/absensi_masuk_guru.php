<?php
if (isset($_SESSION['page'])) {
} else {
    header("location: ../index.php?page=dashboard&error=true");
}
$absent = '';
$flag = '0';
if (isset($_POST['tanggal'])) {
    $flag = '0';
    $date = $_POST['tanggal'];
    $absent = $date;
    $sql = mysqli_query($dbconnect, "SELECT tb_absen_masuk.id, tb_id.nama, tb_id.status_kartu, tb_absen_masuk.masuk, tb_absen_masuk.date, tb_absen_masuk.status, tb_absen_masuk.keterangan, tb_absen_masuk.berkas FROM tb_absen_masuk INNER JOIN tb_id ON tb_absen_masuk.id=tb_id.id WHERE tb_absen_masuk.date='$date' AND tb_id.status_kartu='Guru'");
} else {
    $flag = '0';
    $date = date('Y-m-d');
    $absent = $date;
    $sql = mysqli_query($dbconnect, "SELECT tb_absen_masuk.id, tb_id.nama, tb_id.status_kartu, tb_absen_masuk.masuk, tb_absen_masuk.date, tb_absen_masuk.status, tb_absen_masuk.keterangan, tb_absen_masuk.berkas FROM tb_absen_masuk INNER JOIN tb_id ON tb_absen_masuk.id=tb_id.id WHERE tb_absen_masuk.date='$date' AND tb_id.status_kartu='Guru'");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
</head>

<body>
    <div class="content-header ml-3 mr-3">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">DATA PRESENSI MASUK GURU</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Data Presensi Guru</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content ml-3 mr-3">
        <div class="content">
            <div class="container-fluid">

                <div class="card">
                    <div class="card-header bg-secondary" style="height: 82px;">
                        <div class="row">
                            <div class="col-md-6 pt-3">
                                <form method="POST">
                                    <input type="date" name="tanggal">
                                    <button type="submit" class="btn btn-light btn-sm mb-1 ml-1"><i class="fas fa-search"></i> Cari Tanggal</button>
                                </form>
                            </div>
                            <div class="col-md-6 pt-3" style="font-size:18px; text-align: right;">
                                <?php echo "Menampilkan tanggal, " . $date; ?>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row mt-2">
                            <div class="col-md-12 col-md-offset-2">
                                <div class="table table-hover">

                                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" id="dataTables-example" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>UID</th>
                                                <th>Nama Guru</th>
                                                <th>Jam Masuk</th>
                                                <th>Tanggal</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            while ($data = mysqli_fetch_array($sql)) {
                                                // Menentukan warna baris berdasarkan status
                                                if ($data['status'] == 'HADIR') {
                                                    $color = "table-success";
                                                } else if ($data['status'] == 'TERLAMBAT') {
                                                    $color = "table-secondary";
                                                } else if ($data['status'] == 'ALFA') {
                                                    $color = "table-danger";
                                                } else if ($data['status'] == 'IZIN') {
                                                    $color = "table-primary";
                                                } else if ($data['status'] == 'SAKIT') {
                                                    $color = "table-info";
                                                } else if ($data['status'] == 'BOLOS') {
                                                    $color = "table-warning";
                                                }
                                            ?>

                                                <tr class="<?php echo $color; ?>">
                                                    <td><?php echo $data['id']; ?></td>
                                                    <td><?php echo $data['nama']; ?></td>
                                                    <td><?php echo $data['masuk']; ?></td>
                                                    <td><?php echo $data['date']; ?></td>
                                                    <td>
                                                        <b><?php echo $data['status']; ?></b> - <?php echo $data['keterangan']; ?>
                                                    </td>
                                                    <td>
                                                        <?php if (!empty($data['berkas'])) : ?>
                                                            <a href="./konfig/berkasGuru/<?php echo $data['berkas']; ?>" target="_blank">
                                                                <i class="fas fa-eye"></i> Lihat Berkas
                                                            </a>
                                                            <a href="./index.php?page=edit_absen_masuk_guru&id=<?php echo $data['id']; ?>&nama=<?php echo $data['nama']; ?>&tanggal=<?php echo $absent; ?>&status=A&flag=<?php echo $flag; ?>">
                                                                <i class="fa fa-edit"></i> Edit
                                                            </a>
                                                        <?php else : ?>
                                                            -
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>

                                            <?php
                                            }
                                            ?>

                                            <?php
                                            $flag = '1';
                                            // Menampilkan guru yang tidak ada absen
                                            $sql1 = mysqli_query($dbconnect, "SELECT * FROM tb_id WHERE id NOT IN (SELECT id FROM tb_absen_masuk WHERE date='$absent') AND status_kartu='Guru'");
                                            while ($data1 = mysqli_fetch_array($sql1)) {
                                            ?>

                                                <tr class="table-danger">
                                                    <td><?php echo $data1['id']; ?></td>
                                                    <td><?php echo $data1['nama']; ?></td>
                                                    <td>-</td>
                                                    <td><?php echo $absent; ?></td>
                                                    <td>
                                                        <a href="./index.php?page=edit_absen_masuk_guru&id=<?php echo $data1['id']; ?>&nama=<?php echo $data1['nama']; ?>&tanggal=<?php echo $absent; ?>&status=A&flag=<?php echo $flag; ?>">
                                                            <b>ALFA</b>
                                                        </a>
                                                    </td>
                                                    <td>-</td>
                                                </tr>

                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!-- end row-->

                    </div>
                </div>

            </div>
        </div>
    </section>
</body>

</html>