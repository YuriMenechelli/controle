<section class="content-header">
	<h2>
		<?=  '<span class="label label-default"><i class="fa fa-home"></i>'.' ' .$titulo.'</span>'?>
	</h2>
	<ol class="breadcrumb">
		<li class="active"><a href="#"><i class="fa fa-th-list"></i> <?= $titulo ?></a></li>
	</ol>
</section>

<section class="content">

	<div class="row">
		<div class="col-lg-2 col-xs-6" title="Cadastro de usuários">
			<!-- small box -->
			<div class="small-box bg-yellow">
				<div class="inner">
					<h3><?= $t_users ?></h3>

					<p>Registros de usuários</p>
				</div>
				<div class="icon">
					<i class="ion ion-ios-person"></i>
				</div>
				<a href="<?= base_url('admin/users')?>" class="small-box-footer">
					Visualizar usúarios
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>

		<div class="col-lg-2 col-xs-6" title="Cadastro de cargos">
			<!-- small box -->
			<div class="small-box bg-blue">
				<div class="inner">
					<h3><?= $t_positions ?></h3>

					<p>Registros de cargos</p>
				</div>
				<div class="icon">
					<i class="ion ion-ios-people"></i>
				</div>
				<a href="<?= base_url('admin/positions')?>" class="small-box-footer">Visualizar cargos <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="text-center"><i class="fa fa-users"></i> Últimos Usuários</h3>
				</div>
				<div class="box-body">
					<table class="table table-striped table_list_data">
						<thead>
						<tr>
							<th>NOME/SOBRENOME</th>
							<th>E-MAIL</th>
							<th class="text-center">STATUS</th>
						</tr>
						</thead>
						<tbody>
						<?php foreach ($users_dash as $u): ?>
							<tr>
								<td><?= $u->first_name.' '.$u->last_name ?></td>
								<td><?= $u->email ?></td>
								<td class="text-center"><?= ($u->active == 1 ? '<span class="label label-success">Ativo</span>' :
										'<span class="label label-danger">Inativo</span>') ?></td>
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<div class="box-footer text-right">
					<a href="<?= base_url('admin/users')?>" class="label label-primary small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="text-center"><i class="fa fa-users"></i> Ultimos cargos cadastrados</h3>
				</div>
				<div class="box-body">
					<table class="table table-striped table_list_data">
						<thead>
						<tr>
							<th class="text-center">Data</th>
							<th>Cargo</th>
							<th>Departamento</th>
							<th class="text-center">Status</th>
						</tr>
						</thead>
						<tbody>
						<?php foreach ($dept_config as $dc): ?>
							<tr>
								<td class="text-center"><?= formatDateView($dc->dt_inc) ?></td>
								<td><?= $dc->cargo ?></td>
								<td><?= $dc->dept ?></td>
								<td class="text-center"><?= ($dc->active == 1 ? '<span class="label label-success">Ativo</span>' : '<span class="label label-danger">Inativo</span>') ?></td>
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<div class="box-footer text-right">
					<a href="<?= base_url('admin/positions')?>" class="label label-primary  small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
		</div>
	</div>
</section>
