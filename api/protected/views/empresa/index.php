<?php
/* @var $this EmpresaController */

?>
<div class="contenedor">

<?php /*var_dump($empresa);*/ 
$form = $this->beginWidget ( 'bootstrap.widgets.TbActiveForm', array (
		'id' => 'user-form',
		'type'=>'horizontal',
		'enableClientValidation' => true,
		'enableAjaxValidation' => false,
		"htmlOptions" => array(
			"data-action" => "guardar_usuario",
			"data-module" => "Usuarios",
			"data-return" => "usuarios_index",
			"data-vars" => '{}',
			"data-return-message" => "",
			"data-error-message" => "",
		),
) );


?>

<?php //echo $form->textField($model,'nombre',array('size'=>45,'maxlength'=>45, 'class'=>'form-control', 'placeholder'=>'Nombre')); ?>
<?php echo $form->textFieldRow($empresa,'nombre_comercial',array('class'=>'span3')); ?>
<?php echo $form->textFieldRow($empresa,'denominacion',array('class'=>'span3')); ?>
<?php echo $form->textFieldRow($empresa,'rfc',array('class'=>'span3')); ?>
<?php echo $form->textFieldRow($empresa,'calle',array('class'=>'span3')); ?>
<?php echo $form->textFieldRow($empresa,'numero_exterior',array('class'=>'span3')); ?>
<?php echo $form->textFieldRow($empresa,'numero_interior',array('class'=>'span3')); ?>
<?php echo $form->textFieldRow($empresa,'colonia',array('class'=>'span3')); ?>
<?php echo $form->textFieldRow($empresa,'localidad',array('class'=>'span3')); ?>
<?php echo $form->textFieldRow($empresa,'referencia',array('class'=>'span3')); ?>
<?php echo $form->dropDownListRow($empresa, 'id_estado', Estado::getLista(), array('class' => 'form-control')); ?>
<?php //echo $form->dropDownListRow($empresa, 'permiso_ID', $array_tipos, array('class' => 'form-control')); ?>
<?php //echo $form->textFieldRow($empresa,'sueldo',array('class'=>'span3')); ?>
<?php //echo $form->dropDownListRow($empleado_ID, Empleado::getArrLista(), array('class'=>'form-control chosen-select',)); ?>

<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton',array('buttonType'=>'submit','type'=>'primary','label'=>Yii::t('common', 'Save'))); ?>
	</div>


<?php $this->endWidget(); ?>

	
</div>