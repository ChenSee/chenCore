<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/15/015
 * Time: 15:07
 */
date_default_timezone_set('Asia/Shanghai');
$app = (new Helpers\System())
    ->loadPath()
    ->loadConfigFiles()
    ->CreateDb()
    ->registerApp()
    ->app;
