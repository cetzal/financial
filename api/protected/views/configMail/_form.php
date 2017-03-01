<?php
/* @var $this ConfiguracionController */
/* @var $model Configuracion */
/* @var $form CForm */
?>
<?php
	Yii::app()->clientScript->registerScript("wizard", '
		 $(\'[data-toggle="popover"]\').popover("show");
	',CClientScript::POS_LOAD);
?>
<div class="form">
<?php
	$error=Yii::app()->user->getFlash("error");
	if(isset($error) and $error!==''){
		echo
			'<div class="alert alert-block">
	    		<button type="button" class="close" data-dismiss="alert">&times;</button>
	    		<span><strong>Error.</strong> '.$error.'</span>
    		</div>';
	}
?>
<?php
	$success=Yii::app()->user->getFlash("success");
	if(isset($success) and $success!==''){
		echo
			'<div class="alert alert-block alert-success">
	    		<button type="button" class="close" data-dismiss="alert">&times;</button>
	    		<span><strong>Correcto.</strong> '.$success.'</span>
    		</div>';
	}
?>
<?php
	$form = $this->beginWidget ( 'bootstrap.widgets.TbActiveForm', array (
			'id' => 'configuracion-form',
			'type'=>'horizontal',
			'enableClientValidation' => true,
			'enableAjaxValidation' => false
	) );
?>

	<p class="note span5" data-placement='top' data-html="true" data-content='<?php echo CHtml::link("",array("catalogoAdmin/wizard",'l'=>Yii::app()->session['wizard']-1),array('class'=>'icon-chevron-left')); ?> Ingrese los datos de su correo y haga clic en el botón Guardar <?php echo CHtml::link("",array("catalogoAdmin/wizard",'l'=>Yii::app()->session['wizard']+1),array('class'=>'icon-chevron-right')); ?>' <?php echo (Yii::app()->session['wizard']==26?"data-toggle='popover'":"") ?>>
		<?php echo Yii::t('common','Fields with <span class="required">*</span> are required.') ?>
	</p>
	<div class="clearfix"></div>

	<?php echo $form->textFieldRow($model,'servidor',array('class'=>'span3')); ?>
	<?php echo $form->textFieldRow($model,'puerto',array('class'=>'span3')); ?>
	<?php echo $form->dropDownListRow($model,'cifrado',$model->getCifrados(),array('class'=>'span3')); ?>
	<?php echo $form->textFieldRow($model,'usuario',array('class'=>'span3')); ?>
	<?php echo $form->passwordFieldRow($model,'password',array('class'=>'span3')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton',array('buttonType'=>'submit','type'=>'primary','label'=>Yii::t('common', 'Save'))); ?>
	</div>
<?php $this->endWidget(); ?>

</div>
<!-- form -->