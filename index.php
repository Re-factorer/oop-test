<?php

use objects\Product;
use repositories\FakeProductRepository;
use repositories\ProductRepository;
use services\ProductService;

require 'autoload.php';

$products = new ProductRepository();
$productService = new ProductService($products);
echo $productService->getProductDiscount(1);

echo "</br>";

$fakeProduct = new Product(12, 'fake name', 20, 1000.0);
$products = new FakeProductRepository([$fakeProduct]);
$productService = new ProductService($products);
echo $productService->getProductDiscount(12);