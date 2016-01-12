<?php

namespace PY\Core;

use PY\Core\Models\Adapters\MysqlAdapter;

class App
{
    public function __construct()
    {
        $this->load();
    }

    public function run()
    {
        Request::parse();

        $controller = 'PY\App\Controllers\\' . ucfirst(Request::$controller);
        $method = Request::$method;

        if (class_exists($controller) && method_exists($controller, $method)) {
            echo call_user_func_array(
                [new $controller(), $method],
                Request::$arguments
            );
        } else {
            header("HTTP/1.0 404 Not Found");
            die('Uoops, requested page not found');
        }
    }

    private function load() {
        $DBSettings = require CONFIG_ROOT . 'database.php';

        Storage::set(
            'db_adapter',
            new MysqlAdapter(
                $DBSettings['host'],
                $DBSettings['name'],
                $DBSettings['username'],
                $DBSettings['password']
            )
        );

        Storage::set('template_engine', new PrimitiveTemplateEngine());
        Storage::set('fox_api', new FoxAPI());
        Storage::set('coyote_api', new CoyoteAPI());
    }
}