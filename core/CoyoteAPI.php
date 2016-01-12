<?php

namespace PY\Core;

use PY\Core\Utils\CSVParser;

class CoyoteAPI
{
    public function getProducts()
    {
        $csvParser = new CSVParser();

        $content = $csvParser->get(RESOURCES_ROOT . 'coyote_company.csv');

        $products = [];
        foreach ($content as $line) {
            $products[] = [
                'name' => $line[1],
                'price' => $line[2]
            ];
        }

        return $products;
    }
}