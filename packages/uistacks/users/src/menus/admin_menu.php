<?php

$adminMenu[3] = [
    'icon' => 'users',
    'list_head' => [
        'name' => trans('Users::users.members'),
        'link' => '/'.App::getLocale().'/admin/users/members',
    ],
    'list_tree'=> [
        0 => [
            'name' => trans('Users::users.all').' '.trans('Users::users.members'),
            'link' => '/'.App::getLocale().'/admin/users/members',
        ],
        1 => [
            'name' => trans('Users::users.create').' '.trans('Users::users.member'),
            'link' => '/'.App::getLocale().'/admin/users/members/create',
        ]

    ]
];

$adminMenu[4] = [
    'icon' => 'user',
    'list_head' => [
        'name' => trans('Users::users.supervisors'),
        'link' => '/'.App::getLocale().'/admin/users/supervisors',
    ],
    'list_tree'=> [
        0 => [
            'name' => trans('Users::users.all').' '.trans('Users::users.supervisors'),
            'link' => '/'.App::getLocale().'/admin/users/supervisors',
        ],
        1 => [
            'name' => trans('Users::users.create').' '.trans('Users::users.supervisor'),
            'link' => '/'.App::getLocale().'/admin/users/supervisors/create',
        ]
    ]
];