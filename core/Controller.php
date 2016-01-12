<?php

namespace PY\Core;

class Controller
{
    protected function getModel(string $model)
    {
        $adapter = Storage::get('db_adapter');

        $model = 'PY\App\Models\\' . $model;

        return new $model($adapter);
    }
}