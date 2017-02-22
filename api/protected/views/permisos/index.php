<div class="contenedor">
	<h1>Permisos</h1>
	<div class="row-fluid">
		<?php
			$buttons=array(
				array(
						'label'=>'Nuevo',
						'type'=>'primary',
						/*'url'=>Yii::app()->user->isPermittedUrl('administradores','create')?Yii::app()->createUrl("administradores/create"):"",*/
						'url'=>Yii::app()->createUrl("permisos/nuevo"),
						'htmlOptions'=>array(
								/*'class'=>Yii::app()->user->isPermittedUrl('administradores','create')?"":"btn-disabled"*/
						),
				),
			);
			$this->widget('bootstrap.widgets.TbButtonGroup', array(
					'htmlOptions'=>array('class'=>'pull-right'),
					'size'=>'small',
					'buttons'=>$buttons
			));
		?>
	</div>
	<div id="Table_user-grid" class="grid-view">
		<table class="items table table-bordered table-condensed">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Modulos</th>
				<th>Accion</th>
			</tr>
		</thead>
			<?php foreach ($modelPermisos as $key => $value) { ?>
				<tr>
					<td><?php echo $value->nombre; ?></td>
					<td><?php foreach ($value->permisoModulos as $key => $modulo) {
						echo $modulo->modulo->nombre.",";
					} ?></td>
					<td>
						<a href="<?php echo Yii::app()->createUrl('permisos/updateModulo', array('id'=>$value->ID)) ?>">
							<img src="<?php echo Yii::app()->baseUrl.'/images/botones/editar20.png'; ?>" alt="">
						</a>
						<!-- <a href="<?php //echo Yii::app()->createUrl('permisos/deleteModulo', array('id'=>$value->ID)) ?>">
							<img src="<?php //echo Yii::app()->baseUrl.'/images/botones/eliminar20.png'; ?>" alt="">
						</a> -->
					</td>
				</tr>
			<?php } ?>
		</table>
	</div>	
	
	
</div>