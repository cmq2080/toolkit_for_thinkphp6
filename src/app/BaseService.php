<?php

namespace app;

class BaseService
{
    protected static $data = null;

    public static function instance($newInstance = false)
    {
        if ($newInstance) {
            return new static();
        }
        $key = trim(static::class, '\\');
        if (!isset(self::$data[$key])) {
            self::$data[$key] = new static();
        }

        return self::$data[$key];
    }

    protected function __construct()
    {
    }

    public static function __callStatic($name, $arguments)
    {
        return call_user_func_array([static::instance(), $name], $arguments);
    }
}
