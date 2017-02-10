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
							'operaciones',
							'dop',
					),
					'expression' => "Yii::app()->user->isPermitted() AND Yii::app()->user->getUser()=='admin2'"
			),
			array (
					'allow', // allow admin user to perform 'admin' and 'delete' actions
					'actions' => array (
							'condonar',
							'declinarCredito',
							'vencerCredito',
							'reestructurar',
							'setDateA',
							'operaciones',
							'dop',
					),
					'expression' => "Yii::app()->user->isPermitted() AND Yii::app()->user->getPerfil()=='Administrador'"
			),
			array (
				'allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions' => array (
						'index',
						'Listausuarios',
						'NuevoUsuario',
						'parcialidades',
						'pagar',
						'closeamortizacion',
						'pagarDisposicion',
						'pagarIndividual',
						'anticipar',						
						'guardar',
						'delete',
						'mora',
						'interes',
						'export',
						'calcularPlazo',
						'grupoSolidario',
						'pagarD',
						'filterClientes',
						'filterSolicitudes',
						'getDeuda',
						'disposicion',
				),
				'expression' => "Yii::app()->user->isPermitted()"				
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