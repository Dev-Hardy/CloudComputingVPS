<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Berita SDN 013 Tanjungpinang Barat</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div align="center">
				<a href="?page=add-berita" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr class="text-center">
						<th>No</th>
						<th>Foto</th>
						<th>Judul</th>
						<th>Mitra</th>
						<th>Berita</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
						  $sql = $koneksi->query("SELECT * from berita");
              while ($data= $sql->fetch_assoc()) {
            ?>

					<tr class="text-center">
						<td>
							<?php echo $no++; ?>
						</td>
						<td align="center">
							<img src="foto/berita/<?php echo $data['foto_berita']; ?>" width="70px" />
						</td>
						<td>
							<?php echo $data['judul_berita']; ?>
						</td>
						<td>
							<?php echo $data['mitra']; ?>
						</td>
						<td>
							<?php echo $data['penjelasan_berita']; ?>
						</td>

						<td>
							<a href="?page=view-berita&kode=<?php echo $data['id_berita']; ?>" title="Detail"
							 class="btn btn-info btn-sm">
								<i class="fa fa-eye"></i>
							</a>
							</a>
							<a href="?page=edit-berita&kode=<?php echo $data['id_berita']; ?>" title="Ubah" class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=del-berita&kode=<?php echo $data['id_berita']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
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