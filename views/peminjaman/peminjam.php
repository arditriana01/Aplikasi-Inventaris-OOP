<?php 

	include '../../function/connect.php';
	session_start();

	$connect = new Connect();
	if (!isset($_SESSION['nip'])) {
		echo "<script>alert('Anda Belum Login');location.href ='../../index.php';</script>";
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard | Inventaris</title>

	<!-- Custom CSS -->
	<link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>

	<div class="navbar">
			
	</div>

	<!-- ================= navbar sidebar ================= -->
        <?php include '../../page/peminjam/menu.php' ?>
	<!-- ========= end sidebar =========== -->

	<!-- ========= body ================= -->
        <div class="container">

                <div class="text-container">
                        <h2>WELCOME / <?php echo $_SESSION['nama_pegawai']; ?></h2>
                </div>

                <div class="section">

                        <div class="logo-content">
                                <a href="../../views/main/dashboard.php" class="logo"><h4>INVENTARIS</h4></a>
                        <div>

                        <div class="text-content">
                                <h4>Aplikasi Inventaris Sarana dan Prasarana di SMK</h4>
                        </div>

                        <hr class="line" style="width: 164%; margin-left: -63%;">

                        <div class="content">
                                <p>Selamat Datang di Aplikasi Inventaris Sarana dan Prasarana SMK, aplikasi ini merupakan sebuah sistem informasi yang dapat mengatur kegiatan administrasi di SMK mulai dari manajemen data barang, pelaporan, manajemen pegawai dan sebagainya secara cepat dan akurat, sehingga aplikasi ini menjadi solusi yang tepat dalam menjalankan operasional di SMK</p>
                        </div>

                </div>

        </div>	
        <!-- ============ end body =============== -->

</body>
</html>