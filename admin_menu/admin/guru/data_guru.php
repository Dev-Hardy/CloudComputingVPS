<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Guru</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div align="center">
				<a href="?page=add-guru" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr class="text-center">
						<th>No</th>
						<th>Foto</th>
						<th>NIP</th>
						<th>Nama</th>
						<th>Alamat</th>
						<th>Status</th>
						<th>Jenis PTK</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
						  $sql = $koneksi->query("SELECT * from data_guru");
              while ($data= $sql->fetch_assoc()) {
            ?>

					<tr class="text-center">
						<td>
							<?php echo $no++; ?>
						</td>
						<td align="center">
							<img src="foto/guru/<?php echo $data['foto_guru']; ?>" width="70px" />
						</td>
						<td>
							<?php echo $data['nip_guru']; ?>
						</td>
						<td>
							<?php echo $data['nama_guru']; ?>
						</td>
						<td>
							<?php echo $data['alamat_guru']; ?>
						</td>
						<td>
							<?php echo $data['status_kepegawaian']; ?>
						</td>
						<td>
							<?php echo $data['jenis_ptk']; ?>
						</td>

						<td>
							<a href="?page=view-guru&kode=<?php echo $data['id_guru']; ?>" title="Detail"
							 class="btn btn-info btn-sm">
								<i class="fa fa-eye"></i>
							</a>
							</a>
							<a href="?page=edit-guru&kode=<?php echo $data['id_guru']; ?>" title="Ubah" class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=del-guru&kode=<?php echo $data['id_guru']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
							 title="Hapus" class="btn btn-danger btn-sm">
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