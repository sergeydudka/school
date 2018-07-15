<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

$config = [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => require __DIR__ . '/../../common/config/modules.php',
    'components' => [
    	'db' => require __DIR__ . '/../../common/config/db.php',
        'request' => [
            'csrfParam' => '_csrf-backend',
	        'baseUrl' => '/admin',
	        'parsers' => [
		        'application/json' => 'yii\web\JsonParser',
	        ]
        ],
        'user' => [
            'identityClass' => 'common\models\BaseUser',
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
            'rules' => [
            	'' => 'index',
            	'login' => 'index/login',
            	'logout' => 'index/logout',
            ],
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
			'migrik'=>[
				'class'=>\insolita\migrik\gii\StructureGenerator::class,
				'templates'=>
					[
						'custom'=>'@backend/gii/templates/migrator_schema'
					]
			],
			'migrikdata'=>[
				'class'=>\insolita\migrik\gii\DataGenerator::class,
				'templates'=>
					[
						'custom'=>'@backend/gii/templates/migrator_data'
					]
			],
		]
	];
}

return $config;
