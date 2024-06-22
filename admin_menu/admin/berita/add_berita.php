<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Menu || SDN 013 Tanjungpinang Barat</title>

	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">
				<i class="fa fa-edit"></i> Tambah Data
			</h3>
		</div>
		<form action="" method="post" enctype="multipart/form-data">
			<div class="card-body">

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Judul Berita</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="judul_berita" name="judul_berita" placeholder="Masukkan Judul Berita" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Mitra</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="mitra" name="mitra" placeholder="Masukkan Mitra" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Penjelasan Berita</label>
					<div class="col-sm-10">
					<textarea class="form-control" name="penjelasan_berita" rows="8" autocomplete="off" placeholder="Masukkan Penjelasan Berita" required></textarea>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Foto Berita</label>
					<div class="col-sm-6">
						<input type="file" id="foto_berita" name="foto_berita">
						<p class="help-block">
							<font color="red">"Format file Jpg/Png"</font>
						</p>
					</div>
				</div>

			</div>
			<div class="card-footer">
				<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
				<a href="?page=data-berita" title="Kembali" class="btn btn-secondary">Batal</a>
			</div>
		</form>
	</div>

	<?php

	if (isset($_POST['Simpan'])) {
		$sumber = @$_FILES['foto_berita']['tmp_name'];
		$target = 'foto/berita/';
		$nama_file = @$_FILES['foto_berita']['name'];
		$pindah = move_uploaded_file($sumber, $target . $nama_file);
		if (!empty($sumber)) {
			$sql_simpan = "INSERT INTO berita (judul_berita, mitra, penjelasan_berita, foto_berita) VALUES (
            '" . $_POST['judul_berita'] . "',
						'" . $_POST['mitra'] . "',
						'" . $_POST['penjelasan_berita'] . "',
            '" . $nama_file . "')";
			$query_simpan = mysqli_query($koneksi, $sql_simpan);
			mysqli_close($koneksi);

			if ($query_simpan) {
				echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'data.php?page=data-berita';
          }
      })</script>";
			} else {
				echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'data.php?page=add-berita';
          }
      })</script>";
			}
		} elseif (empty($sumber)) {
			echo "<script>
		Swal.fire({title: 'Gagal, Foto Wajib Diisi',text: '',icon: 'error',confirmButtonText: 'OK'
		}).then((result) => {
			if (result.value) {
				window.location = 'data.php?page=add-berita';
			}
		})</script>";
		}
	}
	//selesai proses simpan data
	?>