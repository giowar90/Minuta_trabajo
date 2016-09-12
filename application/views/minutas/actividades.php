<div id="main-content">
	<div class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header"><i class="fa fa-home"></i>Minutas</h3>
				<ol class="breadcrumb">
					<li><i class="fa fa-home"></i>Actividades</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3>Actividades</h3>
					</div>
					<div class="panel-body">
						<table class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Actividad</th>
									<th>Descripción</th>
									<th>Fecha de terminación</th>
									<th>Estatus</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php if ($actividades){ ?>
									<?php foreach ($actividades as $a): ?>
										<tr>
											<td><?php echo $a->tema ?></td>
											<td><?php echo $a->descripcion ?></td>
											<td><?php echo $a->fecha_cierre ?></td>
											<td><?php echo $a->estatus == 1? 'Pendiente' : 'Terminada' ?></td>
											<td style="text-align: center;">
												<input type="checkbox" class="check" data-id="<?php echo $a->id_actividades ?>" <?php echo $a->estatus == 1? '' : 'checked disabled' ?>>
											</td>
										</tr>
									<?php endforeach ?>
								<?php } else { ?>
									<tr>
										<td colspan="5" style="text-align: center;">
											<strong>No tiene Actividades Asignadas</strong>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>

	$('.check').click(function(){
		$id_actividad = $(this).data('id');
		swal({
			title: "¿Estas seguro de realizar la acción?",
			text: "Al momento de selecionar la actividad como termianda no se podra regeresar",
			type: 'question',
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Si",
			cancelButtonText: "No, ahora no!"
		}).then(function() {
			$.ajax({
				url: "<?php echo base_url('minutas/terminar_actividad') ?>",
				type: 'POST',
				data: {actividad : $id_actividad},
			}).done(function(response) {
				if (response > 0){
					swal(
						'Éxito',
						'Actividad terminada',
						'success'
					);
					window.location.href = "<?php echo base_url('minutas/minutas_actividades'); ?>";
				}else{
					swal(
						'Problema',
						'No se ha podido marcar como terminada la actividad',
						'error'
					);
				}
			});
		}, function(dismiss) {
			if (dismiss === 'cancel') {
				swal(
					'Cancelado',
					'No se ha terminado la actividad',
					'error'
				);
			}
		})
	});

</script>