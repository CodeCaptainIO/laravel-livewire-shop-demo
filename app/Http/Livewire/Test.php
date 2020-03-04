<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Test extends Component
{
    public $amount = 0;

    public function set($amount)
    {
        $this->amount = $amount;
    }

    public function render()
    {
        return view('livewire.test');
    }
}
