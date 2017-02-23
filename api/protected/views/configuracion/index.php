<?php
/* @var $this ConfiguracionController */

$this->breadcrumbs = array (
        '<span class="btn btn-primary btn-small">home</span>' => array ("empresa/index"
                //Yii::app()->user->getHome(),
        ),
        '<span class="btn btn-primary btn-small">configuracion</span>'=>array('empresa/index'),
        '<span class="btn btn-small active">Administradores</span>'=>array('empresa/index'),
);

?>
<div id="new" class="titulos contenedor" style="text-align:left;">
    <h3>Confguracion General</h3>
    <div class="row-fluid">
        <div class="span9">
          <div class="row-fluid">
				<div class="span12" style="color:#fff;">
					<div class="span6" style="background-color:#162e5c;">
						<div class="span4" style="background-color:#1f4278; height:100%;">
							<img class="span10 offset1" style="margin-top:30px;margin-bottom:30px;" src="<?php echo Yii::app()->baseUrl."/images/botones/actividades.png" ?>">
						</div>
						 <div class="span8">
                            <h4>Empresa</h4>
                            <ul>
                                <li>
                                    <a <?php echo 'href="'.CController::createurl('empresa/index').'"'; ?> >
                                        Datos de la empresa
                                    </a>                                    
                                </li>                   
                            </ul>                           
                        </div>
					</div>
					<div class="span6" style="background-color:#162e5c;">
						<div class="span4" style="background-color:#1f4278; height:100%;">
							<img class="span10 offset1" style="margin-top:30px;margin-bottom:30px;" src="<?php echo Yii::app()->baseUrl."/images/botones/cotizacion.png" ?>">
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
			<br>
           <div class="row-fluid">
				<div class="span12" style="color:#fff;">
					<div class="span6" style="background-color:#162e5c;">
						<div class="span4" style="background-color:#1f4278; height:100%;">
							<img class="span10 offset1" style="margin-top:30px;margin-bottom:30px;" src="<?php echo Yii::app()->baseUrl."/images/botones/cotizacion.png" ?>">
						</div>
						<div class="span8">
							<h4>Cuentas</h4>
							<ul>
								<li>
									<a <?php echo 'href="'.CController::createurl('configMail/index').'"'; ?>>
										Servidor de envío de correo
									</a>										
								</li>																				
							</ul>
						</div>
					</div>
				</div>
			</div>	      
        </div>
    </div>  
</div>
