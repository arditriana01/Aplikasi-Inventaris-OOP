<?php
	session_start();

	if ($_POST) 
	{
		include '../../function/f_jenis.php';

		$jenis = new Jenis();

		$nama_jenis   = $_POST['nama_jenis'];
		$kode_jenis   = $_POST['kode_jenis'];
		$keterangan   = $_POST['keterangan'];

		if(empty($nama_jenis) || empty($kode_jenis) || empty($keterangan))
		{
			echo "<script>alert('Data Tidak Boleh Kosong!');</script>";
		}
		else{
			$jenis->insert($nama_jenis, $kode_jenis, $keterangan);
		}
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
	<!-- ========= end sidebar =========== -->

	<!-- ========= body ================= -->
	<div class="container">

		<div class="text-level" style="margin-top: 3%;">
			<h4>LEVEL / <?php echo $_SESSION['level']; ?></h4>
		</div>

		<div class="section">
				<div class="text-table">
						<h4>Tambah Data Jenis</h4>
				</div>

				<hr class="line">

				<div class="form-section">						
						<form method="post">								
								<div class="form-input">
										<label class="form-lb">Jenis Barang</label>
										<input type="text" name="nama_jenis" class="form-line" placeholder="Jenis Barang">
								</div>
								
								<div class="form-input">
										<label class="form-lb">Kode Jenis</label>
										<input type="text" name="kode_jenis" class="form-line" placeholder="Kode Jenis">
								</div>

								<div class="form-input">
										<label class="form-lb">Keterangan</label>
										<textarea class="form-line" name="keterangan" placeholder="Keterangan..."></textarea>
								</div>
								
								<div class="form-btn">
										<a href="view_jenis.php" class="link">Kembali</a>
										<input type="reset" name="" class="btn btn-grey" value="Reset" style="margin-left: 7%;">
										<input type="submit" name="" class="btn btn-black" value="Simpan">
								</div>
						</form>
				</div>

		</div>
		
	</div>
	<!-- ============ end body =============== -->

</body>
</html>