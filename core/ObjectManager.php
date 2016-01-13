<?php

namespace PY\Core;

class ObjectManager
{
    private $relations = [];
    private $cache = [];
    private static $instance = null;

    private function __construct(array $relations)
    {
        $this->relations = $relations;
    }

    public static function getInstance(array $relations = [])
    {
        if (static::$instance === null) {
            static::$instance = new static($relations);
        }

        return static::$instance;
    }

    public function set(string $key, $value)
    {
        $this->relations[$key] = $value;
    }

    public function get(string $key)
    {
        if (!array_key_exists($key, $this->cache)) {
            $value = $this->relations[$key] ?? $key;

            $this->cache[$key] = $value instanceof \Closure
                ? $value()
                : $this->createObject($value);
        }

        return $this->cache[$key];
    }

    private function createObject($class)
    {
        $reflection = new \ReflectionClass($class);
        $reflectedConstruct = $reflection->getConstructor();

        $required = [];
        if ($reflectedConstruct) {
            $required = $this->getRequired($reflectedConstruct);
        }

        return $reflection->newInstanceArgs($required);
    }

    public function invokeMethod($object, $method)
    {
        $reflection = new \ReflectionClass($object);
        $reflectedMethod = $reflection->getMethod($method);

        $required = [];
        if ($reflectedMethod) {
            $required = $this->getRequired($reflectedMethod);
        }

        return $object->{$method}(...$required);
    }

    private function getRequired(\ReflectionMethod $reflected)
    {
        if (!$reflected) {
            return [];
        }

        $required = [];
        foreach ($reflected->getParameters() as $parameter) {
            if ($parameter->getClass()) {
                $required[] = $this->get($parameter->getClass()->getName());
            }
        }

        return $required;
    }
}