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
	<style type="text/css">
		html,body{
			height:100%;
		}
		#page{		
			height:100%;
			margin:0px;
			padding:0px;
		}
		#footer{		
			position:absolute;
			bottom:0px;		
			width:100%;
		}
	</style>
	 <!--[if lte IE 6]>
    <style type="text/css">
    	#page {
    		height: 100%;
    	}
    </style>
    <![endif]-->
</head>

<body>

<?php
	Yii::app()->clientScript->registerScript("resizeBackground", '
		function bgadj(){
        	var element = document.getElementById("bg");
		    var content = document.getElementById("page");
			element.style.left=content.offsetLeft+"px";
			element.style.top=content.offsetTop+"px";
        	element.style.width=content.clientWidth+"px";
			element.style.height = content.clientHeight+"px";
			element.style.display="inline";
			content.style.backgroundColor="transparent";
    	}
    	bgadj();
		window.onload = function() {    		
    		window.onresize = function() {
	        	bgadj();
	    	}			
		}
		$( document ).ajaxStop(function() {
		 	 bgadj();
		});	
	');
?>

<div id="page"">	
	<img id="bg" src="<?php echo Yii::app()->baseUrl ?>/images/main/fondoInicio.jpg"  alt="background" />
	<?php echo $content; ?>
	<div class="clearfix"></div>	
</div><!-- page -->
<div id="footer">
	Copyright &copy; <?php echo date('Y').' '.Yii::app()->params->proveedor; ?>.<br/>
	All Rights Reserved.<br/>
</div><!-- footer -->
</body>
</html>
