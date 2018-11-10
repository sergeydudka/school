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
            'class' => '\crudschool\common\url\Request',
            'csrfParam' => '_crud',
            'baseUrl' => '/admin',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
        ],
        'response' => [
            'class' => 'yii\web\Response',
            'format' => yii\web\Response::FORMAT_JSON,
            'charset' => 'UTF-8',
            'on beforeSend' => function ($event) {
                /* @var \crudschool\common\url\Request $request */
                $request = Yii::$app->request;
                if (!$request->isHomePage()) {
                    $data = $event->sender->data ?? $event->sender->content;
                    if (!$data || (is_object($event->sender->data) && get_class($data) !=
                            \crudschool\api\ApiResult::class)) {
                        $event->sender->data = new \crudschool\api\ApiResult(Yii::$app->requestedAction, $data);
                    }
                } else {
                    Yii::$app->response->format = \yii\web\Response::FORMAT_HTML;
                }
            },
        ],
        'user' => [
            'identityClass' => 'crudschool\models\BaseUser',
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
                'login' => 'index/login',
            ],
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
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
