<?php

namespace PY\App\Models;

use PY\Core\Models\Model;

class ProductModel extends Model
{
    private static $table = 'products';

    public function getAll()
    {
        return $this->execute('SELECT id, name, price, notes FROM ' . self::$table);
    }
}