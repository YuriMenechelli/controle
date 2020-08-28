<section class="content-header">
	<h2>
		<?=  '<span class="label label-default">'.$titulo.' de Cargos</span>'?>
	</h2>
	<ol class="breadcrumb">
		<li><a href="<?php echo base_url('admin') ?>"><i class="fa fa-th-list"></i> Principal</a></li>
		<?php
		if (isset($nav)){

			echo '<li><a href="'.base_url($nav['link']) .'" title="'.$nav['titulo'].'"><i class="fa fa-book"></i>'. $nav['titulo'] .'</a></li>';

		}
		?>
		<li class="active"><?= $titulo ?></li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<!-- Default box -->
	<form action="<?= base_url('admin/positions/core') ?>" method="post" accept-charset="utf-8" class="form-horizontal">
		<?php
		errosValidation();
		getMsg('msgCadastro');
		?>
		<div class="box">
			<div class="box-header">
				<div class="box-body">
					<div class="col-lg-4">
						<label for="name">Cargos:</label>
						<input type="text" name="nome" class="form-control" value="<?= ( $dados != NULL ? $dados->position_name : set_value('cargo')) ?>"><br>
					</div>
					<div class="col-lg-4">
						<label for="name">Departamentos: </label>
						<select name="cargos" class="form-control">
							<option></option>
							<?php if (( $depts ) && ($depts2)) { ?>
								<?php foreach ($depts as $d ) { ?>
									<option value="<?= $d->id_dept ?>" <?= ($d->id_posdept == $d->id_dept ? 'selected=""' : '') ?> ><?= $d->dept ?></option>
								<?php } //END FOREACH?>
							<?php } else { ?>
								<?php foreach ($depts2 as $e ) { ?>
									<option value="<?= $e->id ?>" ><?= $e->department_name ?></option>
								<?php } //END FOREACH?>
							<?php } //END IF ?>
						</select>
					</div>
					<div class="col-lg-2">
						<label for="name">Ativo: </label>
						<select name="ativo" class="form-control">
							<?php if( $dados ) { ?>
								<option value="0" <?= ($dados->active == 0 ? 'selected=""' : '') ?>>Não</option>
								<option value="1" <?= ($dados->active == 1 ? 'selected=""' : '') ?>>Sim</option>
							<?php } else { ?>
								<option value="0">Não</option>
								<option value="1" selected="">Sim</option>
							<?php } ?>
						</select>
					</div>
				</div>
			</div>

			<?php if( $dados ) { ?>
				<input type="hidden" name="id_position" value="<?= $dados->id ?>">
			<?php } ?>
			<div class="box-footer">
				<div class="box-tools" align="right">
					<a href="<?= base_url('admin/positions') ?>" title="Voltar" class="btn btn-danger"><i class="fa fa-arrow-circle-left"></i> Voltar</a>
					<button type="submit" title="Salvar" class="btn btn-primary"><i class="fa fa-save"></i> Salvar</button>
				</div>
			</div>
		</div>
	</form>
</section>
