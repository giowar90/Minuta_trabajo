<div id="main-content">
	<div class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header"><i class="fa fa-home"></i>Minutas</h3>
				<ol class="breadcrumb">
					<li><i class="fa fa-home"></i>Minutas</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="panel panel-defaul">
					<div class="panel-heading">
						<h3>Minuta Detalles</h3>
					</div>
					<div class="panel-body">
						<div class="col-xs-12">
							<div class="row">
								<div class="col-xs-4">
									<label>Tema: </label>
									<input type="text" class="form-control" value="<?php echo $minuta[0]->tema ?>" readonly="readonly">
								</div>
								<div class="col-xs-4">
									<label>Fecha de la Junta: </label>
									<input type="text" class="form-control" name="fecha" value="<?php echo $minuta[0]->fecha  ?>" readonly="readonly">
								</div>
								<div class="col-xs-4">
									<label>Fecha de próxima Reunión: </label>
									<input type="text" class="form-control" value="<?php echo $minuta[0]->fecha_proxima ?>" readonly="readonly">
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<label>Resumen:</label>
									<textarea class="form-control" readonly="readonly">
										<?php echo $minuta[0]->resumen ?>
									</textarea>
								</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-xs-12">
								<div class="panel-group m-bot20" id="accordion">
									<?php foreach ($asistentes as $a): ?>
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title">
													<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#A<?php echo $a->id_asistente ?>">
														<strong>Participante: </strong> <?php echo $a->nombre." ".$a->apellido_paterno." ".$a->apellido_materno." " ?>
														<strong>Total de actividades: </strong> <?php echo $a->actividades_total." " ?>
														<strong style="color: green">Realizadas: </strong> <?php echo $a->hechas." " ?>
														<strong style="color: red">No Realizadas: </strong> <?php echo $a->no_hechas ?>
													</a>
												</h4>
											</div>
											<div id="A<?php echo $a->id_asistente ?>" class="panel-collapse collapse">
												<div class="panel-body">
														<table class="table table-bordered table-striped">
															<thead>
																<tr>
																	<th>Actividad</th>
																	<th>Descripción</th>
																	<th>Fecha de entrega</th>
																	<th>Estatus</th>
																</tr>
															</thead>
															<tbody>
																<?php if ($a->acti != ""){ ?>
																	<?php foreach ($a->acti as $ac): ?>
																		<tr>
																			<td><?php echo $ac->tema ?></td>
																			<td><?php echo $ac->descripcion ?></td>
																			<td><?php echo $ac->fecha_cierre ?></td>
																			<td style="<?php echo $ac->estatus == 1 ? 'color: red;' : 'color: green;' ?>">
																				<?php echo $ac->estatus == 1 ? "Sin realizar" : "Realizada" ?>
																			</td>
																		</tr>
																	<?php endforeach ?>
																<?php } else { ?>

																<?php } ?>
															</tbody>
														</table>
													<div class="col-xs-12">
													</div>
												</div>
											</div>
										</div>
									<?php endforeach ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>