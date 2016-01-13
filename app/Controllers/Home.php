<?php

namespace PY\App\Controllers;

use PY\Core\Response,
    PY\Core\Controller,
    PY\Core\TemplateEngineInterface,
    PY\App\Providers\ProviderFactory;

class Home extends Controller
{
    public function index(
        ProviderFactory $factory,
        TemplateEngineInterface $templateEngine
    ){
        $products = [
            'Wolf' => $factory->build('WolfProvider')->getProducts(),
            'Coyote' => $factory->build('CoyoteProvider')->getProducts(),
            'Fox' => $factory->build('FoxProvider')->getProducts()
        ];

        return Response::view($templateEngine, 'content', ['productsList' => $products]);
    }
}