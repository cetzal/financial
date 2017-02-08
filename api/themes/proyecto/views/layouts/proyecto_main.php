<!DOCTYPE html>
<html>
<head>
<title>proyectos</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Elite Bakery Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free web designs for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />


<script type="application/x-javascript"> 
addEventListener("load", function() { 
	setTimeout(hideURLbar, 0); 
}, false);

		function hideURLbar()
		{ 
			window.scrollTo(0,1); 
		} 
</script>

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" media="screen, projection" />

<!-- //for-mobile-apps -->
<link href="<?php echo yii::app()->theme->baseUrl; ?>/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo yii::app()->theme->baseUrl; ?>/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo yii::app()->theme->baseUrl; ?>/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<!-- for-gallery-rotation -->
<script src="js/modernizr.custom.97074.js"></script>
<!-- //for-gallery-rotation -->
<!-- FlexSlider -->
<link rel="stylesheet" href="<?php echo yii::app()->theme->baseUrl; ?>/css/flexslider.css" type="text/css" media="screen" />
<script defer src="<?php echo yii::app()->theme->baseUrl; ?>/js/jquery.flexslider.js"></script>
<script type="text/javascript">
						$(window).load(function(){
						  $('.flexslider').flexslider({
							animation: "slide",
							start: function(slider){
							  $('body').removeClass('loading');
							}
						  });
						});
					  </script>
<!-- //FlexSlider -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="<?php echo yii::app()->theme->baseUrl; ?>/js/move-top.js"></script>
<script type="text/javascript" src="<?php echo yii::app()->theme->baseUrl; ?>/js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Comfortaa:400,300,700' rel='stylesheet' type='text/css'>
<link href="//fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900" rel="stylesheet">
</head>

<body>
<!-- header -->
	<div class="header">
		<div class="container">
			<div class="header-nav">
				<nav class="navbar navbar-default">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
						<div class="logo">
							<h1><a class="navbar-brand" href="index.html"><label>E</label>lite <label>B</label>akery<span>Baked Good Taste for you </span></a></h1>
						</div>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
					 <ul class="nav navbar-nav">
					 <!--class hvr-sweep-to-bottom-->
						<li class=""><a href="index.html">Home</a></li>
						<li class=""><a href="#about" class="scroll">Services</a></li>
						<li class=""><a href="#services" class="scroll">About</a></li>
						<li class=""><a href="#gallery" class="scroll">Gallery</a></li>
						<li class=""><a href="<?php echo Yii::app()->createUrl('usuarios/index'); ?>" class="scroll">Usuarios</a></li>
					  </ul>
					</div><!-- /.navbar-collapse -->
				</nav>
			</div>
		</div>

	</div>
	<div class="clearfix"> </div>
<!-- //header -->
<!-- contenedor principal -->
	<div class="container">

	<?php echo $content; ?>

	</div>
<!-- //contenedor principal -->

<!-- footer -->
	<div class="copy">
		<div class="container">
			<div class="copy-left-w3l-agile">
				<p>© 2017 All rights reserved | Design by omar Cetazal</p>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!--//footer-->
<!-- for bootstrap working -->
		<script src="js/bootstrap.js"> </script>
<!-- //for bootstrap working -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
</body>
</html>