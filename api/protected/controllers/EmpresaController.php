<?php

class EmpresaController extends Controller
{
	public function actionIndex()
	{

		$empres = Empresa::model()->find();
		if (!is_null($empres)) { $model = $empres; } else { $model = new Empresa(); }

		if (isset($_POST['Empresa'])) {
			$rnd = rand ( 0, 9999 );
			$model->attributes = $_POST['Empresa'];
			$uploadedFile = CUploadedFile::getInstance ( $model, 'img_logo' );
			if (isset ( $model->img_logo )) {
				$fileName = $model->img_logo;
			} else {
				if (isset ( $uploadedFile )) {
					$fileName = "{$rnd}-{$uploadedFile}";
				}else{
					$fileName="{$rnd}-logo_empresa.png";
				}
			}
			$model->img_logo = $fileName;
			if ($model->save()) {
				if (!is_null($uploadedFile)) {
					@unlink(Yii::app ()->basePath . '/../images/main/' . $fileName);
					$uploadedFile->saveAs ( Yii::app ()->basePath . '/../images/main/' . $fileName );
				}else{

					copy(Yii::app()->basePath.'/../images/main/logo_empresa.png', Yii::app()->basePath.'/../images/main/'.$fileName);
				}
				Yii::app()->user->setFlash("success", "Se han guardado correctamente los cambios");
				$this->redirect ( array (
						'empresa/index'
				) );
			}else{
				Yii::app()->user->setFlash("error", "No se ha podido guardar los cambios");
			}
		}

		$this->render('index',array('empresa'=>$model));
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