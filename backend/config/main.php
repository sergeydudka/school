<?php
$params = array_merge(require __DIR__ . '/../../common/config/params.php', require __DIR__ .
    '/../../common/config/params-local.php', require __DIR__ . '/params.php', require __DIR__ . '/params-local.php');

$config = [
    'id' => 'backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'language' => 'ru-RU',
    'bootstrap' => [
        'log',
    ],
    'modules' => [],
    'components' => [
        'db' => require __DIR__ . '/../../common/config/db.php',
        'request' => [
            'class' => \crudschool\common\url\Request::class,
            'csrfParam' => '_crud',
            'baseUrl' => '/admin',
            'parsers' => [
                'application/json' => \yii\web\JsonParser::class,
            ],
        ],
        'response' => [
            'class' => \crudschool\common\url\Response::class,
            'charset' => 'UTF-8',
        ],
        'user' => [
            'identityClass' => \crudschool\models\BaseUser::class,
            'enableAutoLogin' => false,
            'identityCookie' => ['name' => 'identity'],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'SESSID',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error'],
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
                'login' => 'index/login',
            ],
        ],
        'authManager' => [
            'class' => \yii\rbac\DbManager::class,
        ],
        'i18n' => [
            'class' => \crudschool\common\translate\TranslateDBSource::class,
        ],
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
                    'custom' => '@backend/gii/templates/migrator_schema',
                ],
            ],
        ],
    ];
}

return $config;
