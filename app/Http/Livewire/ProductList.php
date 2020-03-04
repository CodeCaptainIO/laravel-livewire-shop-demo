<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProductList extends Component
{

    public $products;

    public function mount($products)
    {
        $this->products = $products;
    }

    public function render()
    {
        return view('livewire.product-list');
    }
}
