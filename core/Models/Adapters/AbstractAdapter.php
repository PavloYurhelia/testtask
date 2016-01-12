<?php

namespace PY\Core\Models\Adapters;

abstract class AbstractAdapter
{
    protected $host;
    protected $DBName;
    protected $userName;
    protected $password;
    protected $connection;

    abstract public function execute(string $query, array $params);
}