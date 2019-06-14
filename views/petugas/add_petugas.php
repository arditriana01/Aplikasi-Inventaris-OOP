<?php
	session_start();

	if ($_POST) 
	{	
		include '../../function/f_petugas.php';

		$petugas = new Petugas();

		$username 	  = $_POST['username'];
		$password 	  = $_POST['password'];
		$nama_petugas = $_POST['nama_petugas'];
		$level 		  = $_POST['level'];

		if(empty($username) || empty($password) || empty($nama_petugas) || empty($level))
		{
			echo "<script>alert('Data Tidak Boleh Kosong!');</script>";
		}
		else{
			$petugas->insert($username, $password, $nama_petugas, $level);
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Petugas | Inventaris</title>

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
						<h4>Tambah Data Petugas</h4>
				</div>

				<hr class="line">

				<div class="form-section">						
						<form method="post">								
								<div class="form-input">
										<label class="form-lb">Username</label>
										<input type="text" name="username" class="form-line" placeholder="Username">
								</div>
								
								<div class="form-input">
										<label class="form-lb">Password</label>
										<input type="password" name="password" class="form-line" placeholder="Password">
								</div>

								<div class="form-input">
										<label class="form-lb">Nama Petugas</label>
										<input type="text" name="nama_petugas" class="form-line" placeholder="Nama Petugas">
								</div>
								
								<div class="form-input">
										<label class="form-lb">Level</label>
										<select name="level">
												<option value="">Pilih Level</option>
												<?php
													include '../../function/f_level.php';

													$level = new Level;
													foreach($level->view() as $row){
												?>
                                   					<option value="<?php  echo $row['id_level'] ?>"><?php echo $row['nama_level'] ?></option>
												<?php } ?>
										</select>
								</div>

								<div class="form-btn">
										<a href="view_petugas.php" class="link">Kembali</a>
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