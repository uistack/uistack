<?php
$adminMenu[20] = [
        'icon' => 'table',
        'list_head' => [
                'name' => trans('Tasks::tasks.tasks'),
                'link' => '/'.App::getLocale().'/admin/tasks',
        ],
        'list_tree'=> [
                0 => [
                    'name' => trans('Tasks::tasks.all').' '.trans('Tasks::tasks.tasks'),
                    'link' => '/'.App::getLocale().'/admin/tasks',
                ],
                1 => [
                    'name' => trans('Tasks::tasks.create').' '.trans('Tasks::tasks.store'),
                    'link' => '/'.App::getLocale().'/admin/tasks/create',
                ]
        ]
];