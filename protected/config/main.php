<?php

$cfg = array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'language'=>'vi',
	'name'=>'Shop online Châu Âu',
	// preloading 'log' component
	//'name'=>'ss',
	'preload'=>array(
		'bootstrap',
	),

	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'1',
			'generatorPaths'=>array(
				'bootstrap.gii', // since 0.9.1
			),
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),

		'hqUser'=>array(
			'class'=>'ext.Hq.openIDUserModule.OpenIdUserModule',
			'roles'=>array('ADMIN', 'CUSTOMER_CARIER','SUPPORT'),
			'userComponentName'=>'hqUser',
		),
	),
	// application components
	'components'=>array(
		'hqUser'=>array(
			'class'=>'ext.Hq.HqUserComponent',
			'allowAutoLogin'=>true,
			'loginUrl'=>array('/hqUser/signIn'),
		),

		'bootstrap'=>array(
			'class'=>'ext.common.bootstrap_v2.components.Bootstrap', // assuming you extracted bootstrap under extensions
		),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
				'<_c:\w+>/'=>'<_c>/',
				'<_c:\w+>/<_a:\w+>'=>'<_c>/<_a>',
				'<_m:\w+>/<_c:\w+>/<_a:\w+>'=>'<_m>/<_c>/<_a>',
			),
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CDbLogRoute',

					'logTableName'=>'yii_log',
					'connectionID'=>'db',
					'levels'=>'error, warning',
				),
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);

$cfg = CMap::mergeArray(
	$cfg,
	require dirname(__FILE__).DIRECTORY_SEPARATOR.'database.php',
	require dirname(__FILE__).DIRECTORY_SEPARATOR.'module.php'
);


//if (defined('YII_DEBUG') && YII_DEBUG) $cfg = CMap::mergeArray(
//	require dirname(__FILE__).DIRECTORY_SEPARATOR.'debug.php',
//	$cfg
//);

return $cfg;