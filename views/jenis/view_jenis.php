<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Jenis | Inventaris</title>

	<!-- Custom CSS -->
	<link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>

	<div class="navbar">
			
	</div>

	<!-- ================= navbar sidebar ================= -->
		<?php include '../../page/dashboard/sidebar.php'; ?>
	<!-- ========= end sidebar =========== -->

	<!-- ========= body ================= -->
	<div class="container">

		<div class="text-level" style="margin-top: 3%;">
			<h4>LEVEL / <?php echo $_SESSION['level']; ?></h4>
		</div>

		<div class="section">
				<div class="text-table">
						<h4>Data Jenis</h4>
				</div>

				<hr class="line">

				<div class="table">

						<div class="btn-input">
								<a href="add_jenis.php" class="btn btn-red">Tambah Data</a>
						</div>

						<table class="table-border">
							<thead>
								<tr>
									<th>NO</th>
									<th>NAMA JENIS</th>
									<th>KODE JENIS</th>
									<th>KETERANGAN</th>
									<th>AKSI</th>
								</tr>
							</thead>
							<?php
							include '../../function/f_jenis.php';

							$jenis = new Jenis;
							$no = 1; 
							$j = $jenis->view(); 
							if($j < 1) {                                                                                                                                                                                              
								echo "<td colspan='5'>Belum Ada Data</td>";
							}else if($j > 1){	

							foreach($j as $row){
							?>
							<tbody>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $row['nama_jenis']; ?></td>
									<td><?php echo $row['kode_jenis']; ?></td>
									<td><?php echo $row['keterangan']; ?></td>
									<td>
										<a href="update_jenis.php?id=<?php echo $row['id_jenis']; ?>" class="btn btn-green">Edit</a>
										<a href="delete_jenis.php?id=<?php echo $row['id_jenis']; ?>" class="btn btn-red" onclick="return confirm('Anda Yakin Menghapus Jenis <?php echo $row['nama_jenis']; ?> ?')">Hapus</a>
									</td>
								</tr>
							</tbody>

							<?php } } ?>

						</table>
				</div>
		</div>
		
	</div>
	<!-- ============ end body =============== -->

</body>
</html>