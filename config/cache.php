<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/15/015
 * Time: 17:02
 */

return [
    'default' => env('CACHE_DRIVER', 'file'),
    'stores' => [
        'redis' => [
            'driver' => 'redis',
            'connection' => 'default',
        ],
        'file' => [
            'driver' => 'file',
            'path' => storage_path('framework/cache/'),
        ],
    ]
];