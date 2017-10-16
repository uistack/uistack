<?php
$adminMenu[14] = [
        'icon' => 'table',
        'list_head' => [
                'name' => trans('Ads::ads.ads'),
                'link' => '/'.App::getLocale().'/admin/ads',
        ],
        'list_tree'=> [
                0 => [
                    'name' => trans('Ads::ads.all_ads'),
                    'link' => '/'.App::getLocale().'/admin/ads',
                ],
                1 => [
                    'name' => trans('Ads::ads.create').' '.trans('Ads::ads.ad'),
                    'link' => '/'.App::getLocale().'/admin/ads/create',
                ]
        ]
];