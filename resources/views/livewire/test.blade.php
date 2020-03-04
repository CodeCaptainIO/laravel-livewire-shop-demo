<div>
    <livewire:counter :amount="$amount" />
    {{ $amount }}

    <input wire:model="amount" type="text">

    <h1>{{ $amount }}</h1>
</div>
