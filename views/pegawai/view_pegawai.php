<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pegawai | Inventaris</title>

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
						<h4>Data Pegawai</h4>
				</div>

				<hr class="line">

				<div class="table">						

						<table class="table-border">
							<thead>
								<tr>
									<th>NO</th>
									<th>NIP</th>
									<th>NAMA PEGAWAI</th>
									<th>ALAMAT</th>
									<th>AKSI</th>
								</tr>
							</thead>
							<?php 
							include '../../function/f_pegawai.php';

							$pegawai = new Pegawai;
							$no = 1;

							$no = 1;
							$pe = $pegawai->view(); 
							if($pe < 1) {                                                                                                                                                                                              
								echo "<td colspan='5'>Belum Ada Data</td>";
							}else if($pe > 1){

							foreach($pe as $row){
							?>
							<tbody>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $row['nip']; ?></td>
									<td><?php echo $row['nama_pegawai']; ?></td>
									<td><?php echo $row['alamat']; ?></td>
									<td>
										<a href="update_pegawai.php?id=<?php echo $row['id_pegawai']; ?>"" class="btn btn-green">Edit</a>
										<a href="delete_pegawai.php?id=<?php echo $row['id_pegawai']; ?>" class="btn btn-red" onclick="return confirm('Anda Yakin Menghapus Pegawai <?php echo $row['nama_pegawai']; ?> ?');">Hapus</a>
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