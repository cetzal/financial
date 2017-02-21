<?php
/* @var $this PermisosController */
/* @var $model Usuarios */
$this->setPageTitle ( Yii::t ( 'administradores/common', 'Nuevo Administrador' ) );
$this->breadcrumbs = array (
		'<span class="btn btn-primary btn-small">Parametrización</span>'=>array('catalogoParametrizacion/index'),
		'<span class="btn btn-primary btn-small">Administradores</span>'=>array('administradores/index'),
		'<span class="btn btn-small active">Nuevo</span>'
);

?>

<div class="contenedor">
	<h1>Nuevo Permisos</h1>
	<?php $this->renderPartial('_form',array('frompermisos'=>$formPermisos)); ?>
</div>