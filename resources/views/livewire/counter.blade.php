<div x-data="{amount: 1}">
    <div class="d-flex">
        <div wire:model.debounce.250ms="amountToAdd">
            <button class="btn btn-secondary" @click="amount = Math.max(1, amount - 1); $dispatch('input', amount);">-</button>
            <button class="btn btn-secondary" x-html="amount" @click="promptForAmount('Please enter your amount', (newAmount) => {amount = Math.max(1, newAmount)}); $dispatch('input', amount);"></button>
            <button class="btn btn-secondary" @click="amount = amount + 1; $dispatch('input', amount);">+</button>
        </div>
        <button class="ml-auto btn btn-primary" wire:click="addToCart()" wire:loading.attr="disabled" @click="amount = 1" wire:target="amountToAdd, addToCart">
            Add to cart (${{ number_format($price, 2) }})
            <div class="loader-wrap" wire:loading.class="d-flex">
                <i class="fa fa-refresh loading-icon fa-spin"></i>
            </div>
        </button>
    </div>
</div>
