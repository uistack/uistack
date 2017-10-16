<?php

$adminMenu[5] = [
    'icon' => 'table',
    'list_head' => [
        'name' => trans('Roles::roles.roles'),
        'link' => '/'.App::getLocale().'/admin/roles',
    ],
    'list_tree'=> [
        0 => [
            'name' => trans('Roles::roles.all').' '.trans('Roles::roles.roles'),
            'link' => '/'.App::getLocale().'/admin/roles',
        ],
        1 => [
            'name' => trans('Roles::roles.create').' '.trans('Roles::roles.role'),
            'link' => '/'.App::getLocale().'/admin/roles/create',
        ]

    ]
];