<div class="col-xs-12">
	<label>Nombre: </label>
	<input type="text" class="form-control" name="nombre" value="<?php echo $puesto[0]->nombre ?>">
	<input type="hidden" name="id_puestos" value="<?php echo $puesto[0]->id_puestos ?>">
	<label>Descripción: </label>
	<textarea class="form-control" name="descripcion"><?php echo $puesto[0]->descripcion ?></textarea>
	<label>Área de trabajo:</label>
	<select class="form-control" name="id_area">
		<option value="">Seleccione una área</option>
		<?php foreach ($areas as $a): ?>
			<option value="<?php echo $a->id_area ?>" <?php echo $puesto[0]->id_area == $a->id_area? 'selected' : '' ?>><?php echo $a->nombre ?></option>
		<?php endforeach ?>
	</select>
</div>