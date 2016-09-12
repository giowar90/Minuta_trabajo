<div id="main-content">
	<div class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header"><i class="fa fa-users"></i> Minutas</h3>
				<ol class="breadcrumb">
					<li><i class="fa fa-users"></i>Minutas</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3>Lista de Minutas</h3>
						<div style="text-align: right;">
							<a href="<?php echo base_url('minutas/nueva_minuta') ?>" class="btn btn-default tooltips" data-original-title="Nueva Minuta" data-placement="top">
								<i class="fa fa-plus"></i>
							</a>
						</div>
					</div>
					<div class="panel-body">
						<table class="table table-striped tabe-bordered table-hover">
							<thead>
								<tr>
									<th>Numero de minuta</th>
									<th>Tema</th>
									<th>Resumen</th>
									<th>Fecha de la Minuta</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($minutas as $m): ?>
									<tr>
										<td><?php echo $m->id_minutas ?></td>
										<td><?php echo $m->tema ?></td>
										<td><?php echo $m->resumen ?></td>
										<td><?php echo $m->fecha ?></td>
										<td>
											<a href="<?php echo base_url('minutas/ver_minuta/'.$m->id_minutas) ?>" class="btn btn-primary tooltips" data-toggle="modal" data-original-title="Detalles de la Minuta" data-placement="top">
												<i class="fa fa-eye"></i>
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