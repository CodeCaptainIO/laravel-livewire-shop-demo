<?php

namespace App\Http\Livewire;

use App\Services\CartService;
use App\Services\ProductService;
use Livewire\Component;

class Counter extends Component
{

    public $sku;
    public $amountToAdd = 1;

    public function set($amount)
    {
        $this->amountToAdd = max(1, $amount);
    }

    public function addToCart()
    {
        $this->updateCart($this->cartService()->amountForSku($this->sku) + $this->amountToAdd);
        $this->amountToAdd = 1;
    }

    /**
     * @return CartService
     */
    public function cartService()
    {
        return app()->make(CartService::class);
    }

    /**
     * @return ProductService
     */
    public function productService()
    {
        return app()->make(ProductService::class);
    }

    protected function updateCart($amount)
    {
        $cartService = app()->make(CartService::class);
        $cartService->updateSku($this->sku, $amount);
        $this->emit('cart_updated_' . $this->sku);
        $this->emit('cart_updated');
    }

    public function mount($sku)
    {
        $this->sku = $sku;
    }

    public function render()
    {
        return view('livewire.counter', [
            'price' => $this->productService()->getProduct($this->sku)['price'] * $this->amountToAdd
        ]);
    }
}
