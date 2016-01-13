<?php

namespace PY\App\Providers;

use PY\App\Models\ProductModel;

class WolfProvider implements ProviderInterface
{
    private $productModel;

    public function __construct(ProductModel $productModel)
    {
        $this->productModel = $productModel;
    }
    
    public function getProducts()
    {
        return $this->productModel->getAll();
    }
}