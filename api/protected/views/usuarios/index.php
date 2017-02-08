<h1 class="page-heading"> Usuarios </h1>

<div class="" id="breadcumb_id"></div>
<div class="" id="app_messages"></div>

<div class="the-box">

    <div class="row">
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <div class="miicono">
                    <a href='<?php echo Yii::app()->createUrl('usuarios/listausuarios'); ?>' rel='configuracion_index' class='btnMenuDelegated btn btn-link btn-block'   data-vars='{}'>
                        <i class="fa fa-users fa-3x" style="background:none;"></i><br />
                        Usuarios
                    </a>
                </div>
            </div>

            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <div class="miicono">
                    <a href='<?php echo Yii::app()->createUrl('usuarios/listapermisos'); ?>' rel='bancos_index' class='btnMenuDelegated btn btn-link btn-block' data-vars='{}'>
                        <i class="fa fa-thumbs-up fa-3x" style="background:none;"></i><br />
                        Permisos
                    </a>
                </div>
            </div>
    </div> 
</div>