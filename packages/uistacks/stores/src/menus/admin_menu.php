<?php
$adminMenu[13] = [
        'icon' => 'table',
        'list_head' => [
                'name' => trans('Stores::stores.stores'),
                'link' => '/'.App::getLocale().'/admin/stores',
        ],
        'list_tree'=> [
                0 => [
                    'name' => trans('Stores::stores.all').' '.trans('Stores::stores.stores'),
                    'link' => '/'.App::getLocale().'/admin/stores',
                ],
                1 => [
                    'name' => trans('Stores::stores.create').' '.trans('Stores::stores.store'),
                    'link' => '/'.App::getLocale().'/admin/stores/create',
                ]
        ]
];