<div x-data="{inputVisible: false}">
    <div class="d-flex">
        <div>
            <button class="btn btn-secondary" wire:click="set({{ $amountToAdd - 1 }})">-</button>
            <button class="btn btn-secondary" wire:model="amountToAdd" @click="promptForAmount($dispatch, 'Please enter your amount'); inputVisible = true;">{{ $amountToAdd }}</button>
            <button class="btn btn-secondary" wire:click="set({{ $amountToAdd + 1 }})">+</button>
        </div>
        <button class="ml-auto btn btn-primary" wire:click="addToCart()">
            Add to cart (${{ number_format($price, 2) }})
        </button>
    </div>
</div>
