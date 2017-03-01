<?php
/* @var $this ConfiguracionController */
/* @var $model Configuracion */
$this->setPageTitle ( Yii::t ( 'configuracion/common', 'Envío de Correos' ) );

?>

<div class="contenedor">
	<h1>Servidor de Envío de Correos</h1>
	<div class="row-fluid">
	</div>
	<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>