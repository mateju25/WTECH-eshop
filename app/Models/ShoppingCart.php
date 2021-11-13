<?php

namespace App\Models;

class ShoppingCart
{
    public $products = [];
    public $totalPrice = 0;

    public function addProduct($id, $product, $quantity) {
        $product = ['quantity' => 0, 'product' => $product];

        if (array_key_exists($id, $this->products)) {
            $product = $this->products[$id];
        }

        $product['quantity'] += $quantity;
        $product['price'] = $product['quantity'] * $product->price;
        $this->products[$id] = $product;

        $this->totalPrice += $product['price'];
    }
}
