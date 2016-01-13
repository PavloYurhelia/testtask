<?php

namespace PY\Core\Models;

use PY\Core\Models\Drivers\ModelDriverInterface;

class Model
{
    private $driver = null;

    public function __construct(ModelDriverInterface $driver)
    {
        $this->driver = $driver;
    }

    public function execute(string $query, $params = [])
    {
        return $this->driver->execute($query, $params);
    }
}