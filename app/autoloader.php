<?php

spl_autoload_register(function ($class) {

    $vendor = 'PY\\';

    $base_dir = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR;

    $class = str_replace($vendor . 'App\\', 'app' . DIRECTORY_SEPARATOR, $class);
    $class = str_replace($vendor . 'Core\\', 'core' . DIRECTORY_SEPARATOR, $class);

    $file = $base_dir . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});