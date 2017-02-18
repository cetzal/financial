<?php

class LoginController extends Controller
{
	public function actionIndex()
	{
		$this->renderPartial('index');
	}

	public function actionMake()
	{
		header('Content-Type: application/json');
		$model = new User();

		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->login())
			{

				//$this->redirect(Yii::app()->user->returnUrl);
				echo json_encode(array('response'=>'Success','redirect'=>"home/index"));
				/*var_dump($_SERVER['REMOTE_ADDR']);*/
			}
			else{
				//var_dump($model->login());
				echo json_encode(array('response'=>'error','msg'=>"Usuario o Password incorrecta"));
			}
		}
		/*$this->redirect(Yii::app()->user->returnUrl);*/

			
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