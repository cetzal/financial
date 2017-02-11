<?php
/* @var $this ProyectosController */
?>
<div class="contenedor">
<?php 
    $this->renderPartial("temas",array('fechas'=>$fechas));
 ?>
 
<?php 
    $this->renderPartial("proyectos");
 ?>
</div>
