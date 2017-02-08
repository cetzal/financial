
<h1 class="page-heading"> Lista de Usuarios </h1>
<div class="the-box">
	<div class="row">
		<div class="col-lg-10  col-md-10 col-sm-10"></div>
		<div class="col-lg-12  col-md-12 col-sm-12">
			<div class="pull-right">
					<a href="<?php echo Yii::app()->createUrl('usuarios/nuevoUsuario'); ?>" class="btnMenuDelegated" title="" rel="nuevo_usuario" data-vars="{}">
						<button  id="btn_nuevo" class="btn btn-primary btn-large"><i class="fa fa-plus"></i> Nuevo Usuario</button>
						<!--style="float:right;"-->
					</a>
	  			<a class="" title="">
	  				<button class="btn btn-primary btn-large" onclick="$adivorEngine.Usuarios.imprimirUsuariosexcel()">
	  				<i class="fa fa-file-excel-o"></i> Descargar Lista en Excel</button>
	  			</a>
			</div>
		</div>
	</div>
	<br>
	<div class="table-responsive">
		<table class="table table-striped table-hover" id="datatable-usuarios">
		<thead class="the-box dark full">
			<tr>
				<th>Nombre Usuario</th>
				<th>Nombre Empleado</th>
				<th>Usuario</th>
				<th>E-mail</th>
				<th>Roles</th>
				<th class="centrado">Estatus</th>
				<th class="centrado">Acciones</th>
			</tr>
		</thead>
		<tbody>
	
	
			<?php
			foreach ($usuarios as $usuario)
			{
				$perm = "";
				/*if ($usuario->permiso)
				{
					$perm = $usuario->permiso->nombre;

				}*/

			?>
				<tr class='' id="">
				<td> <?php echo $usuario->nombre ?></td>
				<td><?php //echo $usuario->nombreEmpleado ?></td>
				<td> <?php echo $usuario->usuario ?> </td>
				<td> <?php echo $usuario->email ?> </td>
				<td> <?php echo $perm; ?></td>
				<td class="centrado">
					<?php 
						if($usuario->estatus == "activo") 
						{
							echo "<i class='fa fa-check'></i>"; 
						}else {
							echo "<i class='fa fa-times'></i>";
						}
					?>
				</td>
				<td class="centrado">
					<a href="#" rel="editar_usuario" class="btnMenuDelegated" data-vars='{"id":<?php echo $usuario->ID; ?>}' title="Editar Usuario">
						<i class="fa fa-pencil icon-circle icon-xs icon-default"></i>
					</a>
					
					<a href="#" rel="permisos_user" class="btnMenuDelegated" data-vars='{"id":<?php echo $usuario->ID; ?>}' title="Editar Permisos">
						<i class="fa fa-list icon-circle icon-xs icon-default"></i>
					</a>			
					
					<?php //if($permiso->eliminar()){ ?>
						<a href="#" rel="/usuarios/deleteUsuario" class="btnMenuDeleted" data-vars='{"id":<?=$usuario->ID ?>}' title="Eliminar Usuario">
							<i class="fa fa-times icon-xs icon-circle icon-default "></i>
						</a>
					<?php //} ?>
				</td>
			<?php
			}
			
			?>
			</tbody>
		</table>
	</div>	
</div>