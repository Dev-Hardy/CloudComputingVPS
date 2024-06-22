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
					<label class="col-sm-2 col-form-label">NIP</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="nip_guru" name="nip_guru" placeholder="Masukkan NIP Guru" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Nama Guru</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="nama_guru" name="nama_guru" placeholder="Masukkan Nama Guru" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Tempat Lahir</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="tempat_lahir_guru" name="tempat_lahir_guru" placeholder="Masukkan Tempat Lahir" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Tanggal Lahir</label>
					<div class="col-sm-5">
						<input type="date" class="form-control" id="tgl_lahir_guru" name="tgl_lahir_guru" placeholder="Masukkan Tanggal Lahir" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Alamat</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="alamat_guru" name="alamat_guru" placeholder="Masukkan Alamat Domisili" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
					<div class="col-sm-5">
						<select name="jk_guru" id="jk_guru" class="form-control">
							<option>- Pilih -</option>
							<option>Laki-Laki</option>
							<option>Perempuan</option>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">No HP</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="no_hp_guru" name="no_hp_guru" placeholder="Masukkan No HP" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Status Kepegawaian</label>
					<div class="col-sm-5">
						<select name="status_kepegawaian" id="status_kepegawaian" class="form-control">
							<option>- Pilih -</option>
							<option>Pegawai</option>
							<option>PPPK</option>
							<option>Honorer</option>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Jenis PTK</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="jenis_ptk" name="jenis_ptk" placeholder="Masukkan Jenis PTK" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Jurusan/Prodi</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="jurusan_guru" name="jurusan_guru" placeholder="Masukkan Jurusan Asal" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Kompetensi</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="kompetensi_guru" placeholder="Input - jika tidak ada data kompetensi" name="kompetensi_guru" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Kata Pengantar</label>
					<div class="col-sm-10">
					<textarea class="form-control" name="kata_pengantar" rows="8" autocomplete="off" placeholder="Input - jika tidak ada kata pengantar" required></textarea>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Foto Guru</label>
					<div class="col-sm-6">
						<input type="file" id="foto_guru" name="foto_guru">
						<p class="help-block">
							<font color="red">"Format file Jpg/Png"</font>
						</p>
					</div>
				</div>

			</div>
			<div class="card-footer">
				<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
				<a href="?page=data-guru" title="Kembali" class="btn btn-secondary">Batal</a>
			</div>
		</form>
	</div>

	<?php

	if (isset($_POST['Simpan'])) {
		$sumber = @$_FILES['foto_guru']['tmp_name'];
		$target = 'foto/guru/';
		$nama_file = @$_FILES['foto_guru']['name'];
		$pindah = move_uploaded_file($sumber, $target . $nama_file);
		if (!empty($sumber)) {
			$sql_simpan = "INSERT INTO data_guru (nip_guru, nama_guru, tempat_lahir_guru, tgl_lahir_guru, alamat_guru, jk_guru, no_hp_guru, status_kepegawaian, jenis_ptk, jurusan_guru, kompetensi_guru, kata_pengantar, foto_guru) VALUES (
            '" . $_POST['nip_guru'] . "',
						'" . $_POST['nama_guru'] . "',
						'" . $_POST['tempat_lahir_guru'] . "',
						'" . $_POST['tgl_lahir_guru'] . "',
						'" . $_POST['alamat_guru'] . "',
						'" . $_POST['jk_guru'] . "',
						'" . $_POST['no_hp_guru'] . "',
						'" . $_POST['status_kepegawaian'] . "',
						'" . $_POST['jenis_ptk'] . "',
						'" . $_POST['jurusan_guru'] . "',
						'" . $_POST['kompetensi_guru'] . "',
						'" . $_POST['kata_pengantar'] . "',
            '" . $nama_file . "')";
			$query_simpan = mysqli_query($koneksi, $sql_simpan);
			mysqli_close($koneksi);

			if ($query_simpan) {
				echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'data.php?page=data-guru';
          }
      })</script>";
			} else {
				echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'data.php?page=add-guru';
          }
      })</script>";
			}
		} elseif (empty($sumber)) {
			echo "<script>
		Swal.fire({title: 'Gagal, Foto Wajib Diisi',text: '',icon: 'error',confirmButtonText: 'OK'
		}).then((result) => {
			if (result.value) {
				window.location = 'data.php?page=add-guru';
			}
		})</script>";
		}
	}
	//selesai proses simpan data
	?>