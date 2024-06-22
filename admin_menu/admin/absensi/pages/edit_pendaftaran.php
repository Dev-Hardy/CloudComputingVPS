<?php
if (isset($_SESSION['page'])) {
    if (isset($_GET['id']) && isset($_GET['nisn']) && isset($_GET['tahun_masuk']) && isset($_GET['nama']) && isset($_GET['status_kartu']) && isset($_GET['chatid'])) {
        // lanjut
    } else {
        echo '<h3><center> Permintaan ditolak :( </center></h3>';
        exit;
    }
} else {
    header("location: ../index.php?page=dashboard&error=true");
}

$uid = $_GET['id'];
$nisn = $_GET['nisn'];
$nama = $_GET['nama'];
$tahun_masuk = $_GET['tahun_masuk'];
$chatid = $_GET['chatid'];
$status_kartu = $_GET['status_kartu'];
$tampung_uid = $uid;
?>

<div class="content-header ml-3 mr-3">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">EDIT PENDAFTARAN KARTU</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php?page=pendaftaran">Pendaftaran</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content ml-3 mr-3">
    <div class="content">
        <div class="container-fluid">
            <form action="./konfig/update_pendaftaran.php" method="POST">
                <div class="form-group">
                    <input type="hidden" name="parameter" value="<?php echo $tampung_uid; ?>">
                    <label for="uid">UID</label>
                    <input required class="form-control" type="text" name="uid" placeholder="Masukan UID" value="<?php echo $uid ?>">
                    <small id="emailHelp" class="form-text text-muted">UID yang terdaftar</small>
                </div>
								<div class="form-group">
                    <label for="nisn">NIP</label>
                    <input required type="text" class="form-control" name="nisn" placeholder="Masukan NIP" value="<?php echo $nisn ?>">
                </div>
                <div class="form-group">
                    <label for="nama">Nama Guru</label>
                    <input required class="form-control" type="text" name="nama" placeholder="Masukan nama" value="<?php echo $nama ?>">
                    <small id="emailHelp" class="form-text text-muted">Nama guru harus sesuai dengan pemilik UID</small>
                </div>
								<div class="form-group">
                    <label for="tahun_masuk">Tahun Masuk</label>
                    <input required type="text" class="form-control" name="tahun_masuk" placeholder="Masukan Tahun Masuk" value="<?php echo $tahun_masuk ?>">
                </div>
                <div class="form-group">
                    <label for="chatid">Chat ID Akun Telegram</label>
                    <input required type="text" class="form-control" name="chatid" aria-describedby="emailHelp" placeholder="Masukan Chat ID" value="<?php echo $chatid ?>">
                    <small id="emailHelp" class="form-text text-muted">Chat ID akun telegram pengguna</small>
                </div>
                <div class="form-group">
                    <label for="status_kartu">Status Kartu</label>
                    <select required class="form-control" name="status_kartu">
                        <option value="Guru" <?php if($status_kartu == 'Guru') echo 'selected'; ?>>Guru</option>
                        <option value="Siswa" <?php if($status_kartu == 'Siswa') echo 'selected'; ?>>Siswa</option>
                    </select>
                    <small id="emailHelp" class="form-text text-muted">Pilih status kartu</small>
                </div>      
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-outline-primary mt-3" value="simpan">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>
