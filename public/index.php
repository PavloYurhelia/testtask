<?php

/** Get project environment. Enable errors if it's development */
$environment = getenv('ENVIRONMENT');

switch ($environment) {
    case 'production': ini_set('display_errors', 0);
        break;
    default: ini_set('display_errors', -1); error_reporting(-1);
}

/** Define root folder of project */
define('ROOT', __DIR__ . '/../');

/** Define root folder of application */
define('APP_ROOT', ROOT . 'app/');

/** Define root folder for templates */
define('TEMPLATES_ROOT', ROOT . 'templates/');

/** Define root folder for configurations files */
define('CONFIG_ROOT', ROOT . 'config/');

/** Define root folder for additional resources */
define('RESOURCES_ROOT', ROOT . 'resources/');

/** Define default controller for application */
define('DEFAULT_CONTROLLER', 'Home');

/** Define default method of controllers */
define('DEFAULT_METHOD', 'index');

/** Require autoloader */
require_once  APP_ROOT . 'autoloader.php';

$DBSettings = require_once CONFIG_ROOT . 'database.php';
$dependencies = require_once CONFIG_ROOT . 'dependencyConfig.php';

\PY\Core\ObjectManager::getInstance($dependencies);

/** Let's start */
$app = new \PY\Core\App();

$app->run();