<?php
/**
 * Primitive Request class. Must provide access to sent variables, detect requested controller and his method.
*/

namespace PY\Core;

class Request
{
    public static $URL = '';
    public static $controller = '';
    public static $method = '';
    public static $arguments = [];

    public static function parse()
    {
        $parsedURL = parse_url($_SERVER['REQUEST_URI']);

        $parts = explode('/', $parsedURL['path']);

        if (!empty($parts[1])) {
            self::$controller = $parts[1];
        } else {
            self::$controller = DEFAULT_CONTROLLER;
        }

        if (!empty($parts[2])) {
            self::$method = $parts[2];
        } else {
            self::$method = DEFAULT_METHOD;
        }

        if (!empty($parsedURL['query'])) {
            parse_str($parsedURL['query'], self::$arguments);
        }
    }
}