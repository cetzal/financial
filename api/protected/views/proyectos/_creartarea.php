
<div class="contenedor">
	<h1><?php echo $model->nombre; ?></h1>
	<div class="row-fluid">
		<?php
			$buttons=array(
				array(
						'label'=>'Nuevo',
						'type'=>'primary',
						/*'url'=>"",*/
						'htmlOptions'=>array( 'class'=>"",'id'=>'reassign-button'),
				),
			);
			$this->widget('bootstrap.widgets.TbButtonGroup', array(
					'htmlOptions'=>array('class'=>'pull-right'),
					'size'=>'small',
					'buttons'=>$buttons
			));
		?>
	</div>
	<div id="cont-reassign-form" class="row-fluid" style="display:none">
		<div class="span6">
			<?php  /** @var BootActiveForm $form */

			$form = $this->beginWidget ( 'bootstrap.widgets.TbActiveForm', array (
					'id' => 'tareas-form',
					'type'=>'horizontal',
					'enableClientValidation' => true,
					'enableAjaxValidation' => false
			) );
			?>

			<div class="control-group">
				<label class="control-label">Nombre</label>
				<div class="controls">
					<?php echo CHtml::hiddenField("tarea['id_tema']",$model->ID,array('class'=>'form-control')); ?>
					<?php echo CHtml::textField("tarea['titulo']", '', array('class' => 'form-control', 'placeholder' => 'Nombre')) ?>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Descripción</label>
				<div class="controls">
					<?php echo CHtml::textField("tarea['desacripcion']", '', array('class' => 'form-control', 'placeholder' => 'Descripción')) ?>
				</div>
			</div>
			<!-- <div class="control-group">
				<label class="control-label">Status</label>
				<div class="controls"> -->
					<?php //echo CHtml::dropDownList("StatusNuevo", '',$model->getStatus(),array('empty'=>'--Seleccione--')) ?>
				<!-- </div>
							</div> -->
			<div class="form-actions">
				<?php
					$this->widget('bootstrap.widgets.TbButton', array(
				    	'label'=>'Aceptar',
				    	'buttonType' => 'ajaxSubmit',
						'size'=>'small',
						'url'=>array('reassign'),
						'htmlOptions'=>array(
							'class'=>'btn-primary',
						),
					));
				?>
			</div>
			<?php $this->endWidget(); ?>
		</div>
	</div>
	
</div>