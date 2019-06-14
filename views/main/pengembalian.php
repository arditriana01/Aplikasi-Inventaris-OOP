<?php
	session_start();

	include '../../function/f_pengembalian.php';

    $pengembalian = new Pengembalian();

	if(isset($_GET['id']) && isset($_GET['jumlah']) && isset($_GET['id_inventaris']) )
	{
		$id 		   = $_GET['id'];
		$jumlah		   = $_GET['jumlah'];
		$id_inventaris = $_GET['id_inventaris'];

		$kembali = $pengembalian->pengembalianBarang($id, $jumlah, $id_inventaris);
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Peminjaman | Inventaris</title>

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

        <!-- ============================ DATA PENGEMBALIAN ==================================== -->
		<div class="section">
				<div class="text-table">
						<h4>Data Pengembalian</h4>
				</div>

				<hr class="line">

				<div class="table table-responsive">

						<table class="table-border" style="width: 110%;">
							<thead>
								<tr>
									<th>NO</th>
									<th>KODE INVENTARIS</th>
									<th>NAMA BARANG</th>
									<th>JUMLAH</th>
									<th>NAMA PEGAWAI</th>
									<th>TANGGAL PINJAM</th>
									<th>TANGGAL KEMBALI</th>
									<th>STATUS PEMINJAMAN</th>
								</tr>
							</thead>
							<?php

							$no = 1;

							$pen = $pengembalian->view(); 
						
							if($pen < 1) {                                                                                                                                                                                              
								echo "<td colspan='8'>Belum Ada Data</td>";
							}else if($pen > 1){

							foreach($pen as $row){ ?>

							<tbody>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $row['kode_inventaris']; ?></td>
									<td><?php echo $row['nama']; ?></td>
									<td><?php echo $row['jumlah']; ?></td>
									<td><?php echo $row['nama_pegawai']; ?></td>
									<td><?php echo $row['tanggal_pinjam']; ?></td>
									<td><?php echo $row['tanggal_kembali']; ?></td>
									<td><?php echo $row['status_peminjaman']; ?></td>
								</tr>
							</tbody>							
							<?php } }?>

						</table>
				</div>
		</div>
		<!-- ============================ DATA PEMINJAMAN ==================================== -->

	</div>
	<!-- ============ end body =============== -->

</body>
</html>