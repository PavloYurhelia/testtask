<?php

namespace PY\Core\Models;

use PY\Core\Models\Adapters\AbstractAdapter;

class Model
{
    private $adapter = null;

    public function __construct(AbstractAdapter $adapter)
    {
        $this->adapter = $adapter;
    }

    public function execute(string $query, $params = [])
    {
        return $this->adapter->execute($query, $params);
    }
}