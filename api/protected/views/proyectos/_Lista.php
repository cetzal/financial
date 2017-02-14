<div class="wrap">
	<ul class="lista" id="lista">
	<?php foreach ($modeltarea as $key => $value) { ?>
		<li>
		<a href="#"><?php echo  $value->descripcion ?></a>
		<?php 
		 $asinados = TareasUsuario::model()->findAll("id_des_tareas =".$value->ID);

		 foreach ($asinados as $key => $user) {

		 	$username = User::model()->find('ID ='.$user->id_usuario);
		 	echo $username->usuario." ";
		 }
		 ?>
		</li>
	<?php } ?>
		
		<!-- <li><a href="#">2 Lorem ipsum dolor sit amet.</a></li>
		<li><a href="#">3 Lorem ipsum dolor sit amet.</a></li> -->
	</ul>
</div>