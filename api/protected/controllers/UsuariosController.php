<?php
Yii::import('application.extensions.usuarios.validaUsuario');
class UsuariosController extends Controller
{
	public $modulo = ".menuUsuarios";

	public function checkTokenPermisos($modulo = "", $accion = "")
	{
		$validaUsuario = new validaUsuario;
		$response = $validaUsuario->validar(Yii::app()->user->id, $modulo);
		if($response == false){
			$this->render("/views/error", array("code" => "403", "message" => $validaUsuario->getErrorMessage() ));
			exit();
		}
		if($accion == "ver"){
			if(!$validaUsuario->ver()){
				$this->render("/views/error", array("code" => "403", "message" => $validaUsuario->getErrorMessage() ));
				exit();
			}
		}
		if($accion == "crear"){
			if(!$validaUsuario->crear()){
				$this->render("/views/error", array("code" => "403", "message" => $validaUsuario->getErrorMessage() ));
				exit();
			}
		}
		if($accion == "editar"){
			if(!$validaUsuario->editar()){
				$this->render("/views/error", array("code" => "403", "message" => $validaUsuario->getErrorMessage() ));
				exit();
			}
		}
		if($accion == "eliminar"){
			if(!$validaUsuario->eliminar()){
				$this->render("/views/error", array("code" => "403", "message" => $validaUsuario->getErrorMessage() ));
				exit();
			}
		}
	}

	public function actionIndex()
	{	//validador de permisos
		$this->checkTokenPermisos($this->modulo,"ver");

		$this->render('index');
	}

	public function actionListausuarios()
	{
		$this->checkTokenPermisos($this->modulo,"ver");

		/*$model = User::model()->findAll();*/
		$model = new User();
		$model->unsetAttributes ();
		$this->render('listUres',array('usuarios' => $model ));
	}

	public function actionNuevoUsuario()
	{
		$this->checkTokenPermisos($this->modulo,"crear");
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
		$this->checkTokenPermisos($this->modulo,"editar");
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
		$this->checkTokenPermisos($this->modulo,"eliminar");
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