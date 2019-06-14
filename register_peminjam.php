<?php
	session_start();

	if ($_POST) {
		
		include 'function/connect.php';

		$connect = new Connect();
        
        $nama_pegawai = $_POST['nama_pegawai'];
		$nip 	      = $_POST['nip'];
		$password 	  = $_POST['password'];
		$alamat       = $_POST['alamat'];

		$insertdata = $connect->register_pegawai($nama_pegawai, $nip, $password, $alamat);

		if ($insertdata) {
			echo "<script>alert('Anda Telah Register!');location.href='index.php';</script>";
		}
		else{
			echo "<script>alert('Gagal Tambah Data');</script>";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register | Inventaris</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="container-login">
	<div class="card-login">

		<h2 class="head2-login" style="margin-left: 2%; margin-top: 8%;">TAMBAH DATA PEGAWAI</h3>

			<div class="form-login">
				<form method="post">

          	<div>
				<label class="lb-login">Nama</label>
				<br>
				<input type="text" name="nama_pegawai" placeholder="Nama" class="input-form">
			</div>

	        <br>

			<div>
				<label class="lb-login">NIP</label>
				<br>
				<input type="text" name="nip" placeholder="NIP" class="input-form">
			</div>
							
			<br>

			<div>
				<label class="lb-login">Password</label>
				<br>
				<input type="password" name="password" placeholder="Password" class="input-form">
			</div>

			<br>

			<div>
				<label class="lb-login">Alamat</label>
				<br>
				<input type="text" name="alamat" placeholder="Alamat..." class="input-form">
			</div>

          	<div class="footer-login">
				<input type="submit" name="submit" class="btn btn-blue input-login" value="Register" style="font-size: 22px; margin-top: -6%;">
				<div class="login-link">
					<h4 style="margin-left:3%;">Login Sebagai<a href="index.php">  Peminjam</h4></a>
				</div>
			</div>
								
				</form>					
			</div>
	</div>
</div>

</body>
</html>