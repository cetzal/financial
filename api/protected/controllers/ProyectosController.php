<?php
class Task {}
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
	}*/
	public function filters()
    {
        return array(
            'accessControl',
        );
    }
    public function accessRules() {
		return array(
			array (
					'allow', // allow admin user to perform 'admin' and 'delete' actions
					'actions' => array (
						'Index',
						'Temas',
						'Guardartema',
						'AgregarListTareas',
						'Guardartarea',
						'Crearlistatarea',
						'TodoTareas',
						'ViewsList',
						'Delete',
						'Editar',
						'EditartodoTareas',
						'Listgantt',
						'Editprogres',
						'Guardarprogres',
						'dataCombo',
						'TareasFecha'
					),
					'expression' => "Yii::app()->user->isPermitted() AND Yii::app()->user->getPerfil()=='ADMINISTRADOR'"
			),
			array (
					'allow', // allow admin user to perform 'admin' and 'delete' actions
					'actions' => array (							
					),
					'expression' => "Yii::app()->user->isPermitted() AND Yii::app()->user->getUser()=='admin2'"
			),
			array (
				'allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions' => array (
				'index',
				'listgantt',
				),
				'expression' => "Yii::app()->user->isPermitted() AND Yii::app()->user->getPerfil()=='COORDINADOR'"				
			),
			array (
				'deny', // deny all users
				'users' => array (
						'*'
				)
			)
		);
	}
	public function actionIndex()
	{

		$modelTema = Tema::model()->findAll("tipo = 'tema'");
		$modelProyecto = Tema::model()->findAll("tipo = 'proyecto'");

		$this->render('index', array('fechas'=>$modelTema,"proyecto"=>$modelProyecto));
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
		$model->tipo="tema";

		if ($model->save()) {
			echo json_encode(array('response'=>'Success','mensaje'=>'sii'));
		}else
		{
			echo json_encode(array('response'=>'Error','mensaje'=>'noo'));
		}
	}
	public function actionGuardarProyecto()
	{
		$model = new Tema();
		$nombre = $_POST['nombre'];

		$model->nombre = $nombre;
		$model->fecha = date("Y-m-d");
		$model->tipo="proyecto";

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
			$modelDest->progres = 0;
			
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
		//$modelDest->progres = 0;

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

	public function actionListgantt()
	{
		header('Content-Type: application/json');
		$idtema = $_POST['idmult'];	
		$result = array();
		$datecurrent = date("Y-m-d");

		if ($idtema !="") { $tarea = Tarea::model()->findAll("id_tema =".$idtema); }else{ $tarea = Tarea::model()->findAll(); }

		/*$sql = "SELECT tm.ID AS idtema, tm.nombre as Ntema, tm.descripcion as desT, ta.ID AS idtarea,
				ta.id_tema, ta.titulo, ta.descripcion as destarea, ta.fecha_hora as tafechahora, dest.ID as iddest,
				dest.id_tarea, dest.descripcion as destareach, dest.fecha_inicio,  dest.fecha_final, tuser.ID as idtuser,
				tuser.id_usuario, tuser.id_des_tareas, u.*
				FROM tema tm 
				INNER JOIN tarea ta ON ta.id_tema = tm.ID 
				INNER JOIN tarea_des dest ON dest.id_tarea = ta.ID 
				INNER JOIN tareas_usuario tuser ON tuser.id_des_tareas = dest.ID 
				INNER JOIN user u ON u.ID = tuser.id_usuario";*/

		/*$consult = Yii::app()->db->createCommand($sql)->queryAll();*/

		/*$tema = Tema::model()->findAll();*/
		

		foreach ($tarea as $key => $value) {
			$r = new Task();
			
				// rows
		      	$r->id = $value->ID;
		      	$r->txt_tema = htmlspecialchars($value->titulo);
		      	//$r->start = $value->fecha_hora;
 				//$r->end = date("Y-m-d");
		      	$modeltareasDes = TareaDes::model()->findByPk($value->ID);

		      	if (!is_null($modeltareasDes)) 
		      	{
		      		$r->children = $this->children($value->ID);
		      		 
		      	}

		      	$result[] = $r;
		}
		
		echo json_encode($result);

	}
	public function children($id)
	{	
		$result = array();
		$nameuser = "";
		$sueldo = 0;
		$modeltareasDes = TareaDes::model()->findAll("id_tarea =".$id);
		foreach ($modeltareasDes as $key => $value) {
			$r = new Task();

			$asinados = TareasUsuario::model()->findAll("id_des_tareas =".$value->ID);

			foreach ($asinados as $key => $userss) {
				$username = User::model()->find('ID ='.$userss->id_usuario);

				if (!is_null($username)) {
					$nameuser = $username->usuario;
					$sueldo = $username->sueldo;
				}

				
			}
			//calculando costos

			$r->id = "0".$value->ID;
		    $r->txt_tema = htmlspecialchars($value->descripcion);
		    $r->txt_user = $nameuser;

		    $r->txt_costo =$this->dias_transcurridos($value->fecha_inicio,$value->fecha_final) * $sueldo;
		    $r->start = $value->fecha_inicio;
 			$r->end = $value->fecha_final;
 			$r->txt_fecha_i = $value->fecha_inicio;
			$r->txt_fecha_f = $value->fecha_final;
 			$r->complete = $value->progres;

			$result[] = $r;
		}
		return $result;
	}
	public function actionEditprogres($id)
	{
		$rest = substr($id, -1);
		$modeltareasDes = TareaDes::model()->findByPk($rest);

		$this->renderPartial("_editprogress",array("model"=>$modeltareasDes));
		
	}

	public function actionGuardarprogres()
	{
		header('Content-Type: application/json');
		$id = $_POST['TareaDes']['ID'];
		$modeltareasDes = TareaDes::model()->findByPk($id);
		$modeltareasDes->attributes = $_POST['TareaDes'];
		$modeltareasDes->fecha_inicio = date("Y-m-d",strtotime($modeltareasDes->fecha_inicio));
		$modeltareasDes->fecha_final = date("Y-m-d",strtotime($modeltareasDes->fecha_final));
		$modeltareasDes->status = "activo";
		$modeltareasDes->progres = $_POST['TareaDes']['progres'];

		if ($modeltareasDes->save()) {
			echo json_encode(array('result' => 'OK'));
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
	function dias_transcurridos($fecha_i,$fecha_f)
	{
		$dias	= (strtotime($fecha_i)-strtotime($fecha_f))/86400;
		$dias 	= abs($dias); $dias = floor($dias);		
		return $dias;
	}

	public function actionDataCombo()
	{
		header('Content-Type: application/json');
		$tipo = $_POST['tipo'];
		$res ="";
		$status = "error";
		$message = "";

		$model = Tema::model()->findAll("tipo ='".$tipo."'");

		if (!is_null($model)) {
			$status = "success";
			$res .= "<option value=''> Seleccione ".$tipo."</option> ";
			foreach ($model as $key => $value) {
				$res.= "<option value ='".$value->ID."''>".$value->nombre."</option>";
			}
		}else
		{
			$message = "Este empleado no esta asignado a ningun periodo de nómina";
		}

		echo json_encode(array("status"=>$status, 'response'=>$message, 'data'=>$res));
	}

	public function actionTareasFecha()
	{
		$tareasDes = TareaDes::model()->findAll();
		$this->render("_calendariotareas", array('data'=>$tareasDes));
	}



}