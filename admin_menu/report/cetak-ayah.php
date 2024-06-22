<?php
include "../inc/koneksi.php";

// Periksa apakah 'id_ayah' sudah diatur dalam $_GET
$id_ayah = isset($_GET['id_ayah']) ? $_GET['id_ayah'] : '';

if ($id_ayah != '') {
    $sql_cek = "SELECT * FROM tb_profil";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);

    if ($data_cek) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <title>CETAK DATA AYAH</title>
        </head>
        <body>
            <center>
                <h2><?php echo $data_cek['nama_profil']; ?></h2>
                <h3><?php echo $data_cek['alamat']; ?></h3>
                <hr size="2px" color="black">
            </center>

        <?php
        $sql_tampil = "SELECT biodata_siswa.*, biodata_ayah.*
                       FROM biodata_siswa
                       LEFT JOIN biodata_ayah ON biodata_siswa.id_siswa = biodata_ayah.id_siswa
                       WHERE biodata_ayah.id_ayah='" . $id_ayah . "'";
        $query_tampil = mysqli_query($koneksi, $sql_tampil);

        while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) {
            ?>
            <center>
                <h3>DATA SISWA <br> <?php echo $data['nama_siswa']; ?></h3>
            </center>

            <table cellspacing="0" style="width: 90%" align="center">
                <tbody class="text-center">
                    <!-- Isi baris-baris tabel Anda di sini -->
                    <tr>
                        <td>Nama Ayah</td>
                        <td>:</td>
                        <td><?php echo $data['nama_ayah']; ?></td>
                    </tr>
                    <tr>
						<td>Tempat, Tanggal Lahir </td>
						<td>:</td>
						<td>
						<?php echo $data['tempat_lahir_ayah'] . ', ' . $data['tgl_lahir_ayah']; ?>
						</td>
					</tr>
					<tr>
						<td>Alamat Ayah</td>
						<td>:</td>
						<td>
							<?php echo $data['alamat_ayah']; ?>
						</td>
					</tr>
					<tr>
						<td>No Hp</td>
						<td>:</td>
						<td>
							<?php echo $data['no_hp_ayah']; ?>
						</td>
					</tr>
					<tr>
						<td>Pekerjaan</td>
						<td>:</td>
						<td>
							<?php echo $data['pekerjaan_ayah']; ?>
						</td>
					</tr>
					<tr>
						<td>Pendidikan Terakhir</td>
						<td>:</td>
						<td>
							<?php echo $data['pendidikan_terakhir']; ?>
						</td>
					</tr>
                </tbody>
            </table>
        <?php
        }
        ?>
        <script>
            window.print();
        </script>
        </body>
        </html>
    <?php
    } else {
        // Handle kasus jika 'id_ayah' tidak ditemukan
        echo "Data Profil Tidak Ditemukan.";
    }
} else {
    // Handle kasus jika 'id_ayah' tidak diatur
    die("Parameter 'id_ayah' tidak ditemukan.");
}
?>
