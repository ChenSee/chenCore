<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/15/015
 * Time: 15:27
 */

namespace Controllers;

use Models\Model;

class IndexController extends \Illuminate\Routing\Controller
{
    public function index()
    {
        Model::all();
        return view('index', ['data' => 'World']);
    }
}