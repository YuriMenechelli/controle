<section class="content-header">
	<h2>
		<?=  '<span class="label label-default"><i class="fa fa-users"></i>'.' '.$titulo.'</span>'?>
	</h2>
	<ol class="breadcrumb">
		<li><a href="<?= base_url('admin') ?>"><i class="fa fa-th-list"></i> Principal</a></li>
		<li class="active"><?= $titulo ?></li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<!-- Default box -->
	<?php	getMsg('msgCadastro'); ?>
	<div class="box">
		<div class="box-header with-border">

			<div class="row margin-bottom-20">
				<div class="col-md-12 text-right">
					<a href="<?php echo base_url('admin/users/modulo') ?>" title="Novo" class="btn btn-success"><i class="fa fa-plus-square"></i> Novo</a>
				</div>
			</div> <br>

			<table class="table table-hover table_list_data">

				<thead>
				<tr>
					<th>NOME/SOBRENOME</th>
					<th>E-MAIL</th>
					<th class="text-center">CARGO</th>
					<th class="text-center">DEPARTAMENTO</th>
					<th class="text-center">TELEFONE FIXO</th>
					<th class="text-center">TELEFONE CELULAR</th>
					<th class="text-center">STATUS</th>
					<th class="text-right">OPÇÕES</th>
				</tr>
				</thead>

				<tbody>
				<?php
				foreach ($users as $row){
					echo'<tr>';
					echo'<td>'.$row->nome.'</td>';
					echo'<td>'.$row->email.'</td>';
					echo'<td class="text-center">'.$row->position_name.'</td>';
					echo'<td class="text-center">'.$row->department_name.'</td>';
					echo'<td class="text-center">'.$row->phone.'</td>';
					echo'<td class="text-center">'.$row->cellphone.'</td>';
					echo'<td class="text-center">'. ($row->active == 1 ? '<span class="label label-success">Ativo</span>' :
							'<span class="label label-danger">Inativo</span>' ) .'</td>';
					echo'<td class="text-right">';
					echo '<a href="'.base_url('admin/users/modulo/'. $row->id ).'" title="Editar" class="btn btn-primary"><i class="fa fa-pencil"></i></a>';
					echo ' <a href="'.base_url('admin/users/del/'. $row->id ).'" title="Apagar" class="btn btn-danger btn_apagar_registro"><i class="fa fa-trash"></i></a>';
					echo'</td>';
					echo'</tr>';
				}
				?>
				</tbody>
			</table>
		</div>
	</div>
	<!-- /.box -->
</section>
