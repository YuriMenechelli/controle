<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Controle</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?= base_url('public/login/images/icons/favicon.ico')?>"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('public/login/vendor/bootstrap/css/bootstrap.min.css')?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('public/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('public/login/fonts/iconic/css/material-design-iconic-font.min.css')?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('public/login/vendor/animate/animate.css')?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('public/login/vendor/css-hamburgers/hamburgers.min.css')?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('public/login/vendor/animsition/css/animsition.min.css')?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('public/login/vendor/select2/select2.min.css')?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('public/login/vendor/daterangepicker/daterangepicker.css')?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('public/login/css/util.css')?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('public/login/css/main.css')?>">
	<!--===============================================================================================-->
</head>
<body>

<div class="limiter">
	<div class="container-login100">
		<div class="wrap-login100">

			<?php
			echo validation_errors('<div class="alert alert-danger" role="alert">','</div>');
			echo getMsg('msgLogin');
			?>

			<form class="login100-form validate-form" action="" method="post">
					<span class="login100-form-title p-b-26">
						Bem-Vindo!
					</span>
				<span class="login100-form-title p-b-48">
						<i class="zmdi zmdi-account"></i>
					</span>

				<div class="wrap-input100 validate-input" data-validate = "Digite um E-mail válido!">
					<input class="input100" type="email" name="email">
					<span class="focus-input100" data-placeholder="E-mail"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Digite uma Senha!">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
					<input class="input100" type="password" name="senha">
					<span class="focus-input100" data-placeholder="Senha"></span>
				</div>

				<div class="container-login100-form-btn">
					<div class="wrap-login100-form-btn">
						<div class="login100-form-bgbtn"></div>
						<button type="submit" class="login100-form-btn">
							Login
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>


<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="<?= base_url('public/login/vendor/jquery/jquery-3.2.1.min.js')?>"></script>
<!--===============================================================================================-->
<script src="<?= base_url('public/login/vendor/animsition/js/animsition.min.js')?>"></script>
<!--===============================================================================================-->
<script src="<?= base_url('public/login/vendor/bootstrap/js/popper.js')?>"></script>
<script src="<?= base_url('public/login/vendor/bootstrap/js/bootstrap.min.js')?>"></script>
<!--===============================================================================================-->
<script src="<?= base_url('public/login/vendor/select2/select2.min.js')?>"></script>
<!--===============================================================================================-->
<script src="<?= base_url('public/login/vendor/daterangepicker/moment.min.js')?>"></script>
<script src="<?= base_url('public/login/vendor/daterangepicker/daterangepicker.js')?>"></script>
<!--===============================================================================================-->
<script src="<?= base_url('public/login/vendor/countdowntime/countdowntime.js')?>"></script>
<!--===============================================================================================-->
<script src="<?= base_url('public/login/js/main.js')?>"></script>

</body>
</html>
