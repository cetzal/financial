<script>
	jQuery(document).ready(function() {
		$("#Empresa_img_logo").change(function(){
        		readURL(this);
    	});

		function readURL(input) {
        		if (input.files && input.files[0]) {
            		var reader = new FileReader();
            		reader.onload = function (e) {
                		$("#img_logo").attr("src", e.target.result);
            		}
            		reader.readAsDataURL(input.files[0]);
        		}
   	 		}

			
	});
</script>
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

<?php
	if (isset ( $empresa->img_logo )) {
		$src = Yii::app ()->request->baseUrl . '/images/main/' . $empresa->img_logo;
	} else {
		$src = Yii::app ()->request->baseUrl . '/images/main/logo_empresa.png';
	}
	?>

<div class="control-group">
		<label class="control-label" for="Empresa_logo">Logo</label>
		<div class="controls">
			<div class="media">
				<img class="media-object span2 thumbnail" data-src="holder.js/200x140" src="<?php echo $src; ?>" id="img_logo">
			</div>
		</div>
		<?php echo $form->fileFieldRow($empresa, 'img_logo',array('labelOptions'=>array('label'=>false) )); ?>
	</div>		

<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton',array('buttonType'=>'submit','type'=>'primary','label'=>Yii::t('common', 'Save'))); ?>
	</div>


<?php $this->endWidget(); ?>

	
</div>