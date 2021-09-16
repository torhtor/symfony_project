<?php

namespace App\utils;

use App\Entity\Products;

class CartProduct
{
    public Products $product;
    public int $quantity;
    function __construct(Products $product, int $quantity){
        $this->product = $product;
        $this->quantity = $quantity;
    }
}