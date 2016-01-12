<?php

namespace PY\Core;

class Response
{
    public static function view(string $template, array $params = [])
    {
        $templateEngine = Storage::get('template_engine');

        return $templateEngine->make($template, $params);
    }

    public static function json(array $data = [])
    {
        return json_encode($data);
    }
}