<?php

namespace PY\Core;

class PrimitiveTemplateEngine implements TemplateEngineInterface
{
    public function make(string $template, array $params = []) : string
    {
        if (!file_exists(TEMPLATES_ROOT . $template . '.php')) {
            return '';
        }

        extract($params);

        ob_start();
        require TEMPLATES_ROOT . $template . '.php';
        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }
}