<?php
return array(
	// application components
	//192.168.1.55
	'components'=>array(
		'db'=>array(
            'connectionString' => 'mysql:host=localhost;dbname=colca_paris',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '12345678',
            'charset' => 'utf8',
            'schemaCachingDuration'=>3306,

        ),
	),
);