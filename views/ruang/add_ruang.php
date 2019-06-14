<?php
	session_start();

	if ($_POST) 
	{
		include '../../function/f_ruang.php';

		$ruang = new Ruang();

		$nama_ruang = $_POST['nama_ruang'];
		$kode_ruang = $_POST['kode_ruang'];
		$keterangan = $_POST['keterangan'];

		if(empty($nama_ruang) || empty($kode_ruang) || empty($keterangan))
		{
			echo "<script>alert('Data Tidak Boleh Kosong!');</script>";
		}
		else{
			$ruang->insert($nama_ruang, $kode_ruang, $keterangan);
		}
	}
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
						<h4>Tambah Data Ruang</h4>
				</div>

				<hr class="line">

				<div class="form-section">						
						<form method="post">								
								<div class="form-input">
										<label class="form-lb">Nama Ruang</label>
										<input type="text" name="nama_ruang" class="form-line" placeholder="Nama Ruang">
								</div>
								
								<div class="form-input">
										<label class="form-lb">Kode Ruang</label>
										<input type="text" name="kode_ruang" class="form-line" placeholder="Kode Ruang">
								</div>

								<div class="form-input">
										<label class="form-lb">Keterangan</label>
										<textarea class="form-line" name="keterangan" placeholder="Keterangan..."></textarea>
								</div>
								
								<div class="form-btn">
										<a href="view_ruang.php" class="link">Kembali</a>
										<input type="reset" name="reset" class="btn btn-grey" value="Reset" style="margin-left: 7%;">
										<input type="submit" name="submit" class="btn btn-black" value="Simpan">
								</div>
						</form>
				</div>

		</div>
		
	</div>
	<!-- ============ end body =============== -->

</body>
</html>