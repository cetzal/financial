<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Login / Register Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />


<script type="application/x-javascript"> 
	addEventListener("load", function() 
	{ 
		setTimeout(hideURLbar, 0); 
	}, false); 

	function hideURLbar()
	{ 
		window.scrollTo(0,1); 
	} 
		
</script>
<!-- Custom Theme files -->
<link href="<?php echo yii::app()->request->baseUrl; ?>/assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo yii::app()->request->baseUrl; ?>/assets/css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo yii::app()->request->baseUrl; ?>/assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo yii::app()->request->baseUrl; ?>/assets/plugins/toastr/toastr.min.css" rel="stylesheet">
	<script src="<?php echo yii::app()->request->baseUrl; ?>/assets/plugins/toastr/toastr.min.js"></script>
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Oswald:400,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

<!-- //web font -->
</head>
<body>
<h1>Login</h1>
<div class="main-agileits">
<!--form-stars-here-->
		<div class="form-w3-agile">
			<h2>Credit login form</h2>
			<form action="#" method="post" id="login-form">
				<div class="form-sub-w3">
					<input type="text" name="LoginForm[Username]" placeholder="Customer number or username " required="" />
				<div class="icon-w3">
					<i class="fa fa-user" aria-hidden="true"></i>
				</div>
				</div>
				<div class="form-sub-w3">
					<input type="password" name="LoginForm[Password]" placeholder="Password" required="" />
				<div class="icon-w3">
					<i class="fa fa-unlock-alt" aria-hidden="true"></i>
				</div>
				</div>
				<div class="submit-w3l">
					<input type="submit" value="Login">
				</div>
			</form>
		</div>
<!--//form-ends-here-->
</div>
<div id="small-dialog1" class="mfp-hide">
					
<!-- copyright -->
	<div class="copyright w3-agile">
		<!-- <p></p> -->
	</div>
	<!-- //copyright --> 
	<script type="text/javascript" src="<?php echo yii::app()->request->baseUrl; ?>/assets/js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="<?php echo yii::app()->request->baseUrl; ?>/js/app.js"></script>
	<!-- pop-up-box -->  
		<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
	<!--//pop-up-box -->
	<script>
		$(document).ready(function() {
		$('.w3_play_icon,.w3_play_icon1,.w3_play_icon2').magnificPopup({
			type: 'inline',
			fixedContentPos: false,
			fixedBgPos: true,
			overflowY: 'auto',
			closeBtnInside: true,
			preloader: false,
			midClick: true,
			removalDelay: 300,
			mainClass: 'my-mfp-zoom-in'
		});
																		
		});
	</script>
</body>
</html>