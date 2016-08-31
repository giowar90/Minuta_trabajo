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
										<td></td>
										<td></td>
										<td>
											<a class="btn btn-primary editar tooltips" data-id="<?php echo $us->id_usuario ?>" data-original-title="Editar Usuario" data-placement="top">
												<i class="fa fa-pencil"></i>
											</a>
											<a class="btn btn-danger eliminar tooltips" data-id="<?php echo $us->id_usuario ?>" data-original-title="Eliminar Usuario" data-placement="top">
												<i class="fa fa-remove"></i>
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
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="nuevo_usuario" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form class="form-inline" role="form">
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
							<input type="text" class="form-control" name="ap_materno">
							<label>Contraseña: </label>
							<input type="password" class="form-control" name="password">
							<label>Área de trabajo:</label>
							<select class="form-control" name="area">
								<option value="">Seleccione una área</option>
							</select>
						</div>
						<div class="col-xs-6">
							<label>Apellido Paterno: </label>
							<input type="text" class="form-control" name="ap_paterno">
							<label>Correo Electrónico: </label>
							<input type="text" class="form-control" name="email">
							<label>Puesto:</label>
							<select class="form-control" name="puesto">
								<option value="">Seleccione un puesto</option>
							</select>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Guardar</button>
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
					<h4 class="modal-title">Nuevo Usuario</h4>
				</div>
				<div class="modal-body" id="cuerpo">
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Guardar</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script>

	$(".editar").click(function(){
		$id = $(this).data('id');
		$.ajax({
			url: baseurl+'usuarios/editar_usuario',
			type: 'POST',
			data: {id_usuario: $id}
		}).done(function(html) {
			$('#cuerpo').html(html);
			$('#editar_usuario').modal('show');
		});
		
	});

</script>