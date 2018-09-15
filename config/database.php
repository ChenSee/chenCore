<?php
/**
 * Created by PhpStorm.
 * User:Administrator
 * Date:2018/9/15/015
 * Time:14:43
 */

return [
    'default' => 'mysql',
    'connections' => [
        'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'strict' => false,
            'engine' => null,
        ],
        'mysql_sky' => [
            'driver' => 'mysql',
            'host' => env('DB1_HOST', 'localhost'),
            'port' => env('DB1_PORT', '3306'),
            'database' => env('DB1_DATABASE', 'forge'),
            'username' => env('DB1_USERNAME', 'forge'),
            'password' => env('DB1_PASSWORD', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'strict' => false,
            'engine' => null,
        ]
    ],
    'redis' => [
        'client' => 'phpredis',
        'default' => [
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => 0,
        ],
    ]
];