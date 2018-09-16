<?php
/**
 * Created by PhpStorm.
 * 服务创建
 * User: abc55
 * Date: 2017/11/2/002
 * Time: 14:29
 */

namespace Helpers;

use Exceptions\HandleExceptions;
use \Illuminate;

class System
{
    public $app;
    public $whoops;

    public function __construct()
    {
        (new \Dotenv\Dotenv(__DIR__ . '/../../', '.env'))->load();
        $this->app = new Illuminate\Container\Container();
        Illuminate\Container\Container::setInstance($this->app);
        Illuminate\Support\Facades\Facade::setFacadeApplication($this->app);
    }

    public function loadPath()
    {
        $this->app->instance('path', __DIR__ . '/../..');
        $this->app->instance('path.config', app('path') . '/config');
        $this->app->instance('path.storage', app('path') . '/storage');
        $this->app->instance('path.resource', app('path') . '/resources');
        $this->app->instance('path.lang', app('path.resource') . '/lang');
        $this->app->singleton('config', new Illuminate\Config\Repository());
        $this->app->instance('request', Illuminate\Http\Request::capture());


        return $this;
    }

    public function loadConfigFiles()
    {
        $repository = $this->app['config'];
        $configPath = realpath(app('path.config'));
        $files = [];
        foreach (\Symfony\Component\Finder\Finder::create()->files()->name('*.php')->in($configPath) as $file) {
            $directory = dirname($file->getRealPath());
            if ($tree = trim(str_replace($configPath, '', $directory), DIRECTORY_SEPARATOR)) {
                $tree = str_replace(DIRECTORY_SEPARATOR, '.', $tree) . '.';
            }
            $nesting = $tree;
            $files[$nesting . basename($file->getRealPath(), '.php')] = $file->getRealPath();
        }
        foreach ($files as $key => $path) $repository->set($key, require $path);
        return $this;
    }

    public function CreateDb()
    {
        $capsule = new Illuminate\Database\Capsule\Manager;
        foreach (config('database.connections') as $key => $item) {
            if ($key == config('database.default')) $capsule->addConnection($item, 'default');
            $capsule->addConnection($item, $key);
        }
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
        return $this;
    }

    public function registerApp()
    {
        foreach (config('app.providers') as $item) with(new $item($this->app))->register();
        return $this;
    }

    public function registerError()
    {
        $whoops = new \Whoops\Run;
        if (config('app.debug')) {
            $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler());
        } else {
            $whoops->pushHandler(new HandleExceptions());
        }
        $whoops->register();
        $this->whoops = $whoops;
        return $this;
    }
}