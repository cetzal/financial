<?php

class UsuariosController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionListausuarios()
	{
		$model = User::model()->findAll();
		$this->render('listUres',array('usuarios' => $model ));
	}

	public function actionNuevoUsuario()
	{
		$model = new User;

		if (isset($_POST['User'])) {
			$model->attributes = $_POST['User'];
			$password_simple = $model->password;
			$password_encriptada = sha1($password_simple);
			$model->password = $password_encriptada;
			$model->reset_token="--";

			if ($model->save()) {
				$this->redirect("listausuarios");
			}else
			{
				
				var_dump($model->errors);
			}
		}
		$this->render("usuarioNuevo", array("model" => $model));
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