<?php
$adminMenu[10] = [
        'icon' => 'table',
        'list_head' => [
                'name' => trans('Activities::activities.activities'),
                'link' => '/'.App::getLocale().'/admin/activities',
        ],
        'list_tree'=> [
                0 => [
                    'name' => trans('Activities::activities.all_activities'),
                    'link' => '/'.App::getLocale().'/admin/activities',
                ],
                1 => [
                    'name' => trans('Activities::activities.create').' '.trans('Activities::activities.activity'),
                    'link' => '/'.App::getLocale().'/admin/activities/create',
                ]
        ]
];