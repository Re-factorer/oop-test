<?php

namespace objects;

class Product {
    private int $id;
    private string $name;
    private int $taxes;
    private float $price;

    public function __construct($id, $name, $taxes, $price) {
        $this->id = $id;
        $this->name = $name;
        $this->taxes = $taxes;
        $this->price = $price;
    }

    public function getId() {
        return $this->id;
    }
    public function getPrice() {
        return $this->price;
    }
    public function getTaxes() {
        return $this->taxes;
    }

    public function getDiscount() {
        return $this->price * ($this->taxes / 100);
    }
}