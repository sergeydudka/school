<?php
$params = array_merge(
	require __DIR__ . '/../../common/config/params.php',
	require __DIR__ . '/../../common/config/params-local.php',
	require __DIR__ . '/params.php',
	require __DIR__ . '/params-local.php'
);

$config = [
	'id' => 'backend',
	'basePath' => dirname(__DIR__),
	'controllerNamespace' => 'backend\controllers',
	'bootstrap' => ['log'],
	'modules' => [],
	'components' => [
		'db' => require __DIR__ . '/../../common/config/db.php',
		'request' => [
			'class' => '\crudschool\common\url\Request',
			'csrfParam' => '_csrf-backend',
			'baseUrl' => '/admin',
			'parsers' => [
				'application/json' => 'yii\web\JsonParser',
			]
		],
		'lang' => [
			'class' => 'crudschool\modules\languages\helpers\SystemLanguage'
		],
		'user' => [
			'identityClass' => 'crudschool\models\BaseUser',
			'enableAutoLogin' => true,
			'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
		],
		'session' => [
			// this is the name of the session cookie used for login on the backend
			'name' => 'advanced-backend',
		],
		'log' => [
			'traceLevel' => YII_DEBUG ? 3 : 0,
			'targets' => [
				[
					'class' => 'yii\log\FileTarget',
					'levels' => ['error', 'warning'],
				],
			],
		],
		'errorHandler' => [
			'errorAction' => 'index/error',
		],
		'urlManager' => [
			'enablePrettyUrl' => true,
			'showScriptName' => false,
			'baseUrl' => '/admin',
			'rules' => [
				'/' => 'index',
			],
		],
		'authManager' => [
			'class' => 'yii\rbac\DbManager',
		],
//	    'i18n' => [
//	    	'class' => yii\i18n\DbMessageSource::class
//	    ]
	],
	'params' => $params,
];

if (!YII_ENV_PROD) {
	// configuration adjustments for 'dev' environment
	$config['bootstrap'][] = 'debug';
	$config['modules']['debug'] = [
		'class' => 'yii\debug\Module',
		// uncomment the following to add your IP if you are not connecting from localhost.
		//'allowedIPs' => ['127.0.0.1', '::1'],
	];
	
	$config['bootstrap'][] = 'gii';
	$config['modules']['gii'] = [
		'class' => 'yii\gii\Module',
		// uncomment the following to add your IP if you are not connecting from localhost.
		//'allowedIPs' => ['127.0.0.1', '::1'],
		'generators' => [
			'migrik' => [
				'class' => \crudschool\migrik\gii\StructureGenerator::class,
				'templates' => [
					'custom' => '@backend/gii/templates/migrator_schema'
				]
			]
		]
	];
}

return $config;
