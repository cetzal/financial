<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form TbActiveForm */

$this->pageTitle=Yii::app()->name . ' - Contacto';
$this->breadcrumbs=array(
	'<span class="btn btn-small active">Contacto</span>',
);
?>
<div class="contenedor">
	<h1>Contacto</h1>
	<?php if(Yii::app()->user->hasFlash('contact')): ?>
	
	    <?php $this->widget('bootstrap.widgets.TbAlert', array(
	        'alerts'=>array('contact'),
	    )); ?>
	
	<?php else: ?>
	
	<p>
		Si tiene preguntas, dudas o comentarios no dude en contactarnos mediante el siguiente formulario. 
	</p>
	
	<div class="form">
	
	<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id'=>'contact-form',
	    'type'=>'horizontal',
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
	)); ?>
	
		<p class="note"><?php echo Yii::t('common','Fields with <span class="required">*</span> are required.') ?></p>
	
		<?php echo $form->errorSummary($model); ?>
	
	    <?php echo $form->textFieldRow($model,'name'); ?>
	
	    <?php echo $form->textFieldRow($model,'email'); ?>
	
	    <?php echo $form->textFieldRow($model,'subject',array('size'=>60,'maxlength'=>128)); ?>
	
	    <?php echo $form->textAreaRow($model,'body',array('rows'=>6, 'class'=>'span8')); ?>
	
		<?php if(CCaptcha::checkRequirements()): ?>
			<?php echo $form->captchaRow($model,'verifyCode',array(
	            'hint'=>'Ingrese las letras que se muestran en la imagen de arriba.',
	        )); ?>
		<?php endif; ?>
	
		<div class="form-actions">
			<?php $this->widget('bootstrap.widgets.TbButton',array(
	            'buttonType'=>'submit',
	            'type'=>'primary',
	            'label'=>'Enviar',
	        )); ?>
		</div>
	
	<?php $this->endWidget(); ?>
	
	</div><!-- form -->
	
	<?php endif; ?>
</div>