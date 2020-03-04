<?php

namespace App\Services;

class ProductService {

    public function getProducts()
    {
        return [
            [
                'sku' => 'burger',
                'name' => 'Burger & fries',
                'image' => '/img/burger.jpg',
                'price' => 13.95
            ],
            [
                'sku' => 'pizza',
                'name' => 'Pizza funghi',
                'image' => '/img/pizza.jpg',
                'price' => 9.95
            ],
            [
                'sku' => 'burrito',
                'name' => 'Burrito chicken',
                'image' => '/img/burrito.jpg',
                'price' => 9.95
            ],
            [
                'sku' => 'steak',
                'name' => 'Steak',
                'image' => '/img/steak.jpg',
                'price' => 29.95
            ],
            [
                'sku' => 'noodles',
                'name' => 'Noodles',
                'image' => '/img/noodles.jpg',
                'price' => 12.95
            ],
            [
                'sku' => 'sandwich',
                'name' => 'Sandwich',
                'image' => '/img/sandwich.jpg',
                'price' => 4.95
            ]
        ];
    }

    public function getProduct($sku)
    {
        return collect($this->getProducts())
            ->where('sku', $sku)
            ->first();
    }

}
