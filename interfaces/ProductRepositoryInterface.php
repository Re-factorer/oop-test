<?php

namespace interfaces;

interface ProductRepositoryInterface {
    public function getProductById(int $id);
}