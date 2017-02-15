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
		$modeltara = new Tarea();
		$modelList = Tarea::model()->findAll("id_tema =".$id);
		$this->render("_creartarea",array('model'=>$model,'modeltareas'=>$modeltara, 'listas'=>$modelList));
	}
	public function actionGuardartarea()
	{
		$modeltara = new Tarea();
		$modeltara->attributes = $_POST['tarea'];

		if ($modeltara->save()) {
			$id = $this->ultimoid();
			echo json_encode(array('response'=>'Success','redirect'=>$this->createUrl('proyectos/crearlistatarea',array('id'=>$id))));
		}else
		{
			echo json_encode(array('response'=>'Error'));
		}

	}


	public function actionCrearlistatarea()
	{
		$tareas = Tarea::model()->find("ID =".$_GET['id']);
		$tareasDes = TareaDes::model()->findAll("id_tarea =".$_GET['id']);
		$this->render("listatareas", array('tarea'=>$tareas, 'desctarea' =>$tareasDes));
	}

	public function actionTodoTareas()
	{
		$idulti = "";
		$idtarea = 0;
		$modelDest = new TareaDes();
		if (isset($_POST['TareaDes'])) 
		{	$idtarea = $_POST['TareaDes']['id_tarea'];
			$modelDest->attributes = $_POST['TareaDes'];
			$modelDest->fecha_inicio = date("Y-m-d",strtotime($modelDest->fecha_inicio));
			$modelDest->fecha_final = date("Y-m-d",strtotime($modelDest->fecha_final));
			$modelDest->status = "activo";
			
			if ($modelDest->save()) 
			{
				$idulti = $this->idDestrea();

				if (isset($_POST['empleado_id'])) 
				{

					
					foreach ($_POST['empleado_id'] as $key => $value) 
					{
						$modelrateauser = new TareasUsuario();
						$modelrateauser->id_usuario    = $value;
						$modelrateauser->id_des_tareas = $idulti;
						$modelrateauser->fecha_hora = date("Y-m-d H:s");
						$modelrateauser->save();
					}
				}

			}
			echo json_encode(array('response'=>'Success', 'data'=>$idtarea));
		}
	}
	public function actionViewsList()
	{
		$idtarea = isset($_POST['idtarea']) ? $_POST['idtarea'] : 0;

		$tareasDes = TareaDes::model()->findAll("id_tarea =".$idtarea);
		$this->renderPartial("_Lista", array("modeltarea"=>$tareasDes));
	}
	//elimina la descripcion de la tarea
	public function actionDelete()
	{
		$modelDest = TareaDes::model()->findByPk($_POST['id']);
		
		if ($modelDest->delete()) 
		{
			echo json_encode(array('response'=>"Success", 'mesage'=>'el itmes se elimino correctamente'));
			exit();
		}
		echo json_encode(array('response'=>"Error", 'mesage'=>'intentelo mas tarde'));
		//$this->redirect(array('proyectos/agregarListTareas'));

	}
	public function actionEditar()
	{
		$idtareades = $_POST['idtareaDes'];
		$modeltareasDes = TareaDes::model()->findByPk($idtareades);
		$this->renderPartial("_viewsEditar", array('modeldestarea'=>$modeltareasDes));
	}
	public function actionEditartodoTareas()
	{
		$id = $_POST['TareaDes']['ID'];
		$modeltareasDes = TareaDes::model()->findByPk($id);
		$modeltareasDes->attributes = $_POST['TareaDes'];
		$modeltareasDes->fecha_inicio = date("Y-m-d",strtotime($modeltareasDes->fecha_inicio));
		$modeltareasDes->fecha_final = date("Y-m-d",strtotime($modeltareasDes->fecha_final));
		$modeltareasDes->status = "activo";

		if ($modeltareasDes->save()) {
			TareasUsuario::model()->deleteAll("id_des_tareas =".$id);
			if (isset($_POST['empleado_id'])) 
			{
				foreach ($_POST['empleado_id'] as $key => $value) 
				{
					$modelrateauser = new TareasUsuario();
					$modelrateauser->id_usuario    = $value;
					$modelrateauser->id_des_tareas = $id;
					$modelrateauser->fecha_hora = date("Y-m-d H:s");
					$modelrateauser->save();
				}
			}

			echo json_encode(array('response'=>'Success', 'msg'=>'Se actualizo correctamente'));
			exit();
		}
	} 
	private static function ultimoid(){
	    $sql = "select max(ID) as max from tarea";
	    $resid = yii::app()->db->createCommand($sql)->queryAll();
	    $id = 0;
	    foreach ( $resid as $idconfig) {
	    	$id = $idconfig['max'];
	    }

	    return $id;
	}
	private static function idDestrea()
	{
		 $sql = "select max(ID) as max from tarea_des";
	    $resid = yii::app()->db->createCommand($sql)->queryAll();
	    $id = 0;
	    foreach ( $resid as $idconfig) {
	    	$id = $idconfig['max'];
	    }

	    return $id;

	}
	public function loadModel($id) {
		$model = Tema::model ()->findByPk ( $id );
		if ($model === null)
			throw new CHttpException ( 404, 'The requested page does not exist.' );
		return $model;
	}



}