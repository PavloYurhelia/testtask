<?php

namespace PY\Core;

class Response
{
    public static function view(TemplateEngineInterface $templateEngine, string $template, array $params = [])
    {
        return $templateEngine->make($template, $params);
    }

    public static function json(array $data = [])
    {
        return json_encode($data);
    }
}