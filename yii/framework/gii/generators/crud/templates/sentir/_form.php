<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */
/* @var $form CActiveForm */
?>


<div class="row">	
	<div class="col-lg-8">
		<div class="form-horizontal">
	


<?php echo "<?php \$form=\$this->beginWidget('CActiveForm', array(
	'id'=>'".$this->class2id($this->modelClass)."-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>\n"; ?>

	
	<!-- alert block -->
	<div class="alert alert-info fade in alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	  	<p>Los Campos con * son necesarios</p>	  	
	</div>
	<!-- alert block -->

	<?php echo "<?php echo \$form->errorSummary(\$model); ?>\n"; ?>

<?php
foreach($this->tableSchema->columns as $column)
{
	if($column->autoIncrement)
		continue;
?>
	<div class="form-group">
		<?php echo "<?php echo ".$this->generateActiveLabel($this->modelClass,$column)."; ?>\n"; ?>
		<div class='col-sm-8'>
			<?php echo "<?php echo ".$this->generateActiveField($this->modelClass,$column)."; ?>\n"; ?>
			<?php echo "<?php echo \$form->error(\$model,'{$column->name}'); ?>\n"; ?>
		</div>
	</div>

<?php
}
?>
	<div class="form-group">
		<div class="col-sm-2"></div>
		<div class='col-sm-8'>
			<?php echo "<?php echo CHtml::submitButton(\$model->isNewRecord ? 'Boton Guardar' : 'Boton Actualizar'); ?>\n"; ?>
		</div>
	</div>

<?php echo "<?php \$this->endWidget(); ?>\n"; ?>

</div><!-- form -->
</div> <!-- lg-l8 -->
<div class="col-lg-4"></div>

</div>
