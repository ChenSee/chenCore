<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/16/016
 * Time: 0:46
 */

namespace Exceptions;

use Whoops\Handler\CallbackHandler;
use Whoops\Handler\Handler;

class HandleExceptions extends CallbackHandler
{
    public function __construct()
    {
        parent::__construct(function ($exception, $inspector, $run) {
            response(['data' => $exception->getMessage()], $run->sendHttpCode());
            return Handler::DONE;
        });
    }
}