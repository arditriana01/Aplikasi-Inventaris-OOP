<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ruang | Inventaris</title>

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
						<h4>Data Ruang</h4>
				</div>

				<hr class="line">

				<div class="table">
						
						<div class="btn-input">
								<a href="add_ruang.php" class="btn btn-red">Tambah Data</a>
						</div>
						
						<table class="table-border">
							<thead>
								<tr>
									<th>NO</th>
									<th>NAMA RUANGAN</th>
									<th>KODE RUANGAN</th>
									<th>KETERANGAN</th>
									<th>AKSI</th>
								</tr>
							</thead>

							<?php 
								include '../../function/f_ruang.php';

								$ruang = new Ruang;
								$no = 1;
								$r = $ruang->view(); 
								if($r < 1) {                                                                                                                                                                                              
									echo "<td colspan='5'>Belum Ada Data</td>";
								}else if($r > 1){								
									
								foreach($r as $row){
								?>

							<tbody>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $row['nama_ruang']; ?></td>
									<td><?php echo $row['kode_ruang']; ?></td>
									<td><?php echo $row['keterangan']; ?></td>
									<td>
										<a href="update_ruang.php?id=<?php echo $row['id_ruang']; ?>" class="btn btn-green">Edit</a>
										<a href="delete_ruang.php?id=<?php echo $row['id_ruang']; ?>" class="btn btn-red" onclick="return confirm('Anda Yakin Menghapus Ruang <?php echo $row['nama_ruang']; ?> ?')">Hapus</a>
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