<?php

class ReportesController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionTareasAtrasadas()
	{
		$datecurrent = date('Y-m-d');
		$model = TareaDes::model()->findAll("fecha_final <='".$datecurrent."' and progres !=100");

		$this->render("tareasa_trasados", array('model'=>$model));
	}
	public function actionTareasFuturas()
	{
		$datacurent = date('Y-m-d');
		$proximatarea = date('Y-m-d', strtotime("+1 DAYS",  strtotime($datacurent) ) );

		$model = TareaDes::model()->findAll("fecha_inicio >='".$proximatarea."' and progres = 0");

		$this->render("tareasFuturas", array("model"=>$model));

	}
	public function actionTareaPeople()
	{
		$this->render("buscarTareas");

	}
	public function actionReportePersona()
	{
		$iduse = $_POST['iduser'];
		$datecurrent = date("Y-m-d");
		$sql = "SELECT tm.ID AS idtema, tm.nombre as Ntema, tm.descripcion as desT, ta.ID AS idtarea,
				ta.id_tema, ta.titulo, ta.descripcion as destarea, ta.fecha_hora as tafechahora, dest.ID as iddest,
				dest.id_tarea, dest.descripcion as destareach, dest.fecha_inicio,  dest.fecha_final, tuser.ID as idtuser,
				tuser.id_usuario, tuser.id_des_tareas, u.*
				FROM tema tm 
				INNER JOIN tarea ta ON ta.id_tema = tm.ID 
				INNER JOIN tarea_des dest ON dest.id_tarea = ta.ID 
				INNER JOIN tareas_usuario tuser ON tuser.id_des_tareas = dest.ID 
				INNER JOIN user u ON u.ID = tuser.id_usuario
				where u.ID = $iduse and dest.fecha_inicio >='".$datecurrent."' and dest.progres = 0 and dest.progres !=100";

		$consult = Yii::app()->db->createCommand($sql)->queryAll();

		$this->renderPartial("reporte_por_persona", array("modelmision"=>$consult));
	}
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}