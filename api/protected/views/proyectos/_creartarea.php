<link rel="stylesheet" href="//fonts.googleapis.com/icon?family=Material+Icons">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,500,400italic,700,700italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="//storage.googleapis.com/code.getmdl.io/1.0.1/material.teal-red.min.css" />
<script src="//storage.googleapis.com/code.getmdl.io/1.0.1/material.min.js"></script>

<style>
.contetList{
	width: 45%;
}
  ul{
  	list-style: none;
  }
 .accordion {
 	width: 100%;
 	max-width: 360px;
 	margin: 30px auto 20px;
 	background: #FFF;
 	-webkit-border-radius: 4px;
 	-moz-border-radius: 4px;
 	border-radius: 4px;
 }

 .accordion, .link {
 	padding-left: 3em;
	cursor: pointer;
	display: block;
	/*padding: 15px 15px 15px 42px;*/
	color: #000;
	font-size: 14px;
	font-weight: 700;
	border-bottom: 1px solid #CCC;
	position: relative;
	-webkit-transition: all 0.4s ease;
	-o-transition: all 0.4s ease;
	transition: all 0.4s ease;
}

.accordion li:last-child .link {
	border-bottom: 0;
}
.accordion li i {
	position: absolute;
	top: 16px;
	left: 12px;
	font-size: 18px;
	color: #595959;
	-webkit-transition: all 0.4s ease;
	-o-transition: all 0.4s ease;
	transition: all 0.4s ease;
}

.accordion li i.fa-chevron-down {
	right: 12px;
	left: auto;
	font-size: 16px;
}

.accordion li.open .link {
	color: #b63b4d;
}

.accordion li.open i {
	color: #b63b4d;
}
.accordion li.open i.fa-chevron-down {
	-webkit-transform: rotate(180deg);
	-ms-transform: rotate(180deg);
	-o-transform: rotate(180deg);
	transform: rotate(180deg);
}
.submenu {
 	/* background: #444359; */
 	font-size: 12px;
 	font-family: helvetica;
 }

 .submenu li {
 	/* padding-bottom: 0px; */
 	padding: 8px;
 	border-bottom: 1px solid #4b4a5e;
 }

 .submenu a {
 	/* display: block; */
 	/* text-decoration: none; */
 	/* color: #d9d9d9; */
 	/* background: #b63b4d; */
 	padding: 5px;
 	padding-left: 3px;
 	-webkit-transition: all 0.25s ease;
 	-o-transition: all 0.25s ease;
 	transition: all 0.25s ease;
 }

 .submenu a:hover {
 	/* background: #b63b4d; */
 	/* color: #FFF; */
 }
 
 
</style>
<script>
	jQuery(document).ready(function() {
		$(".chosen-select").chosen({width:"73%"});
	});
</script>
<div class="contenedor">
	<h1>Tema : <?php echo $model->nombre; ?></h1>
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
					<?php echo CHtml::hiddenField("tarea[id_tema]",$model->ID,array('class'=>'form-control')); ?>
					<?php echo CHtml::textField("tarea[titulo]", '', array('class' => 'form-control', 'placeholder' => 'Nombre')) ?>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Descripción</label>
				<div class="controls">
					<?php echo CHtml::textField("tarea[descripcion]", '', array('class' => 'form-control', 'placeholder' => 'Descripción')) ?>
				</div>
			</div>
			<!-- <div class="control-group">
				<label class="control-label">Status</label>
				<div class="controls"> -->
					<?php //echo CHtml::dropDownList("StatusNuevo", '',$model->getStatus(),array('empty'=>'--Seleccione--')) ?>
				<!-- </div>
							</div> -->
			<!-- <div class="form-actions">
				<?php
					/*$this->widget('bootstrap.widgets.TbButton', array(
				    	'label'=>'Aceptar',
				    	'buttonType' => 'ajaxSubmit',
						'size'=>'small',
						'url'=>array('reassign'),
						'htmlOptions'=>array(
							'class'=>'btn-primary',
						),
					));*/
				?>
				
			</div> -->
			<div class="form-actions">
				<?php $this->widget('bootstrap.widgets.TbButton',array('buttonType'=>'submit','type'=>'primary','label'=>Yii::t('common', 'Save'))); ?>
			</div>
			<?php $this->endWidget(); ?>
		</div>
	</div>
	<div class="contetList">
		<ul class="menu" id="accordion" >
			<?php  foreach ($listas as $key => $value) {  ?>
		     <li>
		        <div class="link"><h4><?php echo $value->titulo; ?></h4></div>
		          <ul class="submenu">
		          		<?php $contenido = TareaDes::model()->findAll("id_tarea =".$value->ID);

						foreach ($contenido as $key => $arealizar) { ?>
							<li><?php echo $arealizar->descripcion."<br> Fecha inicio ".$arealizar->fecha_inicio." - Fecha fina ".$arealizar->fecha_final." <br>
							<a href='".Yii::app()->createUrl("proyectos/delete")."' class='btndelete' data-vars='{}' data-id='".$arealizar->ID."'> 
							<img src='".Yii::app()->baseUrl.'/images/botones/eliminar20.png'."'></a>
							<a href='".Yii::app()->createUrl("proyectos/editar")."' class='btnEditar' data-vars='{}' data-id='".$arealizar->ID."'><img src='".Yii::app()->baseUrl.'/images/botones/editar20.png'."'></a><br><br>"; ?>

							<?php 
							$asinados = TareasUsuario::model()->findAll("id_des_tareas =".$arealizar->ID);
							 foreach ($asinados as $key => $user) { 
							 	$username = User::model()->find('ID ='.$user->id_usuario);
							 	$rest = substr($username->usuario, 0, 1);
							 	?>
							 	<button class='mdl-button mdl-button--icon mdl-button--colored'><?php echo $rest; ?></button>
							 	<?php echo $username->usuario; ?>
							 <?php }  ?>
												
								
							</li>
							
						<?php } ?>
		           
		          </ul>
		     </li>
		     <br>
		     <li>
		     	<div id="nueva-tarea-form-<?php echo $value->ID;?>" class="row-fluid" style="display:none">
		     	<div class="form">

					<?php  /** @var BootActiveForm $form */

					$form = $this->beginWidget ( 'bootstrap.widgets.TbActiveForm', array (
							'id' => 'nueva_tarea-principal-'.$value->ID,
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
								<?php echo CHtml::hiddenField("TareaDes[id_tarea]",$value->ID,array('class'=>'form-control')); ?>
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
								<input type="date" name="TareaDes[fecha_inicio]">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Fecha Final</label>
							<div class="controls">
								<input type="date" name="TareaDes[fecha_final]">
							</div>
						</div>

						<div class="form-actions">
							<button Type='submit' class="btn btn-primary btnformularioP" id="mostrar-from" data-from="<?php echo $value->ID; ?>">Guardar</button>
						</div>

					<?php $this->endWidget(); ?>

				</div>
				</div>
		     </li>
		     <li>
		     <button class="btn btn-primary" id="mostrar-from" data-inf="<?php echo $value->ID; ?>">Agregar Nueva Tarea</button>
		     </li>
			<?php } ?>
		</ul>
	</div>
	
</div>

			
		