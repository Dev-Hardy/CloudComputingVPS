<?php
if (isset($_SESSION['ses_id_login_siswa'])) {
    // Ambil ID login siswa dari sesi
    $id_login_siswa = $_SESSION['ses_id_login_siswa'];

    // Lakukan koneksi ke database dan pastikan koneksi disetel dengan benar
    $koneksi = mysqli_connect("localhost", "root", "", "ppdb_sd13");

    if (!$koneksi) {
        die("Koneksi ke database gagal: " . mysqli_connect_error());
    }

    // Query untuk mengambil data siswa dan ayah berdasarkan ID login siswa
    $sql = $koneksi->query("SELECT biodata_siswa.*, biodata_ibu.*
        FROM biodata_siswa
        INNER JOIN biodata_ibu ON biodata_siswa.id_siswa = biodata_ibu.id_siswa
        WHERE biodata_siswa.id_login_siswa = $id_login_siswa");

    if ($sql) {
        $data_cek = $sql->fetch_assoc(); // Ambil data dari hasil kueri
    } else {
        die("Error dalam pengambilan data: " . mysqli_error($koneksi));
    }
}
?>

<div class="row text-center">

	<div align="center" class="col-md-8 mx-auto">
		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title">Detail Biodata Ibu</h3>

				<div class="card-tools">
				</div>
			</div>
			<div class="card-body p-0">
				<table class="table">
					<tbody>
						<tr>
							<td style="width: 180px">
								<b>Nama Ibu</b>
							</td>
							<td>:
								<?php echo $data_cek['nama_ibu']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 180px">
								<b>Tempat Lahir</b>
							</td>
							<td>:
								<?php echo $data_cek['tempat_lahir_ibu']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 180px">
								<b>Tanggal Lahir</b>
							</td>
							<td>:
								<?php echo $data_cek['tgl_lahir_ibu']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 180px">
								<b>Alamat</b>
							</td>
							<td>:
								<?php echo $data_cek['alamat_ibu']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 180px">
								<b>No Hp</b>
							</td>
							<td>:
								<?php echo $data_cek['no_hp_ibu']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 180px">
								<b>Pekerjaan Ibu</b>
							</td>
							<td>:
								<?php echo $data_cek['pekerjaan_ibu']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 180px">
								<b>Pendidikan Terakhir</b>
							</td>
							<td>:
								<?php echo $data_cek['pend_terakhir_ibu']; ?>
							</td>
						</tr>
					</tbody>
				</table>
				<div class="card-footer">
					<a href="?page=data-ibu" class="btn btn-warning">Kembali</a>

					<a href="./report/cetak-pegawai.php?nip=<?php echo $data_cek['id_ibu']; ?>" target=" _blank" title="Cetak Data Siswa" class="btn btn-primary">Print</a>
				</div>
			</div>
		</div>
	</div>

</div>