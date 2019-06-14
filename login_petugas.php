<?php
	// digunakan untuk memanggil file connect.php
	include "function/connect.php";
	
	// session dimulai
	session_start();

	// pemanggilan class conect
	$connect = new Connect();

	// insert data
	if (isset($_POST['submit']))
	{
	$connect->login($_POST['username'],
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
			<h4 class="head2-login" style="margin-left: 23%;">PETUGAS</h4>

			<div class="form-login">
				<form method="post">

					<div>
						<label class="lb-login">Username</label>
						<br>
						<input type="text" name="username" placeholder="Username" class="input-form">
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
							<h4 style="margin-left:3%;">Login Sebagai<a href="index.php">  Peminjam</h4></a>
						</div>						
					</div>

				</form>					
			</div>
	</div>
</div>

</body>
</html>