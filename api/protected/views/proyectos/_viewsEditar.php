<div id="text-popup-html" class="white-popup " style="max-width:50%;">
<style>
    
    .white-popup {
        position: relative;
        background: #FFF;
        padding: 40px;
        width: auto;
        max-width: 500px;
        margin: 20px auto;
}
</style>
<script>
   
</script>
        <!-- <legend>
            hola mundo
        </legend> -->
            <div class="form">
                    <?php  /** @var BootActiveForm $form */
                    $form = $this->beginWidget ( 'bootstrap.widgets.TbActiveForm', array (
                            'id' => 'nueva_tarea-principal-'.$modeldestarea->ID,
                            'type'=>'horizontal',
                            'enableClientValidation' => true,
                            'enableAjaxValidation' => false
                    ) );
                    ?>
                        <div class="control-group">
                            <label class="control-label">Nombre</label>
                            <div class="controls">
                            <?php echo CHtml::hiddenField("TareaDes[ID]",$modeldestarea->ID,array('class'=>'form-control')); ?>
                                <?php echo CHtml::hiddenField("TareaDes[id_tarea]",$modeldestarea->id_tarea,array('class'=>'form-control')); ?>
                                <?php echo CHtml::textField("TareaDes[descripcion]",$modeldestarea->descripcion, array('class' => 'form-control', 'placeholder' => 'Nombre')) ?>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Asignar</label>
                            <div class="controls">
                                 <?php echo CHtml::dropDownList('empleado_id', $modeldestarea->getListaSelect($modeldestarea->ID), User::getLista(), array('class'=>' form-control chosen-select','multiple'=>true, 'data-placeholder'=>"Seleccione...")); ?>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Fecha Inicio</label>
                            <div class="controls">
                                <input type="date" name="TareaDes[fecha_inicio]" value="<?php echo $modeldestarea->fecha_inicio; ?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Fecha Final</label>
                            <div class="controls">
                                <input type="date" name="TareaDes[fecha_final]" value="<?php echo $modeldestarea->fecha_final; ?>">
                            </div>
                        </div>

                  
                <?php $this->endWidget(); ?>
            </div>
        
        <div style="float: right;">
            <button class="btn btn-primary" onclick="$.magnificPopup.close();">Cancelar</button>
            <button class="btn btn-primary btnEdtaralltareas" id="mostrar-from" data-from="<?php echo $modeldestarea->ID;?>">Guardar</button>
        </div>  
          
</div>