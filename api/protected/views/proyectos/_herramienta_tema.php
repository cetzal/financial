<link rel="stylesheet" href="//fonts.googleapis.com/icon?family=Material+Icons">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,500,400italic,700,700italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="//storage.googleapis.com/code.getmdl.io/1.0.1/material.teal-red.min.css" />
<script src="//storage.googleapis.com/code.getmdl.io/1.0.1/material.min.js"></script>
<div class="contenedor">
	<h1><?php echo $model->nombre; ?></h1>
		<div class='mdl-grid btnmenutarget' id='id_tergeta' data-vars="">
			<div class='mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-shadow--2dp'>
       			<a class='card__link' data-role='project_card_content' href=''>
	            	<div class='mdl-card__title'>
	                 	<h5 class='mdl-card__title-text'>Calendario</h5>
	            	</div>
	            	<div class='mdl-card__supporting-text tamanio'>
	                	<p></p>
	            	</div>
	            	<div class='mdl-card__actions mdl-card--border'>
	              	 <!-- <a class='mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect'>Read More</a>-->
	                	<div class='mdl-layout-spacer'></div>
	                	<button class='mdl-button mdl-button--icon mdl-button--colored'><i class='material-icons'>favorite</i></button>
	               	 	<button class='mdl-button mdl-button--icon mdl-button--colored'><i class='material-icons'>share</i></button>
	            	</div>
           		</a>
        	</div>

        	<div class='mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-shadow--2dp'>
       			<a class='card__link' data-role='project_card_content' <?php echo 'href="'.CController::createurl('proyectos/agregarListTareas',array('id'=>$model->ID)).'"'; ?> >
	            	
	            	<div class='mdl-card__title'>
	                 	<h5 class='mdl-card__title-text'>Tareas</h5>
	            	</div>
	            	<div class='mdl-card__supporting-text tamanio'>
	                	<?php 
                            $tarea = Tarea::model()->findAll("id_tema =".$model->ID." LIMIT 3");
                             foreach ($tarea as $key => $arealizar) {
                                echo $arealizar->titulo."<br>";
                             }
                         ?>
	            	</div>
	            	<div class='mdl-card__actions mdl-card--border'>
	              	 <!-- <a class='mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect'>Read More</a>-->
	                	<div class='mdl-layout-spacer'></div>
	                	<button class='mdl-button mdl-button--icon mdl-button--colored'><i class='material-icons'>favorite</i></button>
	               	 	<button class='mdl-button mdl-button--icon mdl-button--colored'><i class='material-icons'>share</i></button>
	            	</div>
           		</a>
        	</div>
        </div>
        </div>
       <!--  <div class='mdl-grid btnmenutarget' id='id_tergeta' data-vars="">
       			<div class='mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-shadow--2dp'>
              			<a class='card__link' data-role='project_card_content' href=''>
       	            	<figure class='mdl-card__media'>
       	                	<img src='http://tfirdaus.github.io/mdl/images/laptop.jpg' alt='' />
       	            	</figure>
       	            	<div class='mdl-card__title'>
       	                 	<h5 class='mdl-card__title-text'></h5>
       	            	</div>
       	            	<div class='mdl-card__supporting-text tamanio'>
       	                	<p></p>
       	            	</div>
       	            	<div class='mdl-card__actions mdl-card--border'>
       	              	 <a class='mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect'>Read More</a>
       	                	<div class='mdl-layout-spacer'></div>
       	                	<button class='mdl-button mdl-button--icon mdl-button--colored'><i class='material-icons'>favorite</i></button>
       	               	 	<button class='mdl-button mdl-button--icon mdl-button--colored'><i class='material-icons'>share</i></button>
       	            	</div>
          		</a>
       	</div>
       </div>	 -->
