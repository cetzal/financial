<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
Yii::setPathOfAlias('booster', dirname(__FILE__).'/../extensions/bootstrap');
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Proyect',
	'language' => 'es',
	/*'theme'=>'proyecto',*/
	'theme'=>'bootstrap',
	/*'defaultController' => 'login/index',*/

	// preloading 'log' component
	'preload'=>array('log','bootstrap',),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'ext.ECompositeUniqueValidator',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
			'generatorPaths' => array('bootstrap.gii'),
		),
		
	),

	// application components
	'components'=>array(
		'bootstrap'=>array(
				//'class'=>'bootstrap.components.Bootstrap',
				'class' => 'booster.components.Bootstrap',
				'responsiveCss' => true,
			),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin' => true,
			'loginUrl' => array ('site/index'),
			'returnUrl' => array ('home/index'),
			'class' => 'WebUser',
		),
		'authManager' => array (
				'class' => 'CDbAuthManager',
				'connectionID' => 'db'
			),
		//para  guardar las sessiones
		'session' => array (
					'class' => 'DbHttpSession',
					'connectionID' => 'db',
					'sessionTableName' => 'sesiones',
					'autoCreateSessionTable'=> false,
					'cookieMode' => 'allow',
					/*'cookieParams' => array('domain' => '.proyecto.mipc'),*/
			),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName' => false,
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		
		/*'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=proyect_finanacial',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
		'security'=>array(
				'class'=>'Security'
			),

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);