<div class="contenedor">
	<h1>Lista de Usuarios</h1>
	<div class="row-fluid">
	</div>
	<script>
		jQuery(document).on("click","#administradores-grid a.delete",function() {
			if(!confirm("¿Realmente desea eliminar el administrador seleccionado?")) return false;
			var th = this,
			afterDelete = function(){};
			jQuery("#administradores-grid").yiiGridView("update", {
				type: "POST",
				url: jQuery(this).attr("href"),
				success: function(data) {
					jQuery("#administradores-grid").yiiGridView("update");
					afterDelete(th, true, data);
				},
				error: function(XHR) {
					return afterDelete(th, false, XHR);
				}
			});
			return false;
		});
	</script>
	<?php $this->widget('bootstrap.widgets.TbGridView', array( 
			'id'=>'administradores-grid',
	    	'type'=>'bordered condensed',
	    	'dataProvider'=>$usuarios->search(),
			'filter'=>$usuarios,
	    	'template'=>"{items}\n{pager}",
			'selectionChanged' => 'ChangeHrefs',
	    	'columns'=>array(
				array(
						'name'=>'nombre',
						'value'=>'$data->nombre',
				),
				array(
						'name'=>'usuario',
						'value'=>'$data->usuario',
						
				),
				array(
						'name'=>'email',
						'value'=>'$data->email',
						
				),
				array(
						'name'=>'permiso_ID',
						'value'=>'$data->permiso->nombre',
						
				),
				array(
						'name'=>'estatus',
						'value'=>'$data->estatus',
						/*'filter'=>CHtml::listData(array(array('id'=>'0', 'title'=>'No'),array('id'=>'1', 'title'=>'Si'),),'id','title'),*/
				),
		        array(
		            'class'=>'bootstrap.widgets.TbButtonColumn',
					'htmlOptions'=>array('style'=>'width: 50px'),
					'template'=>'{editar} {borrar}',
					'buttons'=>array(
						'editar'=>array(
							'label'=>'<i class=""></i>',
							'imageUrl'=>Yii::app()->baseUrl.'/images/botones/editar20.png',
							/*'url'=>'Yii::app()->user->isPermittedUrl("administradores","update")?Yii::app()->createUrl("administradores/update", array("id"=>$data->id)):""',*/
							'url'=>'Yii::app()->createUrl("usuarios/update", array("id"=>$data->ID))',
							'options'=>array(
								'title'=>'Editar',
								/*'class'=>Yii::app()->user->isPermittedUrl('administradores','update')?"":"btn-disabled"*/
							),
						),
						'borrar'=>array(
								'label'=>'<i class=""></i>',
								'imageUrl'=>Yii::app()->baseUrl.'/images/botones/eliminar20.png',
								/*'url'=>'Yii::app()->user->isPermittedUrl("administradores","delete")?Yii::app()->createUrl("administradores/delete", array("id"=>$data->id)):""',*/
								'url'=>'Yii::app()->createUrl("usuarios/delete", array("id"=>$data->ID))',
								'options'=>array(
										'title'=>'Eliminar',
										/*'class'=>Yii::app()->user->isPermittedUrl('administradores','delete')?"delete":"btn-disabled"*/
								),
						),
					),
		        ),
    		),
		));
	?>
</div>