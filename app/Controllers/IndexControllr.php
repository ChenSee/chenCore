<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/15/015
 * Time: 15:27
 */

namespace Controllers;

class IndexController extends \Illuminate\Routing\Controller
{
    public function index()
    {
        return view('index', ['data' => 'World']);
    }
}