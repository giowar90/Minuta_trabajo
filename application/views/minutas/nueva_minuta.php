<div id="main-content">
	<div class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header"><i class="fa fa-home"></i> Minutas</h3>
				<ol class="breadcrumb">
					<li><i class="fa fa-home"></i>Minutas</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="panel panel-default">
					<form class="form-inline">
						<div class="panel-heading">
							<h3>Nueva Minuta</h3>
						</div>
						<div class="panel-body">
							<div class="col-xs-12">
								<div class="row">
									<div class="col-xs-4">
										<label>Tema: </label>
										<input type="text" class="form-control" name="tema">
									</div>
									<div class="col-xs-4">
										<label>Fecha: </label>
										<input type="text" class="form-control" name="fecha" value="<?php echo date('Y-m-d') ?>" readonly="readonly">
									</div>
									<div class="col-xs-4">
										<label>Fecha de próxima Reunión: </label>
										<input type="text" class="form-control" name="fecha_proxima">
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<label>Resumen:</label>
										<textarea class="form-control" name="resumen"></textarea>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-4">
										<label>Participantes: </label>
										<select class="form-control asist" name="asistente">
											<option value="">Selecione a los participantes</option>
											<?php foreach ($participantes as $p): ?>
												<option value="<?php echo $p->id_usuario ?>"><?php echo $p->nombre." ".$p->apellido_paterno." ".$p->apellido_materno ?></option>
											<?php endforeach ?>
										</select>
									</div>
								</div>
								<div class="row">
									<di class="col-xs-12">
										<table class="table table-striped table-bordered" id="tabla_actividades">
											<thead>
												<tr>
													<th>Actividad</th>
													<th>Descripción</th>
													<th>Responsable</th>
													<th>Fecha de Cierre</th>
													<th>Remover</th>
												</tr>
											</thead>
											<tbody></tbody>
										</table>
									</di>
								</div>
							</div>
							</div>
							<div class="panel-footer" style="text-align: right;">
								<button type="button" class="btn btn-primary save">Guardar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>

	$('.asist').change(function(){
		if($(this).val() != ""){
			$id = $(this).val();
			$.ajax({
				url: "<?php echo base_url('minutas/usuario') ?>",
				type: 'POST',
				data: {id_usuario: $id},
			}).done(function(r) {
				$('#tabla_actividades tbody').append(
					$("<tr>").attr({class : "U"+r.id_usuario})
					.append(
						$("<td>").append(
							$("<input>").attr({
								type : 'text',
								class : 'form-control',
								name : 'temas[]'
							})
						)
					)
					.append(
						$("<td>").append(
							$("<input>").attr({
								type : 'text',
								class : 'form-control',
								name : 'descripcion[]'
							})
						)
					)
					.append(
						$("<td>").append(
							$("<input>").attr({
								type : 'text',
								class : 'form-control',
								value : r.nombre+" "+r.apellido_paterno+" "+r.apellido_paterno
							})
						)
						.append(
							$("<input>").attr({
								type : 'hidden',
								class : 'form-control',
								name : 'responsable[]',
								value : r.id_usuario
							})
						)
					)
					.append(
						$("<td>").append(
							$("<input>").attr({
								type : 'text',
								class : 'form-control',
								name : 'fecha_cierre[]'
							})
						)
					)
					.append(
						$("<td>").attr({style : 'text-align: center;'}).append(
							$("<button>").attr({
								type : 'button',
								class : 'btn btn-danger quitar',
								name : 'descripcion[]',
								'data-us' : r.id_usuario
							}).append(
								$("<i>").attr({
									class : 'fa fa-remove'
								})
							)
						)
					)
				);
				eventos();
			});
		}
	});

	$('.save').click(function() {
		$.ajax({
			url: "<?php echo base_url('minutas/guardar_minuta') ?>",
			type: 'POST',
			data: $(this).closest('form').serialize()
		}).done(function(response) {
			if (response == 1){
				swal(
					'Éxito',
					'Minuta agregada correctamente',
					'success'
				)
				window.location.href = "<?php echo site_url('minutas/lista_minutas'); ?>";
			}else{
				swal(
					'Problema',
					'No se ha podido ingresar ala minuta',
					'error'
				)
			}
		});
		
	});

	function eventos() {
		$('.quitar').click(function() {
			$id = $(this).data('us');
			$('.U'+$id).remove();
		});
	}

</script>