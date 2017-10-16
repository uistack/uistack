<?php
$adminMenu[18] = [
    'icon' => 'table',
    'list_head' => [
        'name' => trans('Blogs::blogs.manage').' '.trans('Blogs::blogs.blogs'),
        'link' => '/'.App::getLocale().'/admin/blogs',
    ],
    'list_tree'=> [
        0 => [
            'name' => trans('Blogs::blogs.all').' '.trans('Blogs::blogs.blogs'),
            'link' => '/'.App::getLocale().'/admin/blogs',
        ],
        1 => [
            'name' => trans('Blogs::blogs.create').' '.trans('Blogs::blogs.blog'),
            'link' => '/'.App::getLocale().'/admin/blogs/create',
        ]
    ]
];