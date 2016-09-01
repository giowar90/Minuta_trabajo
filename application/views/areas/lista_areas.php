<div id="main-content">
	<div class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header"><i class="fa fa-users"></i> Áreas</h3>
				<ol class="breadcrumb">
					<li><i class="fa fa-users"></i>Áreas</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3>Lista de Áreas</h3>
						<div style="text-align: right;">
							<a href="#nueva_area" data-toggle="modal" class="btn btn-default tooltips" data-original-title="Nueva Área" data-placement="top">
								<i class="fa fa-plus"></i>
							</a>
						</div>
					</div>
					<div class="panel-body">
						<table class="table table-striped tabe-bordered table-hover">
							<thead>
								<tr>
									<th>ID</th>
									<th>Área</th>
									<th>Descripción</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($areas as $a): ?>
									<tr>
										<td><?php echo $a->id_area ?></td>
										<td><?php echo $a->nombre ?></td>
										<td><?php echo $a->descripcion ?></td>
										<td>
											<a class="btn btn-primary editar tooltips" data-id="<?php echo $a->id_area ?>" data-original-title="Editar Área" data-placement="top">
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
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="nueva_area" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form class="form-inline">
				<div class="modal-header">
					<button aria-hidden="true" data-dismiss="modal" class="close" type="button" style="color: red;">X</button>
					<h4 class="modal-title">Nueva Área</h4>
				</div>
				<div class="modal-body">
					<div class="col-xs-12">
						<label>Nombre: </label>
						<input type="text" class="form-control" name="nombre">
						<input type="hidden" name="id_area" value="0">
						<label>Descripción: </label>
						<textarea class="form-control" name="descripcion"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary save">Guardar</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="editar_area" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form class="form-inline" role="form">
				<div class="modal-header">
					<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
					<h4 class="modal-title">Editar Área</h4>
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
			url: "<?php echo base_url('areas/guardar_area') ?>",
			type: 'POST',
			data: $(this).closest('form').serialize()
		}).done(function(response) {
			if (response > 0){
				swal(
					'Éxito',
					'Área agregada correctamente',
					'success'
				)
				$('#nuevo_puesto').modal('hide');
				window.location.href = "<?php echo site_url('areas/lista_areas'); ?>";
			}else{
				swal(
					'Problema',
					'No se ha podido ingresar la área',
					'error'
				)
			}
		});
		
	});

	$(".editar").click(function(){
		$id = $(this).data('id');
		$.ajax({
			url: "<?php echo base_url('areas/editar_area') ?>",
			type: 'POST',
			data: {id_area: $id}
		}).done(function(html) {
			$('#cuerpo').html(html);
			$('#editar_area').modal('show');
		});
		
	});

	$(".edit").click(function(){
		$.ajax({
			url: "<?php echo base_url('areas/guardar_area') ?>",
			type: 'POST',
			data: $(this).closest('form').serialize()
		}).done(function(response) {
			if (response > 0){
				swal(
					'Éxito',
					'Área editado correctamente',
					'success'
				)
				$('#editar_puesto').modal('hide');
				window.location.href = "<?php echo site_url('areas/lista_areas'); ?>";
			}else{
				swal(
					'Problema',
					'No se ha podido editar la área',
					'error'
				)
			}
		});
		
	});

</script>