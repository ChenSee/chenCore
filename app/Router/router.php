<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/15/015
 * Time: 14:08
 */
$router = app('router');
$router->get('/', 'Controllers\IndexController@index');



$request = Illuminate\Http\Request::createFromGlobals();
$response = $router->dispatch($request);
$response->send();