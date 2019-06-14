<?php

	session_start();

	include '../../function/f_inventaris.php';

	$inventaris = new Inventaris();
	
	if (!isset($_GET['id'])) 
	{
		echo "<script>alert('Data Belum Dipilih');location.href='view_inventaris.php';</script>";
	}	

	$id = $_GET['id'];
	$data = $inventaris->view_edit($id);

	if(@($_POST['submit']))
	{
		$id 				= $_POST['id'];
		$nama 				= $_POST['nama'];
		$kondisi 			= $_POST['kondisi'];
		$keterangan			= $_POST['keterangan'];
		$jumlah 			= $_POST['jumlah'];
		$jenis 				= $_POST['jenis'];
		$tanggal_register 	= $_POST['tanggal_register'];
		$ruang 				= $_POST['ruang'];
		$kode_inventaris	= $_POST['kode_inventaris'];
		$petugas 			= $_POST['petugas'];

		$inventaris->update($id, $nama, $kondisi, $keterangan, $jumlah, $jenis, $tanggal_register, $ruang,$kode_inventaris, $petugas);
	}
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
					<h4>Edit Data Inventaris</h4>
			</div>

			<hr class="line">

			<div class="form-section">						
				
				<form method="post">
						
					<?php
						foreach ($data as $row){
					?>

					<input type="hidden" name="id" value="<?php echo $row['id_inventaris']; ?>">		
								
					<div class="form-input">
							<label class="form-lb">Nama Barang</label>
							<input type="text" name="nama" class="form-line" placeholder="Nama Barang" value="<?php echo $row['nama']; ?>">
					</div>

					<div class="form-input">
							<label class="form-lb">Kondisi Barang</label>
							<input type="text" name="kondisi" class="form-line" placeholder="Kondisi Barang" value="<?php echo $row['kondisi']; ?>">
					</div>								

					<div class="form-input">
							<label class="form-lb">Keterangan</label>
							<textarea class="form-line" name="keterangan" placeholder="Keterangan..."><?php echo $row['keterangan']; ?></textarea>
					</div>

					<div class="form-input">
							<label class="form-lb">Jumlah</label>
							<input type="text" name="jumlah" class="form-line" placeholder="Jumlah" value="<?php echo $row['jumlah']; ?>">
					</div>																

					<div class="form-input">
							<label class="form-lb">Jenis Barang</label>
							<select name="jenis">
									<option value="">Pilih Jenis</option>
									<option value="<?php echo $row['id_jenis']; ?>" selected><?php echo $row['nama_jenis']; ?></option>
							</select>
					</div>

					<div class="form-input">
							<label class="form-lb">Tanggal Registrasi</label>
							<input type="date" name="tanggal_register" class="form-line" value="<?php echo $row['tanggal_register']; ?>">
					</div>

					<div class="form-input">
							<label class="form-lb">Ruang</label>
							<select name="ruang">
									<option value="">Pilih Ruang</option>
									<option value="<?php echo $row['id_ruang']; ?>" selected><?php echo $row['nama_ruang']; ?></option>
							</select>
					</div>

					<div class="form-input">
							<label class="form-lb">Kode Inventaris</label>
							<input type="text" name="kode_inventaris" class="form-line" placeholder="Kode Inventaris" value="<?php echo $row['kode_inventaris']; ?>">
					</div>

					<div class="form-input">
							<label class="form-lb">Petugas</label>
							<select name="petugas">
									<option value="">Pilih Petugas</option>
									<option value="<?php echo $row['id_petugas']; ?>" selected><?php echo $row['username']; ?></option>
							</select>
					</div>

					<div class="form-btn">
							<a href="view_inventaris.php" class="link">Kembali</a>
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