<?php

$adminMenu[17] = [
        'icon' => 'table',
        'list_head' => [
                'name' => trans('Faqs::faqs.faqs'),
                'link' => '/'.App::getLocale().'/admin/faqs',
        ]
];

////old
//$adminMenu[8] = [
//        'icon' => 'table',
//        'list_head' => [
//                'name' => trans('Faqs::faqs.faqs'),
//                'link' => '/'.App::getLocale().'/admin/faqs',
//        ],
//        'list_tree'=> [
//                0 => [
//                    'name' => trans('Faqs::faqs.all').' '.trans('Faqs::faqs.faqs'),
//                    'link' => '/'.App::getLocale().'/admin/faqs/dynamic',
//                ],
//                1 => [
//                    'name' => trans('Faqs::faqs.create').' '.trans('Faqs::faqs.faq'),
//                    'link' => '/'.App::getLocale().'/admin/faqs/create',
//                ]
//        ]
//];