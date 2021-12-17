<?php

    return[
        [
            'name' => 'dashboard',
            'icon' => 'fa-home',
            'route'=> 'admin'
        ],
        [
            'name' => 'Ql Danh Mục',
            'icon' => 'fa-file',
            'route'=> 'category.index',
            'items'=> [
                [
                    'name' => 'Danh sách danh mục',
                    'icon' => 'fa-home',
                    'route'=> 'category.index'
                ],
                [
                    'name' => 'Thêm danh mục',
                    'icon' => 'fa-home',
                    'route'=> 'category.create'
                ]
            ]
        ],
        [
            'name' => 'Ql Tài khoản',
            'icon' => 'fa-folder',
            'route'=> 'user.index',
            'items'=> [
                [
                    'name' => 'Danh sách Tài khoản',
                    'icon' => 'fa-home',
                    'route'=> 'user.index'
                ],
                [
                    'name' => 'Thêm Tài khoản',
                    'icon' => 'fa-home',
                    'route'=> 'user.create'
                ]
            ]
        ],
        [
            'name' => 'Ql Sản phẩm',
            'icon' => 'fa-folder',
            'route'=> 'product.index',
            'items'=> [
                [
                    'name' => 'Danh sách Sản phẩm',
                    'icon' => 'fa-home',
                    'route'=> 'product.index'
                ],
                [
                    'name' => 'Thêm Sản phẩm',
                    'icon' => 'fa-home',
                    'route'=> 'product.create'
                ]
            ]
        ],
        [
            'name' => 'File Manager',
            'icon' => 'fa-file',
            'route'=> 'file'
        ]

    ]

?>