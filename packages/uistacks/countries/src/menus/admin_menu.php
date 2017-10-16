<?php
$adminMenu[11] = [
        'icon' => 'table',
        'list_head' => [
                'name' => trans('Countries::countries.countries_areas'),
                'link' => '/'.App::getLocale().'/admin/countries',
        ],
        'list_tree'=> [
                0 => [
                    'name' => trans('Countries::countries.all').' '.trans('Countries::countries.countries'),
                    'link' => '/'.App::getLocale().'/admin/countries',
                ],
                1 => [
                    'name' => trans('Countries::countries.create').' '.trans('Countries::countries.country'),
                    'link' => '/'.App::getLocale().'/admin/countries/create',
                ],
                2 => [
                    'name' => trans('Countries::countries.all').' '.trans('Countries::countries.areas'),
                    'link' => '/'.App::getLocale().'/admin/countries-areas',
                ],
                3 => [
                    'name' => trans('Countries::countries.create').' '.trans('Countries::countries.area'),
                    'link' => '/'.App::getLocale().'/admin/countries-areas/create',
                ]
        ]
];