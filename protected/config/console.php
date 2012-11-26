<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Console Application',

	// preloading 'log' component
	'preload'=>array('log'),

	// application components
	'components'=>array(
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		*/
		'db'=>array(
			'connectionString' => 'sqlsrv:server=(local)\sqlexpress;database=sst',
			'username' => 'leopoldo',
			'password' => 'facil1234',
			'charset' => 'utf8',
		),
		// Uncomment the following to not use a MySQL database
		/* 'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=SST',
			'emulatePrepare' => true,
			'username' => 'leopoldo.rojas',
			'password' => 'facil1234',
			'charset' => 'utf8',
		), */
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
			),
		),
	),
);