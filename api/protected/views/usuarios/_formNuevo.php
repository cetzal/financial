<?php
//$this->widget('ext.ajaxval.ajaxVal', $validaciones);
//$this->widget('ext.ajaxval.showattr', array('model' => $model));

$array_estatus = array("activo" => "Activo", "inactivo" => "Inactivo");

$form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	"htmlOptions" => array(
		"data-action" => "guardar_usuario",
		"data-module" => "Usuarios",
		"data-return" => "usuarios_index",
		"data-vars" => '{}',
		"data-return-message" => "",
		"data-error-message" => "",
	),
)); 
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
<div class="row">
	<div class="col-lg-12">
		<div class="form-horizontal">
			<div class="row">

					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<div class="form-group">
							<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
								<?php echo CHtml::label('Nombre', '', array('class' => ' control-label')) ?>
								<div class="row">
									<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
										<?php echo $form->textField($model,'nombre',array('size'=>45,'maxlength'=>45, 'class'=>'form-control', 'placeholder'=>'Nombre')); ?>
										<?php echo $form->hiddenField($model, "ID"); ?>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
								<?php echo CHtml::label('Usuario', '', array('class' => ' control-label')) ?>
								<div class="row">
									<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
										<?php echo $form->textField($model,'usuario',array('size'=>45,'maxlength'=>45, 'class'=>'form-control', 'placeholder'=>'Usuario')); ?>
									</div>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
								<?php echo CHtml::label('Contraseña', '', array('class' => ' control-label')) ?>
								<div class="row">
									<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
										<?php echo CHtml::activePasswordField($model,'password', array('size'=>45,'maxlength'=>45, 'class'=>'form-control', 'placeholder'=>'Contraseña')) ?>
									</div>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
								<?php echo CHtml::label('Confirmar Contraseña', '', array('class' => ' control-label')) ?>
								<div class="row">
									<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
										<input type="password" id="confirm_password" name="confirm_password" placeholder="Confirmar Contraseña" class="form-control" maxlength="45" size="45">
									</div>
								</div>
							</div>
						</div>

					</div> <!-- ./div-md-6 -->
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<div class="form-group">
							<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
								<?php echo CHtml::label('E-mail', '', array('class' => ' control-label')) ?>
								<div class="row">
									<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
										<?php echo $form->textField($model,'email',array('size'=>45,'maxlength'=>45, 'class'=>'form-control', 'placeholder'=>'E-mail')); ?>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
								<?php echo CHtml::label('Estatus', '', array('class' => ' control-label')) ?>
								<div class="row">
									<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
										<?php echo $form->dropDownList($model, 'estatus', $array_estatus, array('class' => 'form-control')); ?>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
								<?php echo CHtml::label('Permisos*', '', array('class' => ' control-label')) ?>
								<div class="row">
									<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
										<?php echo $form->dropDownList($model, 'permiso_ID', $array_tipos, array('class' => 'form-control')); ?>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
								<?php echo CHtml::label('Empleado', '', array('class' => ' control-label')) ?>
								<div class="row">
									<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
										<?php echo CHtml::dropDownList('empleado_ID',$empleado_ID, Empleado::getArrLista(), array('class'=>'form-control chosen-select',)); ?>
										<p class="help-block">Importante para la aprobación de Procesos.</p>
									</div>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
								<?php echo CHtml::label('Foto', '', array('class' => ' control-label')) ?>
								<div class="row">
									<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
										<img id="logotipo_img" src="<?php echo $url_foto ?>" alt="..." class="img-rounded showimg">
									</div>
									<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
										<?php echo $form->hiddenField($model,'url_imagen'); ?>
										<?php echo CHtml::textField("logo", "", array()); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
			</div>

			<br><br>
			<div class="row">
				<div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">	
					<div class="row form-group buttons" style="float:right;">
			    		<a href="/usuarios/indeex" class="btnMenuDelegated" title="" rel="usuarios_index" data-vars="{}">
							<button type="button" class="btn btn-danger">
								<i class="fa fa-trash-o"></i> Cancelar
							</button>
						</a>
						<input type="hidden" name="accion" id="accion" value="" />
						<button type="submit" id = "guardar" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
					</div>
				</div>
			</div>
		</div> <!-- form-horizontal -->
	</div> <!-- col-lg-12 -->
</div> <!-- row -->


<?php $this->endWidget(); ?>

