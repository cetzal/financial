<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
	<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/main/favicon.ico" type="image/x-icon" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="es" />

	<?php //Yii::app()->bootstrap->register(); ?>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />
	<style type="text/less">
		@import url(http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic);
		.radial-progress {
		  	@circle-size: 50px;
			@circle-background: #d6dadc;
			@circle-color: #f49401;
			@inset-size: 35px;
			@inset-color: #fbfbfb;
			@transition-length: 1s;
			@shadow: 6px 6px 10px rgba(0,0,0,0.2);
			@percentage-color: #000;
			@percentage-font-size: 16px;
			@percentage-text-width: 40px;
			margin: 5px;
			
		
			width:  @circle-size;
			height: @circle-size;
		
			background-color: @circle-background;
			border-radius: 50%;
			.circle {
				.mask, .fill, .shadow {
					width:    @circle-size;
					height:   @circle-size;
					position: absolute;
					border-radius: 50%;
				}
				.shadow {
					box-shadow: @shadow inset;
				}
				.mask, .fill {
					-webkit-backface-visibility: hidden;
					transition: -webkit-transform @transition-length;
					transition: -ms-transform @transition-length;
					transition: transform @transition-length;
					border-radius: 50%;
				}
				.mask {
					clip: rect(0px, @circle-size, @circle-size, @circle-size/2);
					.fill {
						clip: rect(0px, @circle-size/2, @circle-size, 0px);
						background-color: @circle-color;
					}
				}
			}
			.inset {
				width:       @inset-size;
				height:      @inset-size;
				position:    absolute;
				margin-left: (@circle-size - @inset-size)/2;
				margin-top:  (@circle-size - @inset-size)/2;
		
				background-color: @inset-color;
				border-radius: 50%;
				box-shadow: @shadow;
				.percentage {
					width:       @percentage-text-width;
					position:    absolute;
					top:         (@inset-size - @percentage-font-size) / 2;
					left:        (@inset-size - @percentage-text-width) / 2;
		
					line-height: 1;
					text-align:  center;
		
					font-family: "Lato", "Helvetica Neue", Helvetica, Arial, sans-serif;
					color:       @percentage-color;
					font-weight: 800;
					font-size:   @percentage-font-size;
				}
			}
		
			@i: 0;
			@increment: 180deg / 100;
			.loop (@i) when (@i <= 100) {
				&[data-progress="@{i}"] {
					.circle {
						.mask.full, .fill {
							-webkit-transform: rotate(@increment * @i);
							-ms-transform: rotate(@increment * @i);
							transform: rotate(@increment * @i);
						}	
						.fill.fix {
							-webkit-transform: rotate(@increment * @i * 2);
							-ms-transform: rotate(@increment * @i * 2);
							transform: rotate(@increment * @i * 2);
						}
					}
					.inset .percentage:before {
						content: "@{i}%"
					}
				}
				.loop(@i + 1);
			}
			.loop(@i);
		}
	</style>
	<style type="text/css">
		#page{		
			margin-bottom:50px;		
		}
		#footer{		
			position:fixed;
			bottom:0px;
			left:0px;		
			width:100%;
		}
		.navbarTop .nav, .nav .dropdown{
			position: static !important;				
		}		
		.navbarTop .nav>li>a{				
			color:#fff !important;	
			text-shadow:none !important;		
			padding:20px !important;
			height:20px;
		}		
		.navbarTop .dropdown-menu {
			left: 0 !important;
			right: 0 !important;
			top:60px;
			margin:0px;
			border-radius:0px;
			background-color:#1f4379;			
			border:none;
		}
		.navbarTop .dropdown-menu > li{
			float: left !important;
		} 
		.navbarTop .dropdown-menu:before,.dropdown-menu:after{
			display: none !important;
		} 
		.navbarTop .dropdown-menu > li > a{
			width:auto !important;	
			color:#fff;				
		}	
		.dropdown:hover{
		    background-color:#1f4379 !important;
		}	
		.dropdown:hover .dropdown-menu {
		    display: block;
		}
		
	</style>
	<!--tostar-->
	<style>
	#snackbar {
	    visibility: hidden;
	    min-width: 250px;
	    margin-left: -300px;
	    background-color: #FE2E2E;
	    color: #fff;
	    text-align: center;
	    border-radius: 2px;
	    padding: 16px;
	    position: fixed;
	    z-index: 1;
	    left: 50%;
	    bottom: 300px;
	    font-size: 17px;
	}
	#snackbar.show {
    visibility: visible;
    -webkit-animation: fadein 0.5s, fadeout 60.5s 60.5s;
    animation: fadein 0.5s, fadeout 60.5s 60.5s;

}

@-webkit-keyframes fadein {
    from {bottom: 0; opacity: 0;} 
    to {bottom: 300px; opacity: 1;}
}

@keyframes fadein {
    from {bottom: 0; opacity: 0;}
    to {bottom: 300px; opacity: 1;}
}

@-webkit-keyframes fadeout {
    from {bottom: 300px; opacity: 1;} 
    to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
    from {bottom: 300px; opacity: 1;}
    to {bottom: 0; opacity: 0;}
}
		
	</style>
	<!--plugin of show info-->
	<!-- <link href="jquery.floating-messages.min.css" rel="stylesheet">
	    <script src="jquery.floating-messages.min.js"></script> -->
    <!--end plugin show info-->
	<script src="//cdnjs.cloudflare.com/ajax/libs/less.js/1.6.1/less.min.js"></script>
	<!--es el controlatodo  el sistema-->
	<script type="text/javascript" src="<?php echo yii::app()->request->baseUrl; ?>/js/app.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo yii::app()->request->baseUrl; ?>/assets/plugins/chosen/chosen.min.css" />
	<script type="text/javascript" src="<?php echo yii::app()->request->baseUrl; ?>/assets/plugins/chosen/chosen.jquery.min.js">
	</script>
	
	<script type="text/javascript">
		//$('head style[type="text/css"]').attr('type', 'text/less');
		
		<?php 
			/*function foldersize($path) {
				$total_size = 0;
				$files = scandir($path);
				$cleanPath = rtrim($path, '/'). '/';
			
				foreach($files as $t) {
					if ($t<>"." && $t<>"..") {
						$currentFile = $cleanPath . $t;
						if (is_dir($currentFile)) {
							$size = foldersize($currentFile);
							$total_size += $size;
						}
						else {
							$size = filesize($currentFile);
							$total_size += $size;
						}
					}
				}
			
				return $total_size;
			}
			
			$path=Yii::app()->basePath."/customerFiles";
			$total_size_files = foldersize($path);			
			$total_size_files=$total_size_files/1024/1024;//Esta en bytes y se pasa a megabytes
			$total_size_db=Empresa::model()->getDbConnection()->createCommand("SELECT SUM(round(((data_length + index_length)/1024/1024),2)) 'Size in MB' FROM information_schema.TABLES WHERE table_schema='softcred_dmo_demo'")->queryScalar();
			$total_size=$total_size_files+$total_size_db;*/
		?>

		/*less.refreshStyles();
		window.randomize = function() {
			var limite=<?php //echo Empresa::model()->find()->espacio ?>;
			var actual=<?php //echo $total_size; ?>;
			$('.radial-progress').attr('data-progress', Math.floor(actual/limite*100));
		}*/

		/*setTimeout(window.randomize, 200);

		$('.radial-progress').click(window.randomize);

		window.myFunction = function()  {
            var x = document.getElementById("snackbar")
            x.className = "show";
            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 10000);
  		}*/
  <?php 
 /* $limite= Empresa::model()->find()->espacio;
  if ($total_size > $limite) {
	echo "setTimeout(window.myFunction, 200)";
}*/ ?>
  		
	</script>
</head>

<body>

<div id="snackbar">Se A Superado el Espacio Diponible Contactece con el Administrador del Sistema <br> info@financialgroup.mx </div>
<?php 
	/*if(Yii::app()->user->getPerfil()=="Administrador"){
		$espacio='
			<div class="radial-progress pull-right" data-progress="0">
				<div class="circle">
					<div class="mask full">
						<div class="fill"></div>
					</div>
					<div class="mask half">
						<div class="fill"></div>
						<div class="fill fix"></div>
					</div>
					<div class="shadow"></div>
				</div>
				<div class="inset">
					<div class="percentage"></div>
				</div>
			</div>
		';
	}else{
		$espacio="";
	}*/
	//echo $espacio;
?>

<?php 
	/*$this->widget('bootstrap.widgets.TbNavbar',
	array(
		'brand'=>false,
		'brandUrl'=>array('site/index'),
		'brandOptions'=>array('encodeLabel'=>false),
	    'htmlOptions'=>array(
			'style'=>'background-color:#dadbdc;',
			'class'=>'navbarTop',
		),
		'items'=>array(
			'<div class="pull-left" style="margin-bottom:5px"><img src="'.Yii::app()->baseUrl.'/images/main/logosoftcredito50.png" /></div>',
			'<div class="span5 pull-right" style="padding-top:20px">
				<div class="pull-right">
					'.
					(Yii::app()->user->isGuest==false?"":('<div class="span"><a href="'.Yii::app()->createUrl("site/login").'"><img src="'.Yii::app()->baseUrl.'/images/main/login30.png" title="Iniciar"></a></div>')).'
					<div class="pull-right" style="padding-left:10px">'.
						('<a href="'.Yii::app()->createUrl("site/contact").'"><img src="'.Yii::app()->baseUrl.'/images/main/contacto30.png" title="Contacto"></a>').'
					</div>
					<div class="pull-right" style="padding-left:10px">
						<a href="'.(Yii::app()->user->isGuest==false?Yii::app()->createUrl(Yii::app ()->user->getHome()):Yii::app()->createUrl("site/index")).'"><img src="'.Yii::app()->baseUrl.'/images/main/inicio30.png" title="Inicio"></a>
					</div>
					<div class="titulos pull-right" style="font-weight:bold; padding-left:10px">'.
						(Yii::app()->user->isGuest?"":'<span>'.Yii::app()->user->getFullName().' </span><a href="'.Yii::app()->createUrl("usuarios/changePassword").'"><img src="'.Yii::app()->baseUrl.'/images/main/password30.png" style="height:17px" alt="Cambiar Contraseña" title="Cambiar Contraseña"></a> <a href="'.Yii::app()->createUrl("site/logout").'"><img src="'.Yii::app()->baseUrl.'/images/main/salir30.png" style="height:12px" alt="Salir" title="Salir"></a>').'
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="clearfix"></div>',
			array(
				'class'=>'bootstrap.widgets.TbBreadcrumbs',
				'encodeLabel'=>false,
				'homeLink'=>CHtml::link('<span class="btn btn-primary btn-small">Inicio</span>', array('/site/index')),
				'links'=>isset($this->breadcrumbs)?$this->breadcrumbs:'',
			),
		),
	));*/	
?>
<?php $this->widget('bootstrap.widgets.TbNavbar',
	array(
		'brand'=>false,
		'fluid'=>true,
		'brandUrl'=>array('site/index'),
		'brandOptions'=>array('encodeLabel'=>false),
	    'htmlOptions'=>array(
			'style'=>'background-color:#152e5b; color:#fff;',
			'class'=>'navbarTop',
		),
		'items'=>array(
			'<div class="pull-left" style="margin-bottom:5px"><a href="'.Yii::app()->baseUrl.'"><img style="height:20px;padding:20px 5px 5px 5px;" src="'.Yii::app()->baseUrl.'/images/main/logosoftcredito70.png" /></a></div>',
			'<div class="nav pull-left">
				<li class="dropdown">
		            <a href="'.Yii::app()->createUrl("proyectos/index").'">Proyectos</a>
		            <ul class="dropdown-menu" role="menu">
		                
		            </ul>
		        </li>
			</div>',
			'<div class="nav pull-left">
				<li class="dropdown">
		            <a href="'.Yii::app()->createUrl("catalogoAnalisis/index").'">Analisis</a>
		            <ul class="dropdown-menu" role="menu">
		               
		            </ul>
		        </li>
			</div>',
			'<div class="nav pull-left">
				<li class="dropdown">
		            <a href="'.Yii::app()->createUrl("catalogoSistemaSupervision/index").'">Supervisión</a>
		            <ul class="dropdown-menu" role="menu">
						
		            </ul>
		        </li>
			</div>',
			'<div class="nav pull-left">
				<li class="dropdown">
		            <a href="'.Yii::app()->createUrl("catalogoReportes/index").'">Reportes</a>
		            <ul class="dropdown-menu" role="menu">
						
		            </ul>
		        </li>
			</div>',
			'<div class="nav pull-left">
				<li class="dropdown">
		           <a href="'.Yii::app()->createUrl("catalogoSistemaPLD/index").'">PLD</a>
		            <ul class="dropdown-menu" role="menu">
				
		            </ul>
		        </li>
			</div>',
			'<div class="nav pull-left">
				<li class="dropdown">
		           <a href="'.Yii::app()->createUrl("catalogoContabilidad/index").'">Contabilidad</a>
		            <ul class="dropdown-menu" role="menu">
				
		            </ul>
		        </li>
			</div>',
			'<div class="nav pull-left">
				<li class="dropdown">
		           <a href="'.Yii::app()->createUrl("catalogoFactoraje/index").'">Factoraje</a>
		            <ul class="dropdown-menu" role="menu">
				
		            </ul>
		        </li>
			</div>',
			'<div id="tareas" class="pull-right" style="background-color:#193669; height:60px;">
				<div class="pull-right" style="height:100%">
					<div class="pull-right tarea" style="padding-top:10px;padding-right:10px;font-weight:bold; padding-left:10px;text-align:center;">'.
						(Yii::app()->user->isGuest?"":'<a style="color:#fff;" href="'.Yii::app()->createUrl("site/logout").'"><img src="'.Yii::app()->baseUrl.'/images/botones/btnSalir40.png" style="height:22px" alt="Salir" title="Salir"><span class="texto-tarea">Salir</span></a>').'
					</div>
					<div class="pull-right tarea" style="padding-top:10px;padding-right:10px;font-weight:bold; padding-left:10px;text-align:center;">'.
						(Yii::app()->user->isGuest?"":'<a style="color:#fff;" href="'.Yii::app()->createUrl("usuarios/changePassword").'"><img src="'.Yii::app()->baseUrl.'/images/botones/btnChangePassword40.png" style="height:22px" alt="Cambiar Contraseña" title="Cambiar Contraseña"><span class="texto-tarea">Acceso</span></a>').'
					</div>
					<!--<div class="pull-right tarea" style="padding-top:10px;font-weight:bold; padding-left:10px;text-align:center;">
						<a style="color:#fff;" href="'.Yii::app()->createUrl("avisos/index").'"><span style="font-weight: bold;color: #F7F1F1;position:relative;bottom:10px;margin-right:-20px;font-size:10px;background-color: #E68038;border-radius: 15px;padding: 2px 5px;"></span><img src="'.Yii::app()->baseUrl.'/images/botones/btnAvisos40.png" style="width:22px" alt="Avisos" title="Avisos"><span class="texto-tarea">Avisos</span></a>
					</div>-->
					<div class="nav pull-right tarea" style="padding-top:10px;font-weight:bold;padding-left:10px;text-align:center;">
						<a style="color:#fff;" href="'.Yii::app()->createUrl("catalogoParametrizacion/index").'"><img src="'.Yii::app()->baseUrl.'/images/botones/configuracion.png" style="width:22px" alt="Configuración" title="Configuración"><span class="texto-tarea">Config.</span></a>
					</div>
					<!--<div class="nav pull-right tarea" style="padding-top:10px;font-weight:bold;padding-left:10px;text-align:center;">
						<a style="color:#fff;" target="_blank" href="http://faq.softcredito.com"><img src="'.Yii::app()->baseUrl.'/images/botones/faq.png" style="width:22px" alt="FAQ" title="FAQ"><span class="texto-tarea">FAQ</span></a>
					</div>-->
					<!--<div class="nav pull-right tarea" style="padding-top:10px;font-weight:bold;padding-left:10px;text-align:center;">
						<a style="color:#fff;" target="_blank" href="http://softcredito.com/soporte"><img src="'.Yii::app()->baseUrl.'/images/botones/ticket40.png" style="width:30px;height:15px;" alt="Tickets" title="Tickets"><span class="texto-tarea">Tickets</span></a>
					</div>-->
					</div>
					
					<div class="clearfix"></div>
					<div style="background-color:#f49401;text-align:center;"></div>
				</div>
			</div>',
		),
	));
?>

<?php
	Yii::app()->clientScript->registerScript("resizeBackground", '
		window.onload = function() {
    		function bgadj(){
        		var element = document.getElementById("bg");
		        var content = document.getElementById("content");
				element.style.left=content.offsetLeft+"px";
				element.style.top=content.offsetTop+"px";
        		element.style.width=content.clientWidth+"px";
				element.style.height = content.clientHeight+"px";
				element.style.display="inline";
				content.style.backgroundColor="transparent";
    		}
    		bgadj();
    		window.onresize = function() {
	        	bgadj();
	    	}
		}
	');
?>
<div id="enlaces" style="padding-top:70px;margin-left:98px;">
	<div class="clearfix"></div>
</div>
<div class="container" id="page">
	<div>
		<img id="bg" src="<?php echo yii::app()->theme->baseUrl; ?>/images/main/page.png"  alt="background" />
		<?php echo $content; ?>
		<div class="clear"></div>
	</div>
	
	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?>.<br/>
		All Rights Reserved.<br/>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
