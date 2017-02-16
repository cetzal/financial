<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<div class="form">
                    <?php  /** @var BootActiveForm $form */
                    $form = $this->beginWidget ( 'bootstrap.widgets.TbActiveForm', array (
                            'id' => 'nueva_tarea-progres',
                            'type'=>'horizontal',
                            'enableClientValidation' => true,
                            'enableAjaxValidation' => false
                    ) );
                    ?>
                        <div class="control-group">
                            <label class="control-label">Nombre</label>
                            <div class="controls">
                            <?php echo CHtml::hiddenField("TareaDes[ID]",$model->ID,array('class'=>'form-control')); ?>
                                <?php echo CHtml::hiddenField("TareaDes[id_tarea]",$model->id_tarea,array('class'=>'form-control')); ?>
                                <?php echo CHtml::textField("TareaDes[descripcion]",$model->descripcion, array('class' => 'form-control', 'placeholder' => 'Nombre')) ?>
                            </div>
                        </div>
                        <!-- <div class="control-group">
                            <label class="control-label">Asignar</label>
                            <div class="controls">
                                 <?php //echo CHtml::dropDownList('empleado_id', $model->getListaSelect($model->ID), User::getLista(), array('class'=>' form-control chosen-select','multiple'=>true, 'data-placeholder'=>"Seleccione...")); ?>
                            </div>
                        </div> -->
                        <div class="control-group">
                            <label class="control-label">Avance</label>
                            <div class="controls">
                                <input type="text" name="TareaDes[progres]" value="<?php echo $model->progres; ?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Fecha Inicio</label>
                            <div class="controls">
                                <input type="date" name="TareaDes[fecha_inicio]" value="<?php echo $model->fecha_inicio; ?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Fecha Final</label>
                            <div class="controls">
                                <input type="date" name="TareaDes[fecha_final]" value="<?php echo $model->fecha_final; ?>">
                            </div>
                        </div>

                  
                <?php $this->endWidget(); ?>
            </div>
        
        <div style="float: right;">
            <button class="btn btn-primary" id="cancel">Cancelar</button>
            <button class="btn btn-primary btnprogres" id="mostrar-from" 
            data-url="<?php echo Yii::app()->createUrl('proyectos/guardarprogres')?>" >Guardar</button>
        </div>  


        <script>
        var HOST  = "http://api.proyecto.mipc";
    $(document).ready(function() {

        $("#cancel").click(function() {
            parent.DayPilot.ModalStatic.close();
            return false;
        });

        $(document).delegate('.btnprogres', 'click', function(event) {
        	var path = $(this).attr("data-url");
        	formData = $("#nueva_tarea-progres").serialize();

        	$.post(HOST + path, formData,
            function(result) {
                parent.DayPilot.ModalStatic.close(eval(result));
            });
            return false;
        	
        });
        
      
        
    });
  
</script>