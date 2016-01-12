<?php

namespace PY\Core;

class Storage
{
    private static $storage = [];

    public static function set(string $key, $value)
    {
        self::$storage[$key] = $value;
    }

    public static function get(string $key)
    {
        if (array_key_exists($key, self::$storage)) {
            return self::$storage[$key];
        }
    }
}