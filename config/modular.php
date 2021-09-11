<?php
return [
    'path' => base_path() . '/app/Modules',
    'base_namespace' => 'App\Modules',
    'groupWithoutPrefix' => 'Pub',

    'groupMiddleware' => [
        'Admin' => [
            'web' => ['auth'],
            'api' => ['auth:api'],
        ]
    ],

    'modules' => [
        'Admin' => [
            'Methods',
            'Material',
            'Dashboard',
            'Course',
            'Role',
            'Menu',
            'User',

        ],

        'Pub' => [
            'Auth',
        ],
    ]
];
