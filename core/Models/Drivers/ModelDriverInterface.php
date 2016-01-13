<?php

namespace PY\Core\Models\Drivers;

interface ModelDriverInterface
{
    public function execute(string $query, array $params);
}