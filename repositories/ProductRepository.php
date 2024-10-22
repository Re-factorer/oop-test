<?php

namespace repositories;

use Exception;
use interfaces\ProductRepositoryInterface;
use JsonException;
use objects\Product;

class ProductRepository implements ProductRepositoryInterface {
    public function getProductById($id): Product {
        $url = 'https://fakerapi.it/api/v2/products?_quantity=1&_taxes=12&_categories_type=uuid'; // api_url

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $result = curl_exec($ch);
        curl_close($ch);

        try {
            $productRaw = json_decode($result, false, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            throw new Exception($e->getMessage());
        }

        if (!empty($productRaw->data)) {
            foreach ($productRaw->data as $item) {
                if ($item->id === $id) {
                    return new Product(
                        $item->id,
                        $item->name,
                        $item->taxes,
                        $item->price,
                    );
                }
            }
        }

        throw new Exception('Incorrect response');
    }
}