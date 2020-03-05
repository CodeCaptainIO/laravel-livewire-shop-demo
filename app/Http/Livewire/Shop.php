<?php

namespace App\Http\Livewire;

use App\Services\CartService;
use App\Services\ProductService;
use Livewire\Component;

class Shop extends Component
{

    public $products = [];
    protected $listeners = [
        'cart_updated' => 'updateProducts',
        'cart_amount_updated' => 'updateProducts'
    ];

    public function mount()
    {
        $this->products = $this->products();
    }

    public function updateProducts()
    {
        $this->products = $this->products();
    }

    protected function products()
    {
        return $this->productService()->getProducts();
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

    public function render()
    {
        return view('livewire.shop', [
            'total' => $this->cartService()->itemCount()
        ]);
    }
}
