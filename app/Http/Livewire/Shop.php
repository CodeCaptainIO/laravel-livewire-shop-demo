<?php

namespace App\Http\Livewire;

use App\Services\CartService;
use App\Services\ProductService;
use Livewire\Component;

class Shop extends Component
{

    public $products = [];
    public $cartVisible = false;
    protected $listeners = ['cart_updated' => 'updateCart'];

    public function mount()
    {
        $this->products = $this->products();
    }

    public function updateCart()
    {
        $this->products = $this->products();
        $this->cartVisible = true;
    }

    protected function products()
    {
        return $this->productService()->getProducts();
    }

    public function cartService()
    {
        return app()->make(CartService::class);
    }

    public function productService()
    {
        return app()->make(ProductService::class);
    }

    public function render()
    {
        return view('livewire.shop', [
            'total' => $this->cartService()->total()
        ]);
    }
}
