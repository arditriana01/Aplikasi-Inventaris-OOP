<?php
	
	session_start();
	
	if ($_POST)
	{
		include '../../function/f_level.php';

		$level = new Level();
		
		$nama_level = $_POST['nama_level'];

		if(empty($nama_level))
		{
			echo "<script>alert('Data Tidak Boleh Kosong!');</script>";
		}
		else{
			$level->insert($nama_level);
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Level | Inventaris</title>

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

		<div class="section-user">
				<div class="text-table">
						<h4>Tambah Data Level</h4>
				</div>

				<hr class="line">

				<div class="form-section">						
						<form method="post">								
								<div class="form-input">
										<label class="form-lb">Nama Level</label>
										<input type="text" name="nama_level" class="form-line" placeholder="Nama Level">
								</div>
																
								<div class="form-btn" style="margin-left:-7%">
										<input type="reset" name="reset" class="btn btn-grey" value="Reset" style="margin-left: 7%;">
										<input type="submit" name="submit" class="btn btn-black" value="Simpan">
								</div>
						</form>
				</div>

		</div>		

		<div class="section-user" style="position:absolute;">
				<div class="text-table">
						<h4>Data Level</h4>
				</div>

				<hr class="line">

				<div class="table">

						<table class="table-border">
							<thead>
								<tr>
									<th>NO</th>
									<th>NAMA LEVEL</th>
									<th>AKSI</th>
								</tr>
							</thead>
							<?php 
							include '../../function/f_level.php';

							$level = new Level;
							$no = 1;

							$no = 1;
							$l = $level->view(); 
							if($l < 1) {                                                                                                                                                                                              
								echo "<td colspan='3'>Belum Ada Data</td>";
							}else if($l > 1){
															
							foreach($l as $row){
							?>
							<tbody>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $row['nama_level']; ?></td>
									<td>
										<a href="update_level.php?id=<?php echo $row['id_level']; ?>" class="btn btn-green">Edit</a>
										<a href="delete_level.php?id=<?php echo $row['id_level']; ?>" class="btn btn-red" onclick="return confirm('Anda Yakin Menghapus Level <?php echo $row['nama_level']; ?> ?')";>Hapus</a>
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