<?php

namespace repositories;

use interfaces\ProductRepositoryInterface;
use objects\Product;

class FakeProductRepository implements ProductRepositoryInterface {
    private array $products;
    public function __construct(array $products) {
        $this->products = $products;
    }

    public function getProductById(int $id) {
        /** @var Product $product */
        foreach ($this->products as $product) {
            if ($product->getId() === $id) {
                return $product;
            }
        }
        return null;
    }
}