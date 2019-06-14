<?php
	// session dimulai
	session_start();
	date_default_timezone_set('Asia/Jakarta');

	// pemanggilan file f_inventaris.php
	include '../../function/f_inventaris.php';

	// pemanggilan class
	$inventaris = new Inventaris;

	// insert data
	if ($_POST) 
	{
		$nama_barang 	  = $_POST['nama_barang'];
		$kondisi_barang   = $_POST['kondisi_barang'];
		$keterangan 	  = $_POST['keterangan'];
		$jumlah 		  = $_POST['jumlah'];
		$jenis 			  = $_POST['jenis'];
		$tanggal_register = $_POST['tanggal_register'];
		$ruang 			  = $_POST['ruang'];
		$kode_inventaris  = $_POST['kode_inventaris'];
		$petugas 		  = $_POST['petugas'];

		// validasi data tidak boleh ksong
		if(empty($nama_barang) || empty($kondisi_barang)   || empty($keterangan) || empty($jumlah) || 
		   empty($jenis) 	   || empty($tanggal_register) || empty($ruang)		 || empty($kode_inventaris) || empty($petugas))
		{
			echo "<script>alert('Data Tidak Boleh Kosong!');</script>";
		}
		else{
			$inventaris->insert($nama_barang, $kondisi_barang, $keterangan, $jumlah, $jenis, $tanggal_register, $ruang, $kode_inventaris, $petugas);
		}
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
		<?php include '../../page/dashboard/sidebar.php'; ?>
	<!-- ========= end sidebar =========== -->

	<!-- ========= body ================= -->
	<div class="container">

		<div class="text-level" style="margin-top: 3%;">
			<h4>LEVEL / <?php echo $_SESSION['level']; ?></h4>
		</div>

		<div class="section">
			<div class="text-table">
					<h4>Tambah Data Inventaris</h4>
			</div>

			<hr class="line">

			<div class="form-section">						
				
				<form method="post">		
					
					<div class="form-input">
							<label class="form-lb">Nama Barang</label>
							<input type="text" name="nama_barang" class="form-line" placeholder="Nama Barang">
					</div>

					<div class="form-input">
							<label class="form-lb">Kondisi Barang</label>
							<input type="text" name="kondisi_barang" class="form-line" placeholder="Kondisi Barang">
					</div>								

					<div class="form-input">
							<label class="form-lb">Keterangan</label>
							<textarea class="form-line" name="keterangan" placeholder="Keterangan..."></textarea>
					</div>

					<div class="form-input">
							<label class="form-lb">Jumlah</label>
							<input type="text" name="jumlah" class="form-line" placeholder="Jumlah">
					</div>																

					<div class="form-input">
						<label class="form-lb">Jenis Barang</label>
							<select name="jenis">
								<option value="">Pilih Jenis</option>
									<?php
										foreach($inventaris->getJenis() as $row){
									?>
                                   		<option value="<?php  echo $row['id_jenis'] ?>"><?php echo $row['nama_jenis'] ?></option>
									<?php } ?>												
							</select>
					</div>

					<div class="form-input">
							<label class="form-lb">Tanggal Registrasi</label>
							<input type="date" name="tanggal_register" class="form-line" value="<?php echo date('Y-m-d');?>">
					</div>

					<div class="form-input">
						<label class="form-lb">Ruang</label>
							<select name="ruang">
								<option value="">Pilih Ruang</option>
								<?php
									foreach($inventaris->getRuang() as $row){
								?>
                                   	<option value="<?php  echo $row['id_ruang'] ?>"><?php echo $row['nama_ruang'] ?></option>
								<?php } ?>
							</select>
					</div>

					<div class="form-input">
							<label class="form-lb">Kode Inventaris</label>
							<input type="text" name="kode_inventaris" class="form-line" placeholder="Kode Inventaris">
					</div>

					<div class="form-input">
						<label class="form-lb">Petugas</label>
							<select name="petugas"> 
								<option value="">Pilih Petugas</option>
								<?php
										foreach($inventaris->getPetugas() as $row){
									?>
                                   		<option value="<?php  echo $row['id_petugas'] ?>"><?php echo $row['nama_petugas'] ?></option>
									<?php } ?>
							</select>
					</div>

					<div class="form-btn">
						<a href="view_inventaris.php" class="link">Kembali</a>
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