<fieldset >
    <legend><h1>Proyectos</h1></legend>
</fieldset>
<style>
    .tamanio{
        height: 50px;
        overflow: scroll;
    }
    .btn-success
    {
        background: #ccc !important;
        color: #000 !important; 
    }
    .contener_impor{
        display: none;
    }
</style>

<div class="">

<link rel="stylesheet" href="//fonts.googleapis.com/icon?family=Material+Icons">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,500,400italic,700,700italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="//storage.googleapis.com/code.getmdl.io/1.0.1/material.teal-red.min.css" />
<script src="//storage.googleapis.com/code.getmdl.io/1.0.1/material.min.js"></script>

<?php

$content = "";

$i = 0;

    foreach($proyectos as $dias)
    {
        $ids = $dias->ID;
        if($i === 0)
        {       
                $content .= "
                <br>
                    <div>
                        <div class='mdl-grid btnmenutarget' id='id_tergeta' data-vars=".$dias->ID.">

                        <div class='mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-shadow--2dp btncreartema'>
                                <div class='mdl-card__title'>
                                    <h5 class='mdl-card__title-text'></h5>
                                </div>
                                <div class='mdl-card__supporting-text'>
                                    <div class='content_imput'>
                                        <p style='margin-left:95px !important;'><i class='material-icons'>&#xE145;</i><br></p><br>
                                        <p style='margin-top:-25px!important; margin-left:68px !important;'>Agregar Tema</p>
                                    </div>
                                    <div class='contener_impor'>
                                    <input type='text' style='' placeholder='Nombre del tema' id='nombret'><br><button class='btn btn btn-primary btnguardarp'>Guardar</button><button class='btn btn-success btn-calcelar'>Cancelar</button><br><br>
                                    </div>
                                </div>
                                <div class='mdl-card__actions mdl-card--border'>
                                 <!-- <a class='mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect'>Read More</a>-->
                                    <div class='mdl-layout-spacer'></div>
                                    <button class='mdl-button mdl-button--icon mdl-button--colored'><i class='material-icons'>favorite</i></button>
                                    <button class='mdl-button mdl-button--icon mdl-button--colored'><i class='material-icons'>share</i></button>
                                </div>
                        </div>
                        
                        ";
        }

        $content .= "
        <div class='mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-shadow--2dp'>
        <a class='card__link' data-role='project_card_content' href='".Yii::app()->createUrl('proyectos/temas', array("id"=>$ids))."'>
            <!--<figure class='mdl-card__media'>
                <!--<img src='http://tfirdaus.github.io/mdl/images/laptop.jpg' alt='' />-->
            <!--</figure>-->
            <div class='mdl-card__title'>
                 <h5 class='mdl-card__title-text'>".$dias->nombre."</h5>
            </div>
            <div class='mdl-card__supporting-text tamanio'>
                <p>".$dias->descripcion."</p>
            </div>
            <div class='mdl-card__actions mdl-card--border'>
               <!-- <a class='mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect'>Read More</a>-->
                <div class='mdl-layout-spacer'></div>
                <button class='mdl-button mdl-button--icon mdl-button--colored'><i class='material-icons'>favorite</i></button>
                <button class='mdl-button mdl-button--icon mdl-button--colored'><i class='material-icons'>share</i></button>
            </div>
            </a>
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
<br>
</div>
