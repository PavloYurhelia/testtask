<?php

namespace PY\App\Providers;

use PY\Core\Utils\CSVParser;

class CoyoteProvider
{
    private $parser;

    public function __construct(CSVParser $parser)
    {
        $this->parser = $parser;
    }
    
    public function getProducts()
    {
        $content = $this->parser->get(RESOURCES_ROOT . 'coyote_company.csv');

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