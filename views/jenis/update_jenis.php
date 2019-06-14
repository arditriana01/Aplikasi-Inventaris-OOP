<?php

	include '../../function/f_jenis.php';

	session_start();

	$jenis = new Jenis();
	
	if(!isset($_GET['id'])){
		echo "<script>alert('Anda Belum Memilih Data');</script>";
	}
	
	$id = $_GET['id'];
	$data = $jenis->view_edit($id);
	
	if (isset($_POST['submit']))
	{
		$id			= $_POST['id'];
		$nama_jenis = $_POST['nama_jenis'];
		$kode_jenis = $_POST['kode_jenis'];
		$keterangan = $_POST['keterangan'];
		
		$jenis->update($id, $nama_jenis, $kode_jenis, $keterangan);
		
	}
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
	<!-- ================================================== -->
	
	<!-- ========= body ================= -->
	<div class="container">

		<div class="text-level" style="margin-top: 3%;">
			<h4>LEVEL / <?php echo $_SESSION['level']; ?></h4>
		</div>

		<div class="section">
				<div class="text-table">
						<h4>Edit Data Jenis</h4>
				</div>

				<hr class="line">

				<div class="form-section">						
						<form method="post" action="">
						<?php
							foreach($data as $row){
						?>
								<input type="hidden" name="id" value="<?php echo $row['id_jenis']; ?>">
								<div class="form-input">
										<label class="form-lb">Jenis Barang</label>
										<input type="text" name="nama_jenis" class="form-line" placeholder="Jenis Barang" value="<?php echo $row['nama_jenis']; ?>">
								</div>
								
								<div class="form-input">
										<label class="form-lb">Kode Jenis</label>
										<input type="text" name="kode_jenis" class="form-line" placeholder="Kode Jenis" value="<?php echo $row['kode_jenis']; ?>">
								</div>

								<div class="form-input">
										<label class="form-lb">Keterangan</label>
										<textarea class="form-line" name="keterangan" placeholder="Keterangan..."><?php echo $row['keterangan']; ?></textarea>
								</div>
								
								<div class="form-btn">
										<a href="view_jenis.php" class="link">Kembali</a>
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