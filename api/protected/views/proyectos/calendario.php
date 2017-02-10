<link rel="stylesheet" href="//fonts.googleapis.com/icon?family=Material+Icons">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,500,400italic,700,700italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="//storage.googleapis.com/code.getmdl.io/1.0.1/material.teal-red.min.css" />
<script src="//storage.googleapis.com/code.getmdl.io/1.0.1/material.min.js"></script>

<?php

$content = "";

$i = 0;

foreach($fechas as $dias)
    {

    if($i === 0)
        {       
                $content .= "<div><div class='mdl-grid'>";
        }

        $content .= "<div class='mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-shadow--2dp'>
	  <figure class='mdl-card__media'>
	    <!--<img src='http://tfirdaus.github.io/mdl/images/laptop.jpg' alt='' />-->".
        $dias.
	  "</figure>
	  <div class='mdl-card__title'>
	    <h1 class='mdl-card__title-text'>Learning Web Design</h1>
	  </div>
	  <div class='mdl-card__supporting-text'>
	    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam accusamus, consectetur.</p>
	  </div>
	  <div class='mdl-card__actions mdl-card--border'>
	    <a class='mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect'>Read More</a>
	    <div class='mdl-layout-spacer'></div>
	    <button class='mdl-button mdl-button--icon mdl-button--colored'><i class='material-icons'>favorite</i></button>
	    <button class='mdl-button mdl-button--icon mdl-button--colored'><i class='material-icons'>share</i></button>
	  </div>
	</div>"; 

    $i++;

    if($i === 4)
        {
            $content .= "</div></div>";   
            $i = 0; 
        }
    }

echo $content;

/**/
?>