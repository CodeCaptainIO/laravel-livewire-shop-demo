<?php

namespace App\Services;

class CartService {

    public $cart;

    public function __construct()
    {
        // We store the session in the cart, so in the constructor we get the values back from the session
        $this->cart = session('cart');
    }

    /**
     * Return the amount of an SKU in the cart
     * @param $sku
     * @return int
     */
    public function amountForSku($sku)
    {
        if (!empty($this->cart[$sku])) {
            return $this->cart[$sku];
        }
        return 0;
    }

    /**
     * Remove an item from the cart
     * @param $sku
     */
    public function removeSku($sku)
    {
        $this->updateSku($sku, 0);
    }

    /**
     * Update the amount of a given SKU in the cart. When $amount is 0, the item gets removed
     * @param $sku
     * @param int $amount
     */
    public function updateSku($sku, $amount = 1)
    {
        if ($amount == 0) {
            unset($this->cart[$sku]);
        } else {
            $this->cart[$sku] = $amount;
        }
        // Store the current cart in the session
        session([
            'cart' => $this->cart
        ]);
    }

    /**
     * Get an array of all the items in the cart
     * @return array
     */
    public function currentCart()
    {
        // We fetch the product itself from the ProductService class
        /** @var ProductService $productService */
        $productService = app()->make(ProductService::class);
        return collect($this->cart)
            ->map(function($amount, $sku) use ($productService) {
                // Fetch the product from the ProductService, set amount and total_price, and return it
                if ($product = $productService->getProduct($sku)) {
                    $product['amount'] = $amount;
                    $product['total_price'] = $amount * $product['price'];
                    return $product;
                }
            })
            ->filter() // Filter out null values, if any
            ->toArray();
    }

    /**
     * Get the total amount of items in the cart
     * @return int
     */
    public function itemCount()
    {
        return collect($this->cart)->sum();
    }

    /**
     * Total price
     * @return float
     */
    public function totalPrice()
    {
        return collect($this->currentCart())->sum('total_price');
    }

}
