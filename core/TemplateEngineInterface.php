<?php

namespace PY\Core;

interface TemplateEngineInterface
{
    public function make(string $template, array $params = []) : string;
}