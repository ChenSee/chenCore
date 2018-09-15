<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/15/015
 * Time: 15:45
 */
if (!function_exists('app')) {
    /**
     * Get the available container instance.
     *
     * @param  string $make
     * @param  array $parameters
     * @return mixed|\Illuminate\Container\Container
     */
    function app($make = null, $parameters = [])
    {
        if (is_null($make)) {
            return \Illuminate\Container\Container::getInstance();
        }

        return \Illuminate\Container\Container::getInstance()->make($make, $parameters);
    }
}


if (!function_exists('view')) {
    /**
     * Get the evaluated view contents for the given view.
     *
     * @param  string $view
     * @param  array $data
     * @param  array $mergeData
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    function view($view = null, $data = [], $mergeData = [])
    {
        return app('view')->make($view, $data, $mergeData)->render();
    }
}


if (!function_exists('validator')) {
    /**
     * Create a new Validator instance.
     *
     * @param  array $rules
     * @param  array $messages
     * @param  array $customAttributes
     * @return \Illuminate\Contracts\Validation\Validator
     */
    function validator(array $rules = [], array $messages = [], array $customAttributes = [])
    {
        $factory = app('validator');

        if (func_num_args() === 0) {
            return $factory;
        }

        return $factory->make(request()->all(), $rules, $messages, $customAttributes);
    }
}


if (!function_exists('db')) {
    /**
     * @return \Illuminate\Database\Connection
     */
    function db()
    {
        return app('db');
    }
}


if (!function_exists('storage_path')) {
    function storage_path($path = null)
    {
        if (is_null($path)) {
            return app('path.storage');
        }
        return app('path.storage') . '/' . $path;
    }
}


if (!function_exists('base_path')) {
    /**
     * Get the path to the base of the install.
     *
     * @param  string $path
     * @return string
     */
    function base_path($path = '')
    {
        return app()->basePath() . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }
}


if (!function_exists('config')) {
    /**
     * Get / set the specified configuration value.
     *
     * If an array is passed as the key, we will assume you want to set an array of values.
     *
     * @param  array|string $key
     * @param  mixed $default
     * @return mixed
     */
    function config($key = null, $default = null)
    {
        if (is_null($key)) {
            return app('config');
        }

        if (is_array($key)) {
            return app('config')->set($key);
        }

        return app('config')->get($key, $default);
    }
}


if (!function_exists('redis')) {
    /**
     * @return \Illuminate\Redis\RedisManager
     */
    function redis()
    {
        return app('redis');
    }
}


if (!function_exists('cache')) {
    /**
     * @return \Illuminate\Cache\CacheManager
     */
    function cache()
    {
        return app('cache');
    }
}


if (!function_exists('trans')) {
    /**
     * Translate the given message.
     *
     * @param  string $id
     * @param  array $parameters
     * @param  string $domain
     * @param  string $locale
     * @return \Symfony\Component\Translation\TranslatorInterface|string
     */
    function trans($id = null, $parameters = [], $domain = null, $locale = 'zh')
    {
        if (is_null($id)) {
            return app('translator');
        }

        return app('translator')->trans($id, $parameters, $domain, $locale);
    }
}

if (!function_exists('session')) {
    /**
     * @param string $key
     * @param mixed $value
     * @return \Illuminate\Session\Store
     */
    function session($key = null, $value = null)
    {
        if (is_null($key)) {
            return app('session');
        }

        if (is_null($value)) {
            return app('session')->get($key);
        }

        app('session')->set($key, $value);
        return app('session')->save();
    }
}


if (!function_exists('request')) {
    /**
     * Get an instance of the current request or an input item from the request.
     *
     * @param  string $key
     * @param  mixed $default
     * @return \Illuminate\Http\Request|string|array
     */
    function request($key = null, $default = null)
    {
        $request = app('request');
        if (is_null($key)) return $request;
        return $request->input($key, $default);
    }
}

if (!function_exists('dd')) {
    function dd($value = null)
    {
        var_dump($value);
        die();
    }
}
