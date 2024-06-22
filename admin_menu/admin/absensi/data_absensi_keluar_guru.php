<?php
// File: connection.php
$dbconnect = mysqli_connect("localhost", "root", "", "ppdb_sd13");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
?>

<?php
$absent = '';
$flag = '0';
if (isset($_POST['tanggal'])) {
    $flag = '0';
    $date = $_POST['tanggal'];
    $absent = $date;
    $sql = mysqli_query($dbconnect, "SELECT tb_absen_keluar.id, tb_id.nama, tb_id.status_kartu, tb_absen_keluar.keluar, tb_absen_keluar.date, tb_absen_keluar.status, tb_absen_keluar.keterangan FROM tb_absen_keluar INNER JOIN tb_id ON tb_absen_keluar.id=tb_id.id WHERE tb_absen_keluar.date='$date' AND tb_id.status_kartu='Guru'");
} else {
    $flag = '0';
    $date = date('Y-m-d');
    $absent = $date;
    $sql = mysqli_query($dbconnect, "SELECT tb_absen_keluar.id, tb_id.nama, tb_id.status_kartu, tb_absen_keluar.keluar, tb_absen_keluar.date, tb_absen_keluar.status, tb_absen_keluar.keterangan FROM tb_absen_keluar INNER JOIN tb_id ON tb_absen_keluar.id=tb_id.id WHERE tb_absen_keluar.date='$date' AND tb_id.status_kartu='Guru'");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Absensi Keluar Guru</title>
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
                <i class="fa fa-table"></i> Data Absensi Keluar Guru
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card">
            <div class="card-header" style="height: 82px;">
                <div class="row">
                    <div class="col-md-6 pt-3">
                        <form method="POST">
                            <div class="input-group">
                                <input type="date" name="tanggal" class="form-control">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-danger btn-sm mb-1 ml-1"><i class="fas fa-search"></i> Cari Tanggal</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 pt-3" style="font-size: 18px; text-align: right;">
                        <?php echo "Menampilkan tanggal, " . $date; ?>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div>
                    <a href="/included_all/admin_menu/admin/absensi/login.php" target="_blank" class="btn btn-success">Login Admin</a>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12 col-md-offset-2">
                        <div class="table table-hover">

                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" id="dataTables-example" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>UID</th>
                                        <th>Nama Pengguna</th>
                                        <th>Jam Keluar</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    while ($data = mysqli_fetch_array($sql)) {
                                        if ($data['status'] == 'HADIR') {
                                            $color = "table-success";
                                        } else if ($data['status'] == 'TERLAMBAT') {
                                            $color = "table-secondary";
                                        } else if ($data['status'] == 'ABSEN') {
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
                                            <td><?php echo $data['keluar']; ?></td>
                                            <td><?php echo $data['date']; ?></td>
                                            <td>
                                                <center><?php echo $data['status']; ?></center>
                                            </td>
                                            <td><?php echo $data['keterangan']; ?></td>
                                        </tr>

                                    <?php
                                    }
                                    ?>

                                    <?php
                                    $flag = '1';
                                    $sql1 = mysqli_query($dbconnect, "select * from tb_id where id not in(select id from tb_absen_keluar where date='$absent') AND status_kartu='Guru'");
                                    while ($data1 = mysqli_fetch_array($sql1)) {
                                    ?>

                                        <tr class="table-danger">
                                            <td><?php echo $data1['id']; ?></td>
                                            <td><?php echo $data1['nama']; ?></td>
                                            <td>-</td>
                                            <td><?php echo $absent; ?></td>
                                            <td><a <?php echo $data1['id']; ?>&nama=<?php echo $data1['nama']; ?>&tanggal=<?php echo $absent; ?>&status=A&flag=<?php echo $flag; ?>">
                                                    <center><b>ALFA</b></center>
                                                </a></td>
                                            <td></td>
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
            <!-- /.card-body -->
        </div>

    </div>
</body>

</html>