<?php
$adminMenu[16] = [
        'icon' => 'table',
        'list_head' => [
                'name' => trans('Ratings::ratings.ratings'),
                'link' => '/'.App::getLocale().'/admin/ratings',
        ],
        'list_tree'=> [
                0 => [
                    'name' => trans('Ratings::ratings.all_ratings'),
                    'link' => '/'.App::getLocale().'/admin/ratings',
                ]/*,
                1 => [
                    'name' => trans('Ads::ads.create').' '.trans('Ratings::ratings.rating'),
                    'link' => '/'.App::getLocale().'/admin/ratings/create',
                ]*/
        ]
];