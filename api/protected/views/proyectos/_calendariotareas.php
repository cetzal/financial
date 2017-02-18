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
	border-bottom: 1px solid #CCC;
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
	<h1>Calendario</h1>
	<div class="row-fluid">
		
	</div>
	
	<div class="contetList">
		<ul class="menu" id="accordion" >
		     <li>
		        <div class="link" style="background: #00FFFF;"><h4>Enero <?php echo date('Y'); ?></h4></div>
		          <ul class="submenu">
			          <?php foreach ($data as $key => $value) { ?>
				          <?php if ($value->fecha_inicio <= "2017-01-01" and $value->fecha_inicio >= "2017-01-31") { ?>
				          		<li><?php echo $value->descripcion." ". $value->fecha_inicio ?></li>
				          <?php } ?>
			          <?php } ?>
					
		          </ul>
		     </li>
		     <li>
		        <div class="link" style="background: #FF0000;"><h4>Febrero <?php echo date('Y'); ?></h4></div>
		          <ul class="submenu">
					 <?php foreach ($data as $key => $value) { ?>
				          <?php if ($value->fecha_inicio >= "2017-02-01" and $value->fecha_inicio <= "2017-02-28") { ?>
				          		<li><?php echo $value->descripcion." ". $value->fecha_inicio ?></li>
				          <?php } ?>
			          <?php } ?>
		          </ul>
		     </li>
		     <li>
		        <div class="link" style="background: #0000FF;"><h4>Marzo <?php echo date('Y'); ?></h4></div>
		          <ul class="submenu">
					  <?php foreach ($data as $key => $value) { ?>
				          <?php if ($value->fecha_inicio >= "2017-03-01" and $value->fecha_inicio <= "2017-03-31") { ?>
				          		<li><?php echo $value->fecha_inicio ?></li>
				          <?php } ?>
			          <?php } ?>
		          </ul>
		     </li>
		     <li>
		        <div class="link" style="background: #0000A0;"><h4>Abril <?php echo date('Y'); ?></h4></div>
		          <ul class="submenu">
					 <?php foreach ($data as $key => $value) { ?>
				          <?php if ($value->fecha_inicio >= "2017-04-01" and $value->fecha_inicio <= "2017-04-30") { ?>
				          		<li><?php echo $value->fecha_inicio ?></li>
				          <?php } ?>
			          <?php } ?>
		          </ul>
		     </li>
		     <li>
		        <div class="link" style="background: #FF0080;"><h4>Mayo <?php echo date('Y'); ?></h4></div>
		          <ul class="submenu">
					 <?php foreach ($data as $key => $value) { ?>
				          <?php if ($value->fecha_inicio >= "2017-05-01" and $value->fecha_inicio <= "2017-05-31") { ?>
				          		<li><?php echo $value->fecha_inicio ?></li>
				          <?php } ?>
			          <?php } ?>
		          </ul>
		     </li>
		     <li>
		        <div class="link" style="background: #800080;"><h4>Julio <?php echo date('Y'); ?></h4></div>
		          <ul class="submenu">
					 <?php foreach ($data as $key => $value) { ?>
				          <?php if ($value->fecha_inicio >= "2017-06-01" and $value->fecha_inicio <= "2017-06-30") { ?>
				          		<li><?php echo $value->fecha_inicio ?></li>
				          <?php } ?>
			          <?php } ?>
		          </ul>
		     </li>
		     <li>
		        <div class="link" style="background: #FFFF00;"><h4>Junio <?php echo date('Y'); ?></h4></div>
		          <ul class="submenu">
					 <?php foreach ($data as $key => $value) { ?>
				          <?php if ($value->fecha_inicio >= "2017-08-01" and $value->fecha_inicio <= "2017-08-31") { ?>
				          		<li><?php echo $value->fecha_inicio ?></li>
				          <?php } ?>
			          <?php } ?>
		          </ul>
		     </li>
		     <li>
		        <div class="link" style="background: #00FF00;"><h4>Agosto <?php echo date('Y'); ?></h4></div>
		          <ul class="submenu">
					 <?php foreach ($data as $key => $value) { ?>
				          <?php if ($value->fecha_inicio >= "2017-08-01" and $value->fecha_inicio <= "2017-08-31") { ?>
				          		<li><?php echo $value->descripcion." ". $value->fecha_inicio ?></li>
				          <?php } ?>
			          <?php } ?>
		          </ul>
		     </li>
		     <li>
		        <div class="link" style="background: #FF00FF;"><h4>Septiembre <?php echo date('Y'); ?></h4></div>
		          <ul class="submenu">
					 <?php foreach ($data as $key => $value) { ?>
				          <?php if ($value->fecha_inicio >= "2017-09-01" and $value->fecha_inicio <= "2017-09-30") { ?>
				          		<li><?php echo $value->fecha_inicio ?></li>
				          <?php } ?>
			          <?php } ?>
		          </ul>
		     </li>
		     <li>
		        <div class="link" style="background: #FF8040;"><h4>Octubre <?php echo date('Y'); ?></h4></div>
		          <ul class="submenu">
					 <?php foreach ($data as $key => $value) { ?>
				          <?php if ($value->fecha_inicio >= "2017-10-01" and $value->fecha_inicio <= "2017-10-31") { ?>
				          		<li><?php echo $value->fecha_inicio ?></li>
				          <?php } ?>
			          <?php } ?>
		          </ul>
		     </li>
		     <li>
		        <div class="link" style="background: #804000;"><h4>Noviembre <?php echo date('Y'); ?></h4></div>
		          <ul class="submenu">
					 <?php foreach ($data as $key => $value) { ?>
				          <?php if ($value->fecha_inicio >= "2017-11-01" and $value->fecha_inicio <= "2017-11-30") { ?>
				          		<li><?php echo $value->fecha_inicio ?></li>
				          <?php } ?>
			          <?php } ?>
		          </ul>
		     </li>
		     <li>
		        <div class="link" style="background: #808000;"><h4>Diciembre <?php echo date('Y'); ?></h4></div>
		          <ul class="submenu">
					 <?php foreach ($data as $key => $value) { ?>
				          <?php if ($value->fecha_inicio >= "2017-12-01" and $value->fecha_inicio <= "2017-12-31") { ?>
				          		<li><?php echo $value->fecha_inicio ?></li>
				          <?php } ?>
			          <?php } ?>
		          </ul>
		     </li>
		</ul>
	</div>
	
</div>