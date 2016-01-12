<?php

namespace PY\App\Controllers;

use PY\Core\Storage,
    PY\Core\Response,
    PY\Core\Controller;

class Home extends Controller
{
    public function index()
    {
        $products = array_merge(
            $this->getOurProducts(),
            $this->getCoyoteProducts(),
            $this->getFoxProducts()
        );

        return Response::view('content', ['productsList' => $products]);
    }

    protected function getOurProducts()
    {
        $productModel = $this->getModel('ProductModel');

        return ['Wolf' => $productModel->getAll()];
    }

    protected function getCoyoteProducts()
    {
        $coyote = Storage::get('coyote_api');

        return ['Coyote' => $coyote->getProducts()];
    }

    protected function getFoxProducts()
    {
        $fox = Storage::get('fox_api');

        return ['Fox' => $fox->getProducts()];
    }
}