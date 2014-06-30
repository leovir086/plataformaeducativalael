<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Plataforma Educativa LAEL',
        'sourceLanguage' => 'en',
        'language' => 'es',
    
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
                'ext.YiiMailer.YiiMailer',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'root', 
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		// uncomment the following to use a MySQL database
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=plataformaeducativalael',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'root',
			'charset' => 'utf8',
                        'enableProfiling' => true,
		),
                // server
		/*'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=a3510430_platafo',
			'emulatePrepare' => true,
			'username' => 'a3510430_root',
			'password' => 'a3510430_root',
			'charset' => 'utf8',
                        'enableProfiling' => true,
		),*/
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
				
				array(
					'class'=>'CWebLogRoute',
				),
				
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'omar.huanca.balboa@gmail.com',
                '_constant'=>array(
                    'setFromRegister'=>'websolutionssrl@gmail.com',
                    'setSubjectRegister'=>'Verificación de la dirección de correo electrónico',
                    'setBodyRegister'=>'Este mensaje contiene instrucciones para verificar esta dirección de correo electrónico. Si no realizó esta petición, por favor, ignora este correo electrónico o póngase en contacto con nuestro administrador. 
                                        Para verificar esta dirección de correo electrónico, abra el siguiente enlace:<br ><br >',
                    'nameRegister'=>'Administrador',
                    'setBodyBelowRegister'=>'<br ><br >Si el enlace no se abre correctamente, intente copiarlo y pegarlo en la barra de direcciones del navegador.',
                    'emailInstruccionRegister'=>'Un correo electrónico que contiene más instrucctions ha sido enviada a la dirección de correo electrónico proveedor',
                ),
	),
    

);