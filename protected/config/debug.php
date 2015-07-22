<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	// application components
	'components'=>array(

		'db'=>array(
			'enableProfiling'=>false,
			'enableParamLogging'=>false,
			'schemaCachingDuration'=>0,
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
					'ipFilters'=>array('127.0.0.1','192.168.1.*'),
				),
				array(
					'class'=>'CProfileLogRoute',
				),
			),
		),

		'urlManager'=>array(
        	'rules'=>array(
				'gii'=>'hq/gii',
 				'gii/<_c:\w+>'=>'hq/gii/<_c>',
 				'gii/<_c:\w+>/<_a:\w+>'=>'hq/gii/<_c>/<_a>',
 			),
		),
	),

	'modules'=>array(
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'1',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),

			'generatorPaths'=>array(
	            'bootstrap.gii', // since 0.9.1
	        ),
		),
	),
);

