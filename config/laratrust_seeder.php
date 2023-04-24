<?php

return [
    'role_structure' => [
        'super_admin' => [
            'users' => 'c,r,u,d',
            'categories' => 'c,r,u,d',
            'experiments' => 'c,r,u,d',
            'posts' => 'c,r,u,d',
            'cancer' => 'c,r,u,d',
        ],

        'doctors' => [
            'categories' => 'c,r,u,d',
            'experiments' => 'c,r,u,d',
            'posts' => 'c,r,u,d',
            'cancer' => 'c,r,u,d',

        ],

        'volunteers' => [
            // 'categories' => 'c,r',
            'experiments' => 'c,r',
        ],


        'patients' => [
            'experiments' => 'c,r',
        ],

    ],


    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
