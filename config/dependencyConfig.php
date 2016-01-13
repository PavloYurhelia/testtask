<?php

return [
    PY\Core\Models\Drivers\ModelDriverInterface::class => function () use ($DBSettings) {
        return new PY\Core\Models\Drivers\MysqlDriver(
            $DBSettings['host'],
            $DBSettings['name'],
            $DBSettings['username'],
            $DBSettings['password']
        );
    },
    PY\Core\TemplateEngineInterface::class => PY\Core\PrimitiveTemplateEngine::class
];