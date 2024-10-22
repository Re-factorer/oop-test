<?php

namespace services;

use interfaces\ProductRepositoryInterface;
use objects\Product;

class ProductService {
    private ProductRepositoryInterface $products;

    public function __construct(ProductRepositoryInterface $products) {
        $this->products = $products;
    }

    public function getProductDiscount(int $id) {
        /** @var Product $product */
        $product = $this->products->getProductById($id);
        return $product->getDiscount();
    }
}