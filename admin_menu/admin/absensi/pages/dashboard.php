<?php
if (isset($_SESSION['page'])) {
} else {
  header("location: ../index.php?page=dashboard&error=true");
}

$today = date('Y-m-d');
$sql1 = mysqli_query($dbconnect, "SELECT COUNT(status) FROM tb_absen_masuk WHERE date='$today' AND status='TERLAMBAT'");
$count_terlambat = mysqli_num_rows($sql1);

$sql2 = mysqli_query($dbconnect, "SELECT COUNT(status) FROM tb_absen_masuk WHERE date='$today' AND status='HADIR'");
$count_hadir = mysqli_num_rows($sql2);

$sql3 = mysqli_query($dbconnect, "SELECT COUNT(status) FROM tb_absen_masuk WHERE date='$today' AND status='IZIN'");
$count_izin = mysqli_num_rows($sql3);

$sql4 = mysqli_query($dbconnect, "SELECT COUNT(status) FROM tb_absen_masuk WHERE date='$today' AND status='SAKIT'");
$count_sakit = mysqli_num_rows($sql4);

$sql5 = mysqli_query($dbconnect, "SELECT COUNT(status) FROM tb_absen_masuk WHERE date='$today' AND status='BOLOS'");
$count_bolos = mysqli_num_rows($sql5);

$sql6 = mysqli_query($dbconnect, "select * from tb_id where id not in(select id from tb_absen_masuk where date='$today')");
$count_alpa = mysqli_num_rows($sql6);
?>

<!-- Content Header (Page header) -->
<div class="content-header ml-3 mr-3">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">DASHBOARD</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content ml-3 mr-3">
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">


      <!-- card-->
      <div class="row">
        <?php
        if ($_SESSION['level'] == '0') {
        ?>
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>
                  <?php
                  $sql = mysqli_query($dbconnect, "SELECT*FROM tb_absen_masuk INNER JOIN tb_id ON tb_absen_masuk.id=tb_id.id WHERE status_kartu='Siswa'");
                  $row = mysqli_num_rows($sql);
                  echo $row;
                  ?>
                </h3>

                <p>Data Presensi Siswa</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="index.php?page=absensi-siswa" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>
                  <?php
                  $sql = mysqli_query($dbconnect, "SELECT*FROM tb_absen_masuk INNER JOIN tb_id ON tb_absen_masuk.id=tb_id.id WHERE status_kartu='Guru'");
                  $row = mysqli_num_rows($sql);
                  echo $row;
                  ?>
                </h3>

                <p>Data Presensi Guru</p>
              </div>
              <div class="icon">
                <i class="fas fa-clipboard-list"></i>
              </div>
              <a href="index.php?page=absensi-guru" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>
                  <?php
                  $sql = mysqli_query($dbconnect, "SELECT*FROM tb_id WHERE status_kartu='Siswa'");
                  $row = mysqli_num_rows($sql);
                  echo $row;
                  ?>
                </h3>

                <p>Jumlah Siswa</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-graduate"></i>
              </div>
              <a href="index.php?page=pengguna-siswa" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3>
                  <?php
                  $sql = mysqli_query($dbconnect, "SELECT*FROM tb_id WHERE status_kartu='Guru'");
                  $row = mysqli_num_rows($sql);
                  echo $row;
                  ?>
                </h3>

                <p>Jumlah Guru</p>
              </div>
              <div class="icon">
                <i class="fas fa-chalkboard-teacher"></i>
              </div>
              <a href="index.php?page=pengguna-guru" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>
                  <?php
                  $sql = mysqli_query($dbconnect, "SELECT*FROM tb_id WHERE id");
                  $row = mysqli_num_rows($sql);
                  echo $row;
                  ?>
                </h3>

                <p>Data Registrasi Kartu</p>
              </div>
              <div class="icon">
                <i class="fas fa-id-card"></i>
              </div>
              <a href="index.php?page=pendaftaran" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>
                  <?php
                  $sql = mysqli_query($dbconnect, "SELECT*FROM tb_pengguna WHERE no");
                  $row = mysqli_num_rows($sql);
                  echo $row;
                  ?>
                </h3>
                <p>Administrator</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-shield"></i>
              </div>
              <a href="index.php?page=pengguna" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        <?php
        } elseif ($_SESSION['level'] == '1') {
        ?>
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>
                  <?php
                  $sql = mysqli_query($dbconnect, "SELECT*FROM tb_absen_masuk INNER JOIN tb_id ON tb_absen_masuk.id=tb_id.id WHERE status_kartu='Siswa'");
                  $row = mysqli_num_rows($sql);
                  echo $row;
                  ?>
                </h3>

                <p>Data Presensi Siswa</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="index.php?page=absensi-siswa" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>
                  <?php
                  $sql = mysqli_query($dbconnect, "SELECT*FROM tb_absen_masuk INNER JOIN tb_id ON tb_absen_masuk.id=tb_id.id WHERE status_kartu='Guru'");
                  $row = mysqli_num_rows($sql);
                  echo $row;
                  ?>
                </h3>

                <p>Data Presensi Guru</p>
              </div>
              <div class="icon">
                <i class="fas fa-clipboard-list"></i>
              </div>
              <a href="index.php?page=absensi-guru" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>
                  <?php
                  $sql = mysqli_query($dbconnect, "SELECT*FROM tb_id WHERE status_kartu='Siswa'");
                  $row = mysqli_num_rows($sql);
                  echo $row;
                  ?>
                </h3>

                <p>Jumlah Siswa</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-graduate"></i>
              </div>
              <a href="#" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3>
                  <?php
                  $sql = mysqli_query($dbconnect, "SELECT*FROM tb_id WHERE status_kartu='Guru'");
                  $row = mysqli_num_rows($sql);
                  echo $row;
                  ?>
                </h3>

                <p>Jumlah Guru</p>
              </div>
              <div class="icon">
                <i class="fas fa-chalkboard-teacher"></i>
              </div>
              <a href="#" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>
                  <?php
                  $sql = mysqli_query($dbconnect, "SELECT*FROM tb_id WHERE id");
                  $row = mysqli_num_rows($sql);
                  echo $row;
                  ?>
                </h3>

                <p>Data Registrasi Kartu</p>
              </div>
              <div class="icon">
                <i class="fas fa-id-card"></i>
              </div>
              <a href="#" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>
                  <?php
                  $sql = mysqli_query($dbconnect, "SELECT*FROM tb_pengguna WHERE no");
                  $row = mysqli_num_rows($sql);
                  echo $row;
                  ?>
                </h3>
                <p>Administrator</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-shield"></i>
              </div>
              <a href="#" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        <?php
        }
        ?>
      </div>
      <!-- /.row -->

      <!-- chart -->

      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="card">
            <div class="card-header bg-secondary">
              <h3 class="card-title">
                <i class="fas fa-chart-pie mr-1"></i>
                Presentase Kehadiran
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content p-0">
                <!-- Morris chart - Sales -->
                <div id="container" height="300px" width="300px"></div>
              </div>
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
        </section>

        <!-- right colum-->
        <section class="col-lg-5 connectedSortable">

          <!-- calendar-->
          <div class="card">
            <div class="card-header border-1 bg-secondary">

              <h3 class="card-title">
                <i class="far fa-calendar-alt mr-1"></i>
                Tanggal & Jam
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body pt-0">
              <!--The calendar -->
              <div style="text-align:center;padding:1em 0;"> <iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=en&size=large&timezone= <?php echo $timezone; ?>" width="100%" height="140" frameborder="0" seamless></iframe> </div>
            </div>
            <!-- /.card-body -->
          </div>

        </section><!--end right colum-->
      </div><!-- end row-->
    </div><!-- /.container-fluid -->
  </div><!-- /.content -->
</section>


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
  Highcharts.chart('container', {
    chart: {
      type: 'pie',
      options3d: {
        enabled: true,
        alpha: 45,
        beta: 0
      }
    },
    title: {
      text: ''
    },
    accessibility: {
      point: {
        valueSuffix: '%'
      }
    },
    tooltip: {
      pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
      pie: {
        allowPointSelect: true,
        cursor: 'pointer',
        depth: 35,
        dataLabels: {
          enabled: true,
          format: '{point.name}'
        }
      }
    },

    series: [{
      type: 'pie',
      name: 'Jumlah',
      data: [
        ['Izin', <?php echo $count_izin; ?>],
        ['Terlambat', <?php echo $count_terlambat; ?>],
        {
          name: 'Hadir',
          y: <?php echo $count_hadir; ?>,
          sliced: true,
          selected: true
        },
        ['Bolos', <?php echo $count_bolos; ?>],
        ['Sakit', <?php echo $count_sakit; ?>],
        ['Alpa', <?php echo $count_alpa; ?>],
      ]
    }]
  });
</script>