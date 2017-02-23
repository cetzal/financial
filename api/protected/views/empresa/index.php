<?php
/* @var $this EmpresaController */
$this->setPageTitle ( Yii::t ( 'administradoresGenerales/common', 'empresa' ) );
$this->breadcrumbs = array (
		'<span class="btn btn-primary btn-small">home</span>' => array ("empresa/index" /*Yii::app()->user->getHome(),*/ ),
		'<span class="btn btn-primary btn-small">empresa</span>'=>array('configuracion/index'),
		'<span class="btn btn-small active">Administradores</span>'
);
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

<div class="controls">
<?php
$this->widget('CMultiFileUpload', array(
					'id'=>'empresa_logo',
			    	'name'=>'empresa[logo]',
			    	'attribute'=>'images',
			     	'accept'=>'png|jpg',	     	
			     	'denied'=>'Archivo no permitido',
					/*'duplicate'=>'El archivo ya ha sido adjuntado anteriormente',*/
				 	/*'skin'=>'',*/
			     	'max'=>1, // max 10 files 
			  ));
			?>
</div>			

<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton',array('buttonType'=>'submit','type'=>'primary','label'=>Yii::t('common', 'Save'))); ?>
	</div>


<?php $this->endWidget(); ?>

	
</div>