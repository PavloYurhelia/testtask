<?php
namespace PY\Core\Utils;

class CSVParser
{
    public $delimiter = ';';

    public function get(string $path)
    {
        if (!file_exists($path)) {
            return [];
        }

        if (!$handle = fopen($path, 'r')) {
            return [];
        }

        $response = [];
        while (($line = fgetcsv($handle, 1000, ";")) !== false) {
            $response[] = $line;
        }

        return $response;
    }
}