<?php

	include '../../function/f_level.php';

	session_start();

	$level = new Level();
	
	if(!isset($_GET['id'])){
		echo "<script>alert('Anda Belum Memilih Data');</script>";
	}
	
	$id = $_GET['id'];
	$data = $level->view_edit($id);
	
	if (isset($_POST['submit']))
	{
		$id			= $_POST['id'];
		$nama_level = $_POST['nama_level'];
		
		$level->update($id, $nama_level);
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
		<?php include '../../page/dashboard/sidebar.php'; ?>
	<!-- ========= end sidebar =========== -->

	<!-- ========= body ================= -->
	<div class="container">

		<div class="text-level" style="margin-top: 3%;">
			<h4>LEVEL / <?php echo $_SESSION['level']; ?></h4>
		</div>

		<div class="section">
				<div class="text-table">
						<h4>Edit Data Level</h4>
				</div>

				<hr class="line">

				<div class="form-section">						
						<form method="POST" action="">
						<?php
							foreach($data as $row){
						?>						
							<input type="hidden" name="id" value="<?php echo $row['id_level']; ?>">
								<div class="form-input">
										<label class="form-lb">Nama Level</label>
										<input type="text" name="nama_level" class="form-line" placeholder="Nama Level" value="<?php echo $row['nama_level']; ?>">
								</div>
																
								<div class="form-btn">
										<a href="view_level.php" class="link">Kembali</a>
										<input type="reset" name="reset" class="btn btn-grey" value="Reset" style="margin-left: 7%;">
										<input type="submit" name="submit" class="btn btn-black" value="Edit">
								</div>
							<?php } ?>
						</form>
				</div>

		</div>
		
	</div>
	<!-- ============ end body =============== -->

</body>
</html>