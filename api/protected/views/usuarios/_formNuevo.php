<?php
//$this->widget('ext.ajaxval.ajaxVal', $validaciones);
//$this->widget('ext.ajaxval.showattr', array('model' => $model));

$array_estatus = array("activo" => "Activo", "inactivo" => "Inactivo");

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


$url_foto = "";
$array_tipos = array("" => "Seleccione el permiso para el usuario");

$permisos = Permiso::model()->findAll();
foreach ($permisos as $permiso) {
	$array_tipos[$permiso->ID] = $permiso->nombre;
}

$empleado_ID = "";

?>

<style type="text/css">
.showimg { 
	width: 100px; 
	height:130px; 
	margin: 0 auto;
  	display: block;
}
</style>
<?php //echo $form->textField($model,'nombre',array('size'=>45,'maxlength'=>45, 'class'=>'form-control', 'placeholder'=>'Nombre')); ?>
<?php echo $form->textFieldRow($model,'nombre',array('class'=>'span3')); ?>
<?php echo $form->textFieldRow($model,'usuario',array('class'=>'span3')); ?>
<?php echo $form->textFieldRow($model,'password',array('class'=>'span3')); ?>
<?php echo $form->textFieldRow($model,'email',array('class'=>'span3')); ?>
<?php echo $form->dropDownListRow($model, 'estatus', $array_estatus, array('class' => 'form-control')); ?>
<?php echo $form->dropDownListRow($model, 'permiso_ID', $array_tipos, array('class' => 'form-control')); ?>
<?php echo $form->textFieldRow($model,'sueldo',array('class'=>'span3')); ?>
<?php //echo $form->dropDownListRow($empleado_ID, Empleado::getArrLista(), array('class'=>'form-control chosen-select',)); ?>

<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton',array('buttonType'=>'submit','type'=>'primary','label'=>Yii::t('common', 'Save'))); ?>
	</div>


<?php $this->endWidget(); ?>

