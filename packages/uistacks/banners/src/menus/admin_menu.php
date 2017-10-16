<?php

$adminMenu[9] = [
        'icon' => 'image',
        'list_head' => [
                'name' => trans('Banners::banners.banners'),
                'link' => '/'.App::getLocale().'/admin/banners',
        ],
        'list_tree'=> [
                0 => [
                    'name' => trans('Banners::banners.all').' '.trans('Banners::banners.banners'),
                    'link' => '/'.App::getLocale().'/admin/banners',
                ],
                1 => [
                    'name' => trans('Banners::banners.create').' '.trans('Banners::banners.banner'),
                    'link' => '/'.App::getLocale().'/admin/banners/create',
                ]
        ]
];