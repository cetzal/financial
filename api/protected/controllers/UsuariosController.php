<?php

class UsuariosController extends Controller
{
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
					),
					'expression' => "Yii::app()->user->isPermitted() AND Yii::app()->user->getUser()=='admin2'"
			),
			array (
					'allow', // allow admin user to perform 'admin' and 'delete' actions
					'actions' => array (
					),
					'expression' => "Yii::app()->user->isPermitted() AND Yii::app()->user->getPerfil()=='ADMINISTRADOR'"
			),
			array (
				'allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions' => array (
				'index',
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

		$this->render('index');
	}

	public function actionListausuarios()
	{
		/*$model = User::model()->findAll();*/
		$model = new User();
		$model->unsetAttributes ();
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
	public function actionUpdate($id)
	{
		$model = $this->loadModel ( $id );

		if(isset ( $_POST ['User'] )) 
		{
			$model->attributes = $_POST ['User'];
			$model->sueldo = $_POST['User']['sueldo'];
			if ($model->save ())
				$this->redirect ( array (
						'listausuarios',
				) );
		}

		$this->render ( 'update', array (
				'model' => $model
		) );

	}
	public function actionDelete($id)
	{
		$this->loadModel ( $id )->delete ();
		
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(! isset ( $_GET ['ajax'] ))
			$this->redirect ( isset ( $_POST ['returnUrl'] ) ? $_POST ['returnUrl'] : array (
					'listUres' 
			) );
	}

	public function loadModel($id) {
		$model = User::model ()->findByPk ( $id );
		if ($model === null)
			throw new CHttpException ( 404, 'The requested page does not exist.' );
		return $model;
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