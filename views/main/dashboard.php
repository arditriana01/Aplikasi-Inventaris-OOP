<?php 

	include '../../function/connect.php';
	session_start();

	$connect = new Connect();
	if (!isset($_SESSION['level'])) {
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
		<?php include '../../page/dashboard/sidebar.php'; ?>
	<!-- ========= end sidebar =========== -->

	<!-- ========= body ================= -->
		<?php include '../../page/dashboard/dashboard.php'; ?>
	<!-- ============ end body =============== -->

</body>
</html>