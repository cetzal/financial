<?php

class ConfigMailController extends Controller
{
	public function actionIndex()
	{
		$model = new ConfigServidor();
		if(isset ( $_POST ['ConfigServidor'] )) {
			if($model->save($_POST["ConfigServidor"])){
				
				Yii::app()->user->setFlash("success", "Se han guardado los cambios");
			}else{
				Yii::app()->user->setFlash("error", "No se puedieron guardar los cambios");
			}
		}
		$this->render ( 'index', array (
				'model' => $model
		) );

		
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