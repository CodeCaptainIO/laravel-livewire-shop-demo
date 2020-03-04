<?php

namespace App\Services;

class CartService {

    public $cart;

    public function __construct()
    {
        $this->cart = session('cart');
    }

    public function amountForSku($sku)
    {
        if (!empty($this->cart[$sku])) {
            return $this->cart[$sku];
        }
        return 0;
    }

    public function removeSku($sku)
    {
        $this->updateSku($sku, 0);
    }

    public function updateSku($sku, $amount = 1)
    {
        if ($amount == 0) {
            unset($this->cart[$sku]);
        } else {
            $this->cart[$sku] = $amount;
        }
        session([
            'cart' => $this->cart
        ]);
    }

    public function currentCart()
    {
        $productService = app()->make(ProductService::class);
        return collect($this->cart)
            ->map(function($amount, $sku) use ($productService) {
                if ($product = $productService->getProduct($sku)) {
                    $product['amount'] = $amount;
                    $product['total_price'] = $amount * $product['price'];
                    return $product;
                }
            })
            ->filter()
            ->toArray();
    }

    public function total()
    {
        return collect($this->cart)->sum();
    }

    public function totalPrice()
    {
        return collect($this->currentCart())->sum('total_price');
    }

}
