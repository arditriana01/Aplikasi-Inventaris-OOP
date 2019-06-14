<?php

	include "function/connect.php";
	
	session_start();
	$connect = new Connect();
	if (isset($_POST['submit'])){
	$connect->login_pegawai($_POST['nip'],
				 $_POST['password']);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login | Inventaris</title>
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="container-login">
	<div class="card-login">

		<h3 class="head-login">LOGIN</h3>
			<h4 class="head2-login">PEMINJAM</h4>

			<div class="form-login">
				<form method="post">

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

					<div class="footer-login">
						<input type="submit" name="submit" class="btn btn-red input-login" value="Login" style="font-size: 22px; margin-top: -3%;">
						<div class="login-link">
							<h4 style="margin-left:3%;">Login Sebagai<a href="login_petugas.php">  Petugas</h4></a>
							<h4>Buat Akun Baru?<a href="register_peminjam.php">  Register</h4></a>
						</div>						
					</div>

				</form>					
			</div>
	</div>
</div>

</body>
</html>