<?php

class PermisosController extends Controller
{
	public function actionIndex()
	{
		$modelPermisos = Permiso::model()->findAll();
		/*$modelPermisos = new Permiso();
		$modelPermisos->unsetAttributes ();*/
		
		$this->render('index', array('modelPermisos'=>$modelPermisos));
	}
	public function actionNuevo()
	{
		$modelPermisos = new Permiso();
		$modelModulo = Modulo::model()->findAll();
		$this->render("crear", array("formPermisos"=>$modelPermisos));
	}
	public function actionUpdateModulo($id)
	{	
		/*var_dump($_POST['modulos']);
		exit();*/
		$id=(isset($_GET["id"]))?$_GET["id"]:null;	
		//$model =Modulo::model()->findByPk($id);
		$model = Permiso::model()->findByPk($id);
		if(!$model){
			$model = new Permiso;
		}
		
		if(isset($_POST["Permiso"])){
			$model->attributes=$_POST["Permiso"];
			if($model->save()){
				foreach ($model->permisoModulos as $key => $value) {
					$modelper = PermisoModulo::model()->findByPk($value->ID);
					$modelper->delete();
				}
				
				if (isset($_POST['modulos'])) 
					{
						foreach ($_POST['modulos'] as $key => $value1) {
							$modelper = new PermisoModulo();

							if (isset($value1['moduloID'])) {
								$modelper->permiso_ID = $id;
								$modelper->modulo_ID = $value1['moduloID'];
								$modelper->ver = "true";
								
							}
							if (isset($value1['crear'])) {
								$modelper->crear = "true";
								
							}
							if (isset($value1['editar'])) {
								$modelper->editar = "true";
								
							}
							if (isset($value1['eliminar'])) {
								$modelper->eliminar = "true";
								
							}
							
							$modelper->save();
						}
						
					}
				
				//Yii::app()->funciones->responseJson("success",array("Registro Guardado"));
			}else{
				//Yii::app()->funciones->responseJson("error",$model->errors);
			}
			
		}
						
		$this->render("crear", array("formPermisos" => $model));
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