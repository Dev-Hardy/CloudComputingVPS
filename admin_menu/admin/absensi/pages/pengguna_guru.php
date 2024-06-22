<?php
if (isset($_SESSION['page'])) {
} else {
	header("location: ../index.php?page=dashboard&error=true");
}
?>
<div class="content-header ml-3 mr-3">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">DAFTAR PENGGUNA GURU</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
					<li class="breadcrumb-item active">Daftar Pengguna</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>

<section class="content ml-3 mr-3">
	<div class="content">
		<div class="container-fluid">

			<div class="row">

				<div class="table">
					<table id="pegawai" class="table table-bordered table-hover dt-responsive nowrap" id="dataTables-example" style="width: 100%;">
						<thead class="bg-secondary">
							<tr>
								<th>UID</th>
								<th>NIP</th>
								<th>Nama Guru</th>
								<th>Tahun Masuk</th>
								<th>Chat ID Telegram</th>
								<th>Aksi</th>
							</tr>
						</thead>

						<tbody class="bg-white">
							<?php
							$sql = mysqli_query($dbconnect, "SELECT * FROM tb_id WHERE status_kartu='Guru' ORDER BY nama");
							while ($data = mysqli_fetch_array($sql)) {
							?>

								<tr class="odd gradeX">
									<td><?php echo $data['id']; ?></td>
									<td><?php echo $data['nisn']; ?></td>
									<td><?php echo $data['nama']; ?></td>
									<td><?php echo $data['tahun_masuk']; ?></td>
									<td><?php echo $data['chatid']; ?></td>
									<td>
										<center>
												<a href="./konfig/delete_guru.php?id=<?php echo $data['id']; ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Apakah anda yakin?')" data-toggle="tooltip" title="Hapus"><i class="fas fa-trash-alt"></i></a>
												<a href="./index.php?page=edit_guru&id=<?php echo $data['id']; ?>&nisn=<?php echo $data['nisn'];?>&tahun_masuk=<?php echo $data['tahun_masuk'];  ?>&nama=<?php echo $data['nama']; ?>&chatid=<?php echo $data['chatid']; ?>&status_kartu=<?php echo $data['status_kartu']; ?>" class="btn btn-outline-primary btn-sm ml-3" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a>
										</center>
								</td>

								</tr>

							<?php
							}
							?>
						</tbody>
					</table>

				</div>
			</div>

		</div>
	</div>
</section>
