<?php
	// session dimulai
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Inventaris | Inventaris</title>

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
					<h4>Data Inventaris</h4>
			</div>

			<hr class="line">

			<div class="btn-input">
				<a href="add_inventaris.php" class="btn btn-red">Tambah Data</a>
			</div>

			<div class="table table-responsive" style="margin-top: -1%;">						

				<table class="table-border" style="width: 160%">
					<thead>
						<tr>
							<th>NO</th>
							<th>KODE INVENTARIS</th>
							<th>NAMA</th>
							<th>JENIS</th>
							<th>RUANG ASAL</th>
							<th>KONDISI</th>
							<th>JUMLAH</th>
							<th>TANGGAL REGISTRASI</th>
							<th>KETERANGAN</th>
							<th>NAMA PETUGAS</th>
							<th>AKSI</th>
						</tr>
					</thead>

					<?php
						// pemanggilan file f_inventaris.php
						include '../../function/f_inventaris.php';

						// pemanggilan class
						$inventaris = new Inventaris;

						// deklarasi variabel no
						$no = 1;
						$i = $inventaris->view(); 
						if($i < 1) {                                                                                                                                                                                              
							echo "<td colspan='10'>Belum Ada Data</td>";
						}else if($i > 1){						
						foreach($i as $row){
					?>
					
					<tbody>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $row['kode_inventaris']; ?></td>
							<td><?php echo $row['nama']; ?></td>
							<td><?php echo $row['nama_jenis']; ?></td>
							<td><?php echo $row['nama_ruang']; ?></td>
							<td><?php echo $row['kondisi']; ?></td>
							<td><?php echo $row['jumlah']; ?></td>
							<td><?php echo $row['tanggal_register']; ?></td>
							<td><?php echo $row['keterangan']; ?></td>
							<td><?php echo $row['username']; ?></td>
							<td>
								<a href="update_inventaris.php?id=<?php echo $row['id_inventaris']; ?>" class="btn btn-green">Edit</a>
								<a href="delete_inventaris.php?id=<?php echo $row['id_inventaris']; ?>" class="btn btn-red" onclick="return confirm('Anda Yakin Menghapus Data <?php echo $row['nama']; ?> ?')">Hapus</a>
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