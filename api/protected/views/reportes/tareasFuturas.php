<link rel="stylesheet" href="//fonts.googleapis.com/icon?family=Material+Icons">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,500,400italic,700,700italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="//storage.googleapis.com/code.getmdl.io/1.0.1/material.teal-red.min.css" />
<script src="//storage.googleapis.com/code.getmdl.io/1.0.1/material.min.js"></script>
<style>
.contetList{
	width: 45%;
}
  ul{
  	list-style: none;
  }
 .accordion {
 	width: 100%;
 	max-width: 360px;
 	margin: 30px auto 20px;
 	background: #FFF;
 	-webkit-border-radius: 4px;
 	-moz-border-radius: 4px;
 	border-radius: 4px;
 }

 .accordion, .link {
 	padding-left: 3em;
	cursor: pointer;
	display: block;
	/*padding: 15px 15px 15px 42px;*/
	color: #000;
	font-size: 14px;
	font-weight: 700;
	/* border-bottom: 1px solid #CCC; */
	position: relative;
	-webkit-transition: all 0.4s ease;
	-o-transition: all 0.4s ease;
	transition: all 0.4s ease;
}

.accordion li:last-child .link {
	border-bottom: 0;
}
.accordion li i {
	position: absolute;
	top: 16px;
	left: 12px;
	font-size: 18px;
	color: #595959;
	-webkit-transition: all 0.4s ease;
	-o-transition: all 0.4s ease;
	transition: all 0.4s ease;
}

.accordion li i.fa-chevron-down {
	right: 12px;
	left: auto;
	font-size: 16px;
}

.accordion li.open .link {
	color: #b63b4d;
}

.accordion li.open i {
	color: #b63b4d;
}
.accordion li.open i.fa-chevron-down {
	-webkit-transform: rotate(180deg);
	-ms-transform: rotate(180deg);
	-o-transform: rotate(180deg);
	transform: rotate(180deg);
}
.submenu {
 	/* background: #444359; */
 	font-size: 12px;
 	font-family: helvetica;
 }

 .submenu li {
 	/* padding-bottom: 0px; */
 	padding: 8px;
 	border-bottom: 1px solid #4b4a5e;
 }

 .submenu a {
 	/* display: block; */
 	/* text-decoration: none; */
 	/* color: #d9d9d9; */
 	/* background: #b63b4d; */
 	padding: 5px;
 	padding-left: 3px;
 	-webkit-transition: all 0.25s ease;
 	-o-transition: all 0.25s ease;
 	transition: all 0.25s ease;
 }

 .submenu a:hover {
 	/* background: #b63b4d; */
 	/* color: #FFF; */
 }
 
 
</style>
<div class="contenedor">
<h1>Tareas futuras</h1>
<div class="contetList">
		<ul class="menu" id="accordion" >
			<?php  foreach ($model as $key => $value) {  

				?>
		     <li>
		        <div class="link"><h4><?php //echo "<font color='red'>".$diasatraso." de Atraso</font>"; ?></h4></div>
		          <ul class="submenu">
		            <li> 
		            	<?php  echo "<p>".$value->descripcion."</p> fecha ".$value->fecha_inicio." avances ".$value->progres."%". $value->ID; ?> 

		            	<?php $asinados = TareasUsuario::model()->findAll("id_des_tareas =".$value->ID);

		            		 foreach ($asinados as $key => $user) { 
							 	$username = User::model()->find('ID ='.$user->id_usuario);
							 	$rest = substr($username->usuario, 0, 1);
							 	?>
							 	<button class='mdl-button mdl-button--icon mdl-button--colored'><?php echo $rest; ?></button>
							 	<?php echo $username->usuario; ?>
							 <?php }  ?>
		            	
		            </li>
		          </ul>
		     </li>
			<?php } ?>
		</ul>
	</div>
	
</div>