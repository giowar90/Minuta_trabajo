<div class="col-xs-12">
	<label>Nombre: </label>
	<input type="text" class="form-control" name="nombre" value="<?php echo $area[0]->nombre ?>">
	<input type="hidden" name="id_area" value="<?php echo $area[0]->id_area ?>">
	<label>Descripción: </label>
	<textarea class="form-control" name="descripcion"><?php echo $area[0]->descripcion ?></textarea>
</div>