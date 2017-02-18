<script>
	jQuery(document).ready(function($) {
		$(".chosen-select").chosen();
	});
</script>
<div class="contenedor">
<div class="control-group">
	<label class="control-label">Buscar</label>
	<div class="controls">
		 <?php echo CHtml::dropDownList('empleado_id', "", User::getLista(), array('class'=>' form-control chosen-select','multiple'=>false, 'data-placeholder'=>"Seleccione...")); ?>
		 <button class="btn btn-primary buscar">Buscar</button>
	</div>

</div>

<div id="contenedort">
	
</div>
	
</div>