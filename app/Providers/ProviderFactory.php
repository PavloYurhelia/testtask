<?php

namespace PY\App\Providers;

use PY\Core\ObjectManager;

class ProviderFactory
{
    private $providers = [
        'WolfProvider' => WolfProvider::class,
        'CoyoteProvider' => CoyoteProvider::class,
        'FoxProvider' => FoxProvider::class
    ];

    public function build(string $key)
    {
        if (!array_key_exists($key, $this->providers)) {
            return null;
        }

        return ObjectManager::getInstance()->get($this->providers[$key]);
    }
}