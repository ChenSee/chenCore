<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/15/015
 * Time: 15:07
 */
date_default_timezone_set('Asia/Shanghai');
$run = (new Helpers\System())
    ->loadPath()
    ->loadConfigFiles()
    ->CreateDb()
    ->registerApp()
    ->registerError();
$app = $run->app;
$whoops = $run->whoops;