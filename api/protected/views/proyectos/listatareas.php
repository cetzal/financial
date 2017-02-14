<style>
.wrap {
	max-width: 600px;
	width: 90%;
}
	/* - Tareas - */
.tareas .lista {
	list-style: none;
}
 
.tareas .lista li {
	border-bottom: 1px solid #B6B6B6;
}
 
.tareas .lista li a {
	color: #212121;
	display: block;
	padding: 5px 0;
	text-decoration: none;
}
 
.tareas .lista li a:hover {
	text-decoration: line-through;
}
</style>
<script>
	jQuery(document).ready(function($) {
		$('.chosen-select').chosen();
	});
</script>

<div class="contenedor">
	<h1><?php echo $tarea->titulo; ?></h1>
	<div class="tareas">
		<?php $this->renderPartial("_Lista", array("modeltarea"=>$desctarea)); ?>
	</div>
	
	<div class="form">

	<?php  /** @var BootActiveForm $form */

	$form = $this->beginWidget ( 'bootstrap.widgets.TbActiveForm', array (
			'id' => 'nueva_tarea',
			'type'=>'horizontal',
			'enableClientValidation' => true,
			'enableAjaxValidation' => false
	) );
	?>

		<p class="note">
			<?php //echo Yii::t('common','Fields with <span class="required">*</span> are required.') ?>
		</p>

		<div class="control-group">
			<label class="control-label">Nombre</label>
			<div class="controls">
				<?php echo CHtml::hiddenField("TareaDes[id_tarea]",$tarea->ID,array('class'=>'form-control')); ?>
				<?php echo CHtml::textField("TareaDes[descripcion]", '', array('class' => 'form-control', 'placeholder' => 'Nombre')) ?>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Asignar</label>
			<div class="controls">
				 <?php echo CHtml::dropDownList('empleado_id', "", User::getLista(), array('class'=>' form-control chosen-select','multiple'=>true, 'data-placeholder'=>"Seleccione...")); ?>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Fecha Inicio</label>
			<div class="controls">
				<?php //echo CHtml::textField("TareaDes[descripcion]", '', array('class' => 'form-control', 'placeholder' => 'Descripción')) ?>
				<input type="date" name="TareaDes[fecha_inicio]">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Fecha Final</label>
			<div class="controls">
				<?php //echo CHtml::textField("TareaDes[descripcion]", '', array('class' => 'form-control', 'placeholder' => 'Descripción')) ?>
				<input type="date" name="TareaDes[fecha_final]">
			</div>
		</div>

		<div class="form-actions">
			<?php $this->widget('bootstrap.widgets.TbButton',array('buttonType'=>'submit','type'=>'primary','label'=>Yii::t('common', 'Save'))); ?>
		</div>

	<?php $this->endWidget(); ?>

</div>
</div>