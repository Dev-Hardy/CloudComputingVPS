<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Akun Terdaftar PPDB
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr class="text-center">
						<th>No</th>
						<th>NIK</th>
						<th>Nama Pendek</th>
						<th>Email</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$no = 1;
					$sql = $koneksi->query("SELECT * from login_siswa");
					while ($data = $sql->fetch_assoc()) {
					?>

						<tr class="text-center">
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['nik']; ?>
							</td>
							<td>
								<?php echo $data['nama_pendek']; ?>
							</td>
							<td>
								<?php echo $data['email']; ?>
							</td>

							<td>
								</a>
								<a href="?page=edit-akun-ppdb&kode=<?php echo $data['id_login_siswa']; ?>" title="Ubah" class="btn btn-success btn-sm">
									<i class="fa fa-edit"></i>
								</a>
								<a href="?page=del-akun-ppdb&kode=<?php echo $data['id_login_siswa']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
									<i class="fa fa-trash"></i>
							</td>
						</tr>

					<?php
					}
					?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>
	<!-- /.card-body -->