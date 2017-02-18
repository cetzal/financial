
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="background: #37BC9B;">
	<div class="login-header text-center">
		<img src="sentir/assets/img/logo-login.png" class="logo" alt="Logo">
	</div>
	<div class="login-wrapper" >
		<h1 class="error-number"> Error <?php echo CHtml::encode($code);  ?></h1>
		<div class="error text-center alert alert-warning fade in alert-dismissable">
			<?php echo CHtml::encode($message); ?>
		</div>
		<p class="text-center">
			<strong>
				<a href="#" rel="home" class="btnMenuDelegated" data-vars="{}">
					Inicio
				</a>
			</strong>
		</p>
	</div><!-- /.login-wrapper -->
</div>