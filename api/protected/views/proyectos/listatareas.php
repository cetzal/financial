<!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" /> -->
<!-- <link rel="stylesheet" type="text/css" href="select2-bootstrap.css">
 -->
<!-- script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script> -->
<script>
	jQuery(document).ready(function($) {
		$('.chosen-select').chosen({ allow_single_deselect: true });
	});
</script>

<div class="contenedor">
	<h1><?php echo $tarea->titulo; ?></h1>
	<div class="contener_tarea">
		<ul>
		<?php foreach ($desctarea as $key => $value) { ?>
		<li>
		checkbox
			<?php echo $value->descripcion;?>
		</li>
	   <?php } ?>
			
		</ul>
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
				 <?php echo CHtml::dropDownList('empleado_id', "", array(1,2,3,4,5,6,7,8,9,10,11), array('class'=>' form-control chosen-select','multiple'=>true, 'data-placeholder'=>"Seleccione...")); ?>
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