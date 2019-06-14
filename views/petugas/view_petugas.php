<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Petugas | Inventaris</title>

	<!-- Custom CSS -->
	<link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>

	<div class="navbar">
			
	</div>

	<!-- ================= navbar sidebar ================= -->
		<?php include '../../page/dashboard/sidebar.php' ?>
	<!-- ========= end sidebar =========== -->

	<!-- ========= body ================= -->
	<div class="container">

		<div class="text-level" style="margin-top: 3%;">
			<h4>LEVEL / <?php echo $_SESSION['level']; ?></h4>
		</div>

		<div class="section">
				<div class="text-table">
						<h4>Data Petugas</h4>
				</div>

				<hr class="line">

				<div class="table">

						<div class="btn-input">
								<a href="add_petugas.php" class="btn btn-red">Tambah Data</a>
						</div>

						<table class="table-border">
							<thead>
								<tr>
									<th>NO</th>
									<th>USERNAME</th>
									<th>NAMA PETUGAS</th>
									<th>LEVEL PETUGAS</th>
									<th>AKSI</th>
								</tr>
							</thead>
							<?php
							include '../../function/f_petugas.php';

							$petugas = new Petugas;
							$no = 1;

							$no = 1;
							$p = $petugas->view(); 
							if($p < 1) {                                                                                                                                                                                              
								echo "<td colspan='5'>Belum Ada Data</td>";
							}else if($p > 1){

							foreach($p as $row){
							?>
							<tbody>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $row['username']; ?></td>
									<td><?php echo $row['nama_petugas']; ?></td>
									<td><?php echo $row['nama_level']; ?></td>
									<td>
										<a href="update_petugas.php?id=<?php echo $row['id_petugas']; ?>" class="btn btn-green">Edit</a>
										<a href="delete_petugas.php?id=<?php echo $row['id_petugas']; ?>" class="btn btn-red" onclick="return confirm('Anda Yakin Menghapus Data <?php echo $row['nama_petugas']; ?> ?');">Hapus</a>
									</td>
								</tr>
							</tbody>							
							<?php }	} ?>

						</table>
				</div>
		</div>
		
	</div>
	<!-- ============ end body =============== -->

</body>
</html>