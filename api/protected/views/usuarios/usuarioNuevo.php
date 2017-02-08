<h1 class="page-heading">Nuevo Usuario</h1>

<!-- en este div, se sobreescribira el breadcrumb con js -->
<div class="" id="breadcumb_id"></div>

<div class="" id="app_messages"></div>

<div class="panel with-nav-tabs panel-success">
	<div class="panel-heading">
		<ul class="nav nav-tabs" id="nav_tabs">
			<li id="li_general"     class="active"><a href="#tab_general" data-toggle="tab">Datos Generales</a></li>
			<!--li id="li_fiscal"   class=""><a href="#tab_fiscal" data-toggle="tab">Permisos</a></li-->
		</ul>
	</div>


	<div id="panel-collapse-1" class="collapse in">
		<div class="tab-content">

			<div class="tab-pane fade active in" id="tab_general">
				<div class="panel-body">
					<?php $this->renderPartial('_formNuevo', array("model" => $model)); ?>
				</div><!-- /.panel-body -->
			</div>

			<!--div class="tab-pane fade" id="tab_fiscal">
				<div class="panel-body">
					<p>porfavor Guarde los cambios a usuario antes de continuar </p>
						<?php //$this->renderPartial("empresaFiscal", array("model_fiscal" => $modelEmisor)) ?>
				</div>
			</div-->



		</div>
	</div>
</div>