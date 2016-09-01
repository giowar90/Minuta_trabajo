<div id="main-content">
	<div class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header"><i class="fa fa-users"></i> Puestos</h3>
				<ol class="breadcrumb">
					<li><i class="fa fa-users"></i>Puestos</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3>Lista de Puestos</h3>
						<div style="text-align: right;">
							<a href="#nuevo_puesto" data-toggle="modal" class="btn btn-default tooltips" data-original-title="Nuevo Puesto" data-placement="top">
								<i class="fa fa-plus"></i>
							</a>
						</div>
					</div>
					<div class="panel-body">
						<table class="table table-striped tabe-bordered table-hover">
							<thead>
								<tr>
									<th>ID</th>
									<th>Puesto</th>
									<th>Descripción</th>
									<th>Área</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($puestos as $p): ?>
									<tr>
										<td><?php echo $p->id_puestos ?></td>
										<td><?php echo $p->nombre ?></td>
										<td><?php echo $p->descripcion ?></td>
										<td><?php echo $p->area ?></td>
										<td>
											<a class="btn btn-primary editar tooltips" data-id="<?php echo $p->id_puestos ?>" data-original-title="Editar Puesto" data-placement="top">
												<i class="fa fa-pencil"></i>
											</a>
										</td>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="nuevo_puesto" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form class="form-inline">
				<div class="modal-header">
					<button aria-hidden="true" data-dismiss="modal" class="close" type="button" style="color: red;">X</button>
					<h4 class="modal-title">Nuevo Puesto</h4>
				</div>
				<div class="modal-body">
					<div class="col-xs-12">
						<label>Nombre: </label>
						<input type="text" class="form-control" name="nombre">
						<input type="hidden" name="id_puestos" value="0">
						<label>Descripción: </label>
						<textarea class="form-control" name="descripcion"></textarea>
						<label>Área de trabajo:</label>
						<select class="form-control" name="id_area">
							<option value="">Seleccione una área</option>
							<?php foreach ($areas as $a): ?>
								<option value="<?php echo $a->id_area ?>"><?php echo $a->nombre ?></option>
							<?php endforeach ?>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary save">Guardar</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="editar_puesto" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form class="form-inline" role="form">
				<div class="modal-header">
					<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
					<h4 class="modal-title">Editar Usuario</h4>
				</div>
				<div class="modal-body" id="cuerpo">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary edit">Guardar</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script>

	$(".save").click(function(){
		$.ajax({
			url: "<?php echo base_url('puestos/guardar_puesto') ?>",
			type: 'POST',
			data: $(this).closest('form').serialize()
		}).done(function(response) {
			if (response > 0){
				swal(
					'Éxito',
					'Puesto agregado correctamente',
					'success'
				)
				$('#nuevo_puesto').modal('hide');
				window.location.href = "<?php echo site_url('puestos/lista_puestos'); ?>";
			}else{
				swal(
					'Problema',
					'No se ha podido ingresar el puesto',
					'error'
				)
			}
		});
		
	});

	$(".editar").click(function(){
		$id = $(this).data('id');
		$.ajax({
			url: "<?php echo base_url('puestos/editar_puesto') ?>",
			type: 'POST',
			data: {id_puesto: $id}
		}).done(function(html) {
			$('#cuerpo').html(html);
			$('#editar_puesto').modal('show');
		});
		
	});

	$(".edit").click(function(){
		$.ajax({
			url: "<?php echo base_url('puestos/guardar_puesto') ?>",
			type: 'POST',
			data: $(this).closest('form').serialize()
		}).done(function(response) {
			if (response > 0){
				swal(
					'Éxito',
					'Puesto editado correctamente',
					'success'
				)
				$('#editar_puesto').modal('hide');
				window.location.href = "<?php echo site_url('puestos/lista_puestos'); ?>";
			}else{
				swal(
					'Problema',
					'No se ha podido editar el puesto',
					'error'
				)
			}
		});
		
	});

</script>