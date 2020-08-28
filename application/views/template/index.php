<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title> <?= $titulo ?></title>

	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?= base_url('public/dist/bootstrap/css/bootstrap.min.css') ?>">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url('public/dist/font-awesome/css/font-awesome.min.css') ?>">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?= base_url('public/dist/Ionicons/css/ionicons.min.css') ?>">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url('public/css/AdminLTE.min.css') ?>">

	<link rel="stylesheet" href="<?= base_url('public/css/layout.css') ?>">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
		 folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="<?= base_url('public/css/skin-blue.min.css') ?>">
	<!-- plugin Data-Table -->
	<link rel="stylesheet" type="text/css" href="<?= base_url('public/dist/data-tables/datatables.css') ?>">

	<link rel="stylesheet" type="text/css" href="<?= base_url('public/dist/jquery-uploadfile/css/uploadfile.css') ?>">

	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>


	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
	<header class="main-header">
		<!-- Logo -->
		<a href="<?= base_url('admin')?>" class="logo">
			<!-- mini logo for sidebar mini 50x50 pixels -->
			<span class="logo-mini"><b>C</b>TRL</span>
			<!-- logo for regular state and mobile devices -->
			<span class="logo-lg"><b>Admin</b>Controle</span>
		</a>
		<nav class="navbar navbar-static-top">
			<!-- Sidebar toggle button-->
			<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
				<span class="sr-only">Toggle navigation</span>
			</a>
			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav">
					<li style="padding-right: 15px" class="dropdown user user-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<span class="hidden-xs "><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</span>
						</a>
						<ul class="dropdown-menu">
							<li class="user-header">
								<span class="user_config"><?=
									 $user_config->nome.'<br/>'.
										$user_config->cargo.' - '.$user_config->dept?>
								</span>
							</li>
							<!-- Menu Footer-->
							<li class="user-footer">
								<div style="padding-left: 95px">
									<a href="<?php echo base_url('admin/login/sair') ?>" class="btn btn-danger btn-flat"><i class="fa fa-power-off" aria-hidden="true"></i> Sair</a>
								</div>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
	</header>
	<aside class="main-sidebar">
		<section class="sidebar">
			<!-- form de busca -->
			<form action="#" method="get" class="sidebar-form">
				<div class="input-group">
					<input type="text" name="q" class="form-control" placeholder="Buscar...">
					<span class="input-group-btn">
                		<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              		</span>
				</div>
			</form>
			<!-- /.search form -->
			<ul class="sidebar-menu" data-widget="tree">
				<li class="header">BARRA DE NAVEGAÇÃO</li>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-dashboard"></i> <span>Cadastro</span>
						<span class="pull-right-container">
             				<i class="fa fa-angle-left pull-right"></i>
            			</span>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?php echo base_url('admin/users') ?>"><i class="fa fa-angle-double-right"></i> Usuários</a></li>
						<li><a href="<?php echo base_url('admin/positions') ?>"><i class="fa fa-angle-double-right"></i> Cargos</a></li>
						<li><a href="<?php echo base_url('admin/depts') ?>"><i class="fa fa-angle-double-right"></i> Departamentos</a></li>
					</ul>
				</li>
				<li class="header">CONFIGURAÇÕES</li>
				<li><a href="<?= base_url('admin/sobre')?>"><i class="fa fa-circle-o text-red"></i> <span>Sobre</span></a></li>
			</ul>
		</section>
		<!-- /.sidebar -->
	</aside>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<?php
		if (isset($view)){
			$this->load->view($view);
		}
		?>
	</div>
	<!-- /.content-wrapper -->
	<footer class="main-footer">
		<div class="pull-right hidden-xs">
			<b>Version</b> 2.4.0
		</div>
		<strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io" target="_blank">Yuri Menechelli - Bootstrap</a>.</strong> All rights
		reserved.
	</footer>
	<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url('public/js/jquery.min.js') ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('public/dist/bootstrap/js/bootstrap.min.js') ?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('public/dist/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('public/dist/fastclick/lib/fastclick.js') ?>"></script>
<!-- plugin Data-Table -->
<script type="text/javascript" charset="utf8" src="<?php echo base_url('public/dist/data-tables/datatables.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('public/js/adminlte.min.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('public/js/demo.js') ?>"></script>
<!--JQuery Mask-->
<script src="<?php echo base_url('public/dist/jquery-mask/js/jquery.mask.min.js') ?>"></script>
<!--JQuery UploadFile-->
<script src="<?php echo base_url('public/dist/jquery-uploadfile/js/jquery.uploadfile.min.js') ?>"></script>
</body>
</html>
