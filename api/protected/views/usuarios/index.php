<!-- <h1 class="page-heading"> Usuarios </h1>

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
</div> -->
<div id="new" class="titulos contenedor" style="text-align:left;">
    <h3>Usuarios</h3>
    <div class="row-fluid">
        <div class="span9">
            <div class="row-fluid">
                <div class="span12" style="color:#fff;">
                    <div class="span6" style="background-color:#162e5c;">
                        <div class="span4" style="background-color:#1f4278; height:100%;">
                            <img class="span10 offset1" style="margin-top:30px;margin-bottom:30px;" src="<?php echo Yii::app()->baseUrl."/images/botones/actividades.png" ?>">
                        </div>
                        <div class="span8">
                            <h4>Usuarios</h4>
                            <ul>
                                <li>
                                    <a <?php echo 'href="'.CController::createurl('usuarios/listausuarios').'"'; ?> >
                                        Usuario
                                    </a>                                    
                                </li>
                                <li>
                                    <a <?php echo 'href="'.CController::createurl('usuarios/nuevoUsuario').'"'; ?>>
                                        Crear Usuario
                                    </a>                                    
                                </li> 
                                <li>
                                    <a <?php echo 'href="'.CController::createurl('Permisos/index').'"'; ?>>
                                        Permisos
                                    </a>                                    
                                </li>                     
                            </ul>                           
                        </div>
                    </div>
                </div>
            </div>
            <br/>
            <div class="row-fluid">
               
            </div>      
        </div>
        <!-- <div class="span3">
            <ul class="nav">
              <li class="dropdown">
                <a class="dropdown-toggle"
                   data-toggle="dropdown"
                   style="background-color:#f49401;color:#fff;padding:5px 10px;"
                   href="#">
                   <img src="<?php echo Yii::app()->baseUrl."/images/botones/configuracion.png" ?>" />
                    <b>Configuración</b>               
                  </a>
                <ul class="dropdown-menu" style="background-color:#f3c683;position:static;margin:0px;padding:3px;border-radius:0px;box-sizing:border-box;width:100%;">
                    <li style="padding:10px 10px 10px 40px;"><b>
                        <a style="color:#623b10;" <?php echo 'href="'.CController::createurl('gruposClientes/index').'"'; ?>>
                            Grupos Solidarios
                        </a>                        
                    </b></li>
                    <li style="padding:10px 10px 10px 40px;border-top:1px solid #f9dea7;"><b>
                        <a style="color:#623b10;" <?php echo 'href="'.CController::createurl('tiposClientes/index').'"'; ?>>
                            Tipos de Clientes
                        </a>                        
                    </b></li>
                    <li style="padding:10px 10px 10px 40px;border-top:1px solid #f9dea7;"><b>
                        <a style="color:#623b10;" <?php echo 'href="'.CController::createurl('gruposSolicitudes/index').'"'; ?>>
                            Grupos de Solicitudes
                        </a>
                    </b></li>
                    <li style="padding:10px 10px 10px 40px;border-top:1px solid #f9dea7;"><b>
                        <a style="color:#623b10;" <?php echo 'href="'.CController::createurl('mailer/template/index').'"'; ?>>
                            Plantillas de Correo
                        </a>                        
                    </b></li>
                    <li style="padding:10px 10px 10px 40px;border-top:1px solid #f9dea7;"><b>
                        <a style="color:#623b10;" <?php echo 'href="'.CController::createurl('statusClientes/index').'"'; ?>>
                            Estatus de Clientes
                        </a>
                    </b></li>
                    <li style="padding:10px 10px 10px 40px;border-top:1px solid #f9dea7;"><b>
                        <a style="color:#623b10;" <?php echo 'href="'.CController::createurl('clavesBitacoras/index').'"'; ?>>
                            Claves de Bitacoras
                        </a>
                    </b></li>
                    <li style="padding:10px 10px 10px 40px;border-top:1px solid #f9dea7;"><b>
                        <a style="color:#623b10;" <?php echo 'href="'.CController::createurl('googleCalendar/index').'"'; ?>>
                            Calendario Google
                        </a>
                    </b></li>                   
                </ul>
              </li>
            </ul>
        </div> -->
    </div>  
</div>

