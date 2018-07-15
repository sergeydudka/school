<?php

if (YII_ENV_PROD) return [];

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=learn',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
    'tablePrefix' => '',
    // Schema cache options (for production environment)
    'enableSchemaCache' => true,
    'schemaCacheDuration' => 60,
    'schemaCache' => 'cache',
];
