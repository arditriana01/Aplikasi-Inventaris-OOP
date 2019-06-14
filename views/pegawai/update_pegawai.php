<?php

	include '../../function/f_pegawai.php';

	session_start();

	$pegawai = new Pegawai();
	
	if(!isset($_GET['id'])){
		echo "<script>alert('Anda Belum Memilih Data');</script>";
	}
	
	$id = $_GET['id'];
	$data = $pegawai->view_edit($id);
	
	if (isset($_POST['submit']))
	{
		$id			  = $_POST['id'];
		$nama_pegawai = $_POST['nama_pegawai'];
		$nip 		  = $_POST['nip'];
		$password 	  = $_POST['password'];
		$alamat 	  = $_POST['alamat'];
		
		$pegawai->update($id, $nama_pegawai, $nip, $password, $alamat);		
	}

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
						<h4>Edit Data Pegawai</h4>
				</div>

				<hr class="line">

				<div class="form-section">						
						<form method="post" action="">
						
						<?php
							foreach($data as $row){
						?>			
								<input type="hidden" name="id" value="<?php echo $row['id_pegawai']; ?>">
								<div class="form-input">
										<label class="form-lb">Nama Pegawai</label>
										<input type="text" name="nama_pegawai" class="form-line" placeholder="Nama Pegawai" value="<?php echo $row['nama_pegawai']; ?>">
								</div>
								
								<div class="form-input">
										<label class="form-lb">NIP</label>
										<input type="text" name="nip" class="form-line" placeholder="NIP" value="<?php echo $row['nip']; ?>">
								</div>

								<div class="form-input">
										<label class="form-lb">Password</label>
										<input type="password" name="password" class="form-line" placeholder="Password" value="<?php echo $row['password']; ?>">
								</div>
								
								<div class="form-input">
										<label class="form-lb">Alamat</label>
										<textarea class="form-line" name="alamat" placeholder="Alamat..."><?php echo $row['alamat']; ?></textarea>
								</div>

								<div class="form-btn">
										<a href="view_pegawai.php" class="link">Kembali</a>
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