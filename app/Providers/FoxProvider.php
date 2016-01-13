<?php

namespace PY\App\Providers;

class FoxProvider implements ProviderInterface
{
    /** Some dummy URL of Fox company's API */
    private $url = 'http://fox.com/api/2.0';

    /** One of the ways we can get content. Let's choose cURL. */
    private function doCurl(string $url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $content = curl_exec($ch);
        curl_close($ch);

        return $content;
    }

    /**
     * Do GET request to get products and parse response.
     * String is commented because of existing mock file.
     */
    public function getProducts()
    {
//        $content = $this->doCurl($this->url . '/products');

        $content = file_get_contents(ROOT . 'api.json');

        if (!$content) {
            return [];
        }

        $content = json_decode($content);

        if (!isset($content->items)) {
            return [];
        }

        $products = [];
        foreach ($content->items as $product) {
            $products[] = [
                'name' => $product->product_name,
                'price' => $product->product_price
            ];
        }

        return $products;
    }
}