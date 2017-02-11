<?php

class ProyectosController extends Controller
{
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
	public function actionIndex()
	{
		$fechaactual = date("Y-m-d");
		$arrayfecha = array();

		for ($i=0; $i < 15; $i++) 
		{ 
			$diasfecha = date('Y-m-d', strtotime("-$i DAYS",  strtotime($fechaactual) ) );

			$arrayfecha[]= $diasfecha;

		}

		$modelTema = Tema::model()->findAll();

		$this->render('index', array('fechas'=>$modelTema));
	}

	public function actionCalendario()
	{
		$fechaactual = date("Y-m-d");
		$arrayfecha = array();

		for ($i=0; $i < 15; $i++) 
		{ 
			$diasfecha = date('Y-m-d', strtotime("-$i DAYS",  strtotime($fechaactual) ) );

			$arrayfecha[]= $diasfecha;

		}

		$this->render('calendario', array('fechas'=>$arrayfecha));
	}

	public function actionTemas($id)
	{
		$model = $this->loadModel($id);

		$this->render("_herramienta_tema",array('model'=>$model));
		
	}
	public function actionGuardartema()
	{
		$model = new Tema();
		$nombre = $_POST['nombre'];

		$model->nombre = $nombre;
		$model->fecha = date("Y-m-d");

		if ($model->save()) {
			echo json_encode(array('response'=>'Success','mensaje'=>'sii'));
		}else
		{
			echo json_encode(array('response'=>'Error','mensaje'=>'noo'));
		}
	}

	public function actionAgregarListTareas($id)
	{
		$model = $this->loadModel($id);
		$modeltara = new tarea();
		$this->render("_creartarea",array('model'=>$model,'modeltareas'=>$modeltara));
	}
	public function loadModel($id) {
		$model = Tema::model ()->findByPk ( $id );
		if ($model === null)
			throw new CHttpException ( 404, 'The requested page does not exist.' );
		return $model;
	}



}