<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
$cfg = array(
	'modules'=>array(
		'hq' => array(
			'class' => 'application.modules.hq.HqModule',

			'controllerMap'=>array(
				'yiiLog'=>array(
					'class'=>'ext.common.YiiLogViewerController.YiiLogViewerController',
				),
			),

			'modules'=>array(
				'user'=>array(
					'class'=>'ext.Hq.openIDUserModule.OpenIdUserModule',

					'roles'=>array('ADMIN', 'CUSTOMER_CARIER', 'SUPPORT'),

					'userComponentName'=>'hqUser',
				),
			),

			'components'=>array(
				'bootstrap'=>array(
					'class'=>'ext.common.bootstrap.components.Bootstrap',
					'responsiveCss'=>true,
					'yiiCss'=>true,
				),
			),
		),
	),
);

return $cfg;