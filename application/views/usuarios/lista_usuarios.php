<div id="main-content">
	<div class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header"><i class="fa fa-users"></i> Usuarios</h3>
				<ol class="breadcrumb">
					<li><i class="fa fa-users"></i>Usuarios</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3>Lista de usuarios</h3>
						<div style="text-align: right;">
							<a href="#nuevo_usuario" data-toggle="modal" class="btn btn-default tooltips" data-original-title="Nuevo Usuario" data-placement="top">
								<i class="fa fa-plus"></i>
							</a>
						</div>
					</div>
					<div class="panel-body">
						<table class="table table-striped tabe-bordered table-hover">
							<thead>
								<tr>
									<th>Usuario</th>
									<th>Correo Electrónico</th>
									<th>Puesto</th>
									<th>Área</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($usuarios as $us): ?>
									<tr>
										<td><?php echo $us->nombre." ".$us->apellido_paterno." ".$us->apellido_materno ?></td>
										<td><?php echo $us->email ?></td>
										<td><?php echo $us->puesto ?></td>
										<td><?php echo $us->area ?></td>
										<td>
											<?php if ($us->id_usuario != 1): ?>
												<a class="btn btn-primary editar tooltips" data-id="<?php echo $us->id_usuario ?>" data-original-title="Editar Usuario" data-placement="top">
													<i class="fa fa-pencil"></i>
												</a>
												<a class="btn btn-danger eliminar tooltips" data-id="<?php echo $us->id_usuario ?>" data-original-title="Eliminar Usuario" data-placement="top">
													<i class="fa fa-remove"></i>
												</a>
											<?php endif ?>
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
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="nuevo_usuario" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form class="form-inline">
				<div class="modal-header">
					<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
					<h4 class="modal-title">Nuevo Usuario</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-xs-6">
							<label>Nombre: </label>
							<input type="text" class="form-control" name="nombre">
							<label>Apellido Materno: </label>
							<input type="text" class="form-control" name="apellido_materno">
							<input type="hidden" name="id_usuario" value="0">
							<label>Contraseña: </label>
							<input type="password" class="form-control" name="password">
							<label>Puesto:</label>
							<div id="pues">
								<select class="form-control" name="puesto" disabled>
									<option value="">Seleccione primero una área</option>
								</select>
							</div>
						</div>
						<div class="col-xs-6">
							<label>Apellido Paterno: </label>
							<input type="text" class="form-control" name="apellido_paterno">
							<label>Correo Electrónico: </label>
							<input type="text" class="form-control" name="email">
							<label>Área de trabajo:</label>
							<select class="form-control ari" name="area">
								<option value="">Seleccione una área</option>
								<?php foreach ($areas as $a): ?>
									<option value="<?php echo $a->id_area ?>"><?php echo $a->nombre ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary save">Guardar</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="editar_usuario" class="modal fade">
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

	$(".editar").click(function(){
		$id = $(this).data('id');
		$.ajax({
			url: "<?php echo base_url('usuarios/editar_usuario') ?>",
			type: 'POST',
			data: {id_usuario: $id}
		}).done(function(html) {
			$('#cuerpo').html(html);
			$('#editar_usuario').modal('show');
		});
		
	});

	$(".save").click(function(){
		$.ajax({
			url: "<?php echo base_url('usuarios/guardar_usuario') ?>",
			type: 'POST',
			data: $(this).closest('form').serialize()
		}).done(function(response) {
			if (response > 0){
				swal(
					'Éxito',
					'Usuario agregado correctamente',
					'success'
				)
				$('#nuevo_puesto').modal('hide');
				window.location.href = "<?php echo site_url('usuarios/lista_usuarios'); ?>";
			}else{
				swal(
					'Problema',
					'No se ha podido ingresar al usuario',
					'error'
				)
			}
		});
		
	});

	$(".edit").click(function(){
		$.ajax({
			url: "<?php echo base_url('usuarios/guardar_usuario') ?>",
			type: 'POST',
			data: $(this).closest('form').serialize()
		}).done(function(response) {
			if (response > 0){
				swal(
					'Éxito',
					'Usuario editado correctamente',
					'success'
				)
				$('#editar_puesto').modal('hide');
				window.location.href = "<?php echo site_url('usuarios/lista_usuarios'); ?>";
			}else{
				swal(
					'Problema',
					'No se ha podido editar al Usuario',
					'error'
				)
			}
		});
		
	});

	$('.eliminar').click(function(){
		$id = $(this).data('id');
		swal({
			title: "¿Estas seguro de borrar al usuario?",
			text: "¡Esta accion no se puede revertir!",
			type: 'question',
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Si, borrarlo!",
			cancelButtonText: "No, ahora no!"
		}).then(function() {
			eliminar($id);
		}, function(dismiss) {
		// dismiss can be 'cancel', 'overlay', 'close', 'timer'
			if (dismiss === 'cancel') {
				swal(
					'Cancelado',
					'No se ha eliminado al usuario',
					'error'
				);
			}
		})
	});

	function eliminar(eliminar) {
		$.ajax({
			url: "<?php echo base_url('usuarios/borrar_usuario') ?>",
			type: 'POST',
			data: {id_usuario : eliminar}
		}).done(function(response) {
			if (response > 0){
				swal(
					'Éxito',
					'Usuario eliminado correctamente',
					'success'
				);
				window.location.href = "<?php echo site_url('usuarios/lista_usuarios'); ?>";
			}else{
				swal(
					'Problema',
					'No se ha podido eliminar al Usuario',
					'error'
				);
			}
		});
	}

	$('.ari').change(function() {
		$id = $(this).val();
		$.ajax({
			url: "<?php echo base_url('usuarios/get_puestos') ?>",
			type: 'POST',
			data: {id_area: $id}
		}).done(function(response) {
			$('#pues').html(response);
		});
		
	});

</script>