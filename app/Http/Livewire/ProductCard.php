<?php

namespace App\Http\Livewire;

use App\Services\CartService;
use Livewire\Component;

class ProductCard extends Component
{

    public $product;
    public $amountInCart;

    protected function getListeners()
    {
        $event = 'cart_updated_' . $this->product['sku'];
        return [
            $event  => 'productUpdated'
        ];
    }

    public function productUpdated()
    {
        $cartService = app()->make(CartService::class);
        $this->amountInCart = $cartService->amountForSku($this->product['sku']);
    }

    public function mount($product)
    {
        $this->product = $product;
        $this->productUpdated();
    }

    public function render()
    {
        return view('livewire.product-card');
    }
}
