<div>
    @if (count($cart) > 0)
        @foreach($cart as $row)
            <div class="p-1 d-flex">
                <div class="flex-1">
                    {{ $row['amount'] }} &times; {{ $row['name'] }} (${{ number_format($row['total_price'], 2) }})
                </div>
                <a href="#" class="text-danger" wire:click="remove('{{ $row['sku'] }}')">
                    <i class="fa fa-trash"></i>
                </a>
            </div>
        @endforeach
        <div class="text-center h3 mt-1">
            Total: ${{ number_format($total_price, 2) }}
        </div>
    @else
        <p class="p-3 m-0 text-center">No items in your cart</p>
    @endif
</div>
