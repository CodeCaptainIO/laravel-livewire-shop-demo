<?php

namespace App\Http\Livewire;

use App\Services\CartService;
use Livewire\Component;

class Cart extends Component
{

    public $cart;
    protected $listeners = [
        'cart_updated' => 'updateCart'
    ];

    public function updateCart()
    {
        $this->cart = $this->cartService()->currentCart();
    }

    public function mount()
    {
        $this->updateCart();
    }

    public function remove($sku)
    {
        $this->cartService()->removeSku($sku);
        $this->updateCart();
        $this->emit('cart_amount_updated');
        $this->emit('cart_updated_' . $sku);
    }

    /**
     * @return CartService
     */
    public function cartService()
    {
        return app()->make(CartService::class);
    }

    public function render()
    {
        return view('livewire.cart', [
            'cart' => $this->cart,
            'total_price' => $this->cartService()->totalPrice()
        ]);
    }
}
