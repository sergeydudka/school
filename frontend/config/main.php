<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

$config = [
    'id' => 'frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
	'aliases' => [],
	'modules' => [],
    'components' => [
	    'db' => require __DIR__ . '/../../common/config/db.php',
	    'lang' => [
	    	'class' => 'crudschool\modules\languages\helpers\Edition'
	    ],
        'request' => [
        	'class' => '\crudschool\common\url\Request',
            'csrfParam' => '_crud',
	        'baseUrl' => '/',
        ],
        'user' => [
            'identityClass' => 'crudschool\models\BaseUser',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => 'identity'],
            'loginUrl' => '/auth/login',
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
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
            'errorAction' => 'home/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
	        'enableStrictParsing' => true,
	        'baseUrl' => '/',
	        'rules' => [
		        '/' => '/home',
		        [
			        'pattern' => 'learn',
			        'route' => 'article-categories/index',
			        'suffix' => '/',
		        ],
		        [
			        'pattern' => 'learn/<c_id:.+>',
			        'route' => 'article-categories/category',
			        'suffix' => '/',
		        ],
		        [
			        'pattern' => 'learn/<c_id:.+>/<g_id:.+>',
			        'route' => 'article-categories/group',
			        'suffix' => '/',
		        ],
            ],
        ],
    ],
    'params' => $params,
];

return $config;
