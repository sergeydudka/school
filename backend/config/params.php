<?php
return [
    'adminEmail' => 'admin@example.com',
    'loginUrl' => '/main/auth/login',
    'logoutUrl' => '/main/auth/logout',
    'menu' => '/main/menu',
    'edition' => [
        'default' => 'ru',
        'maxLength' => 2,
    ],
    'adminUserGroup' => 1,
    'pagination' => [
        'page' => 1,
        'perPage' => 20,
        'autoRefreshInterval' => 60 * 1000,
        'pageSizes' => [
            10,
            20,
            50,
            100,
        ],
    ],
    'auth' => true,
    'formats' => [
        'dateTime' => 'Y-m-d H:i:s',
        'time' => 'H:i:s',
        'date' => 'Y-m-d',
    ]
];
