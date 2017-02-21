<?php
/* @var $this AdministradoresController */
/* @var $model Usuarios */
/* @var $form CActiveForm */
?>

<?php

function crearModulos($model){
	//$array = explode(',', $string);
	$modulos = Modulo::model()->findAll();
	$modulosActivos = $model->permisoModulos;
	$contador = 0;
	
	//LISTAR TODOS LOS MODULOS
	foreach ($modulos as $modulo)
	{
		$nombre_modulo = strtoupper($modulo->nombre);
		$impreso = false;
		echo "<tr>";

		//RECORRER LOS PERMISOS ACTUALES DEL USUARIO
		foreach ($modulosActivos as $moduloActivo)
		{
			if($moduloActivo->modulo_ID == $modulo->ID)
			{
				$permisoCrear = false;
				$permisoEditar = false;
				$permisoEliminar = false;

				if($moduloActivo->crear  == "true") $permisoCrear = true;
				if($moduloActivo->editar  == "true") $permisoEditar = true;
				if($moduloActivo->eliminar== "true") $permisoEliminar = true;

				echo "<td>".$nombre_modulo."</td>";
				echo "<td class='centrado'>";
				echo CHtml::checkbox('modulos['.$contador.'][moduloID]', true, array('value' => $modulo->ID, "id" => "modulos[]", "class" => "i-grey" ));
				echo "</td>";

				echo "<td class='centrado'>";
				echo CHtml::checkbox('modulos['.$contador.'][crear]', $permisoCrear, array('value' => $modulo->ID, "id" => "modulos[]", "class" => "i-grey" ));
				echo "</td>";

				echo "<td class='centrado'>";
				echo CHtml::checkbox('modulos['.$contador.'][editar]', $permisoEditar, array('value' => $modulo->ID, "id" => "modulos[]", "class" => "i-grey" ));
				echo "</td>";

				echo "<td class='centrado'>";
				echo CHtml::checkbox('modulos['.$contador.'][eliminar]', $permisoEliminar, array('value' => $modulo->ID, "id" => "modulos[]", "class" => "i-grey" ));
				echo "</td>";

				$impreso = true;
			}
		}
		if($impreso != true)
		{

			echo "<td>".$nombre_modulo."</td> <td class='centrado'>";
			echo CHtml::checkbox('modulos['.$contador.'][moduloID]', false, array('value' => $modulo->ID, "id" => "modulos[]", "class" => "i-grey" ));
			$impreso = false;
			echo "</td>";

			echo "<td class='centrado'>";
			echo CHtml::checkbox('modulos['.$contador.'][crear]', false, array('value' => $modulo->ID, "id" => "modulos[]", "class" => "i-grey" ));
			echo "</td>";

			echo "<td class='centrado'>";
			echo CHtml::checkbox('modulos['.$contador.'][editar]', false, array('value' => $modulo->ID, "id" => "modulos[]", "class" => "i-grey" ));
			echo "</td>";

			echo "<td class='centrado'>";
			echo CHtml::checkbox('modulos['.$contador.'][eliminar]', false, array('value' => $modulo->ID, "id" => "modulos[]", "class" => "i-grey" ));
			echo "</td>";
		}
		echo "</tr>";
		$contador++;
	}
}
?>
<?php 
$form = $this->beginWidget ( 'bootstrap.widgets.TbActiveForm', array (
		'id' => 'administradores-form',
		'type'=>'horizontal',
		'enableClientValidation' => true,
		'enableAjaxValidation' => false
) );
	
 ?>
 <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array( // configurations per alert type
            'error'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
        ),
    )); ?>

    <?php echo $form->textFieldRow($frompermisos,'nombre',array('class'=>'span3')); ?>

<table class="table table-th-block table-primary" id="datatable-usuarios">
	<thead class="the-box dark full">
		<tr>
			<th>M&oacute;dulo</th>
			<th class="centrado" width=100>Acceso(Ver)</th>
			<th class="centrado" width=100>Crear</th>
			<th class="centrado" width=100>Editar</th>
			<th class="centrado" width=100>Eliminar</th>
		</tr>
	</thead>
	<tbody>
		<?php crearModulos($frompermisos); ?>
	</tbody>
</table>

<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton',array('buttonType'=>'submit','type'=>'primary','label'=>Yii::t('common', 'Save'))); ?>
	</div>
<?php $this->endWidget(); ?>
