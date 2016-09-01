<div class="modal-body">
	<div class="row">
		<div class="col-xs-6">
			<label>Nombre: </label>
			<input type="text" class="form-control" name="nombre" value="<?php echo $usuario[0]->nombre ?>">
			<input type="hidden"  name="id_usuario" value="<?php echo $usuario[0]->id_usuario ?>">
			<label>Apellido Materno: </label>
			<input type="text" class="form-control" name="apellido_materno" value="<?php echo $usuario[0]->apellido_materno ?>">
			<label>Contraseña: </label>
			<input type="password" class="form-control" name="password">
			<label>Área de trabajo:</label>
			<select class="form-control" name="area">
				<option value="">Seleccione una área</option>
				<?php foreach ($areas as $a): ?>
					<option value="<?php echo $a->id_area ?>" <?php echo $a->id_area == $usuario[0]->area? 'selected' : '' ?>><?php echo $a->nombre ?></option>
				<?php endforeach ?>
			</select>
		</div>
		<div class="col-xs-6">
			<label>Apellido Paterno: </label>
			<input type="text" class="form-control" name="apellido_paterno" value="<?php echo $usuario[0]->apellido_paterno ?>">
			<label>Correo Electrónico: </label>
			<input type="text" class="form-control" name="email" value="<?php echo $usuario[0]->email ?>">
			<label>Puesto:</label>
			<select class="form-control" name="puesto">
				<option value="">Seleccione un puesto</option>
				<?php foreach ($puestos as $p): ?>
					<option value="<?php echo $p->id_puestos ?>" <?php echo $p->id_puestos == $usuario[0]->puesto? 'selected' : '' ?>><?php echo $p->nombre ?></option>
				<?php endforeach ?>
			</select>
		</div>
	</div>
</div>