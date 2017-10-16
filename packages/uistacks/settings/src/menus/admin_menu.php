<?php

$adminMenu[2] = [
        'icon' => 'table',
        'list_head' => [
                'name' => trans('Settings::settings.settings'),
                'link' => '/'.App::getLocale().'/admin/settings',
        ],
        'list_tree'=> [
                 0 => [
                     'name' => trans('Settings::settings.main_information'),
                     'link' => '/'.App::getLocale().'/admin/settings/info',
                 ],
                1 => [
                    'name' => trans('Settings::settings.smtp'),
                    'link' => '/'.App::getLocale().'/admin/settings/smtp',
                ],
                2 => [
                    'name' => trans('Settings::settings.accounts'),
                    'link' => '/'.App::getLocale().'/admin/settings/accounts',
                ],
                // 3 => [
                //     'name' => trans('Settings::settings.links'),
                //     'link' => '/'.App::getLocale().'/admin/settings/links',
                // ],
                // 4 => [
                //     'name' => trans('Settings::settings.seo'),
                //     'link' => '/'.App::getLocale().'/admin/settings/seo',
                // ],
                // 5 => [
                //     'name' => trans('Settings::settings.fcm'),
                //     'link' => '/'.App::getLocale().'/admin/settings/fcm',
                // ],
//                6 => [
//                    'name' => trans('Settings::settings.sms'),
//                    'link' => '/'.App::getLocale().'/admin/settings/sms',
//                ],
                // 7 => [
                //     'name' => trans('Settings::settings.mode'),
                //     'link' => '/'.App::getLocale().'/admin/settings/mode',
                // ]
        ]
];