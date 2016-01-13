<?php

namespace PY\Core;

class App
{
    public function run()
    {
        Request::parse();

        $controller = 'PY\App\Controllers\\' . ucfirst(Request::$controller);
        $method = Request::$method;

        $objectManager = ObjectManager::getInstance();

        echo $objectManager->invokeMethod($objectManager->get($controller), $method);
    }
}