<div>
    <div class="card shadow">
        <div class="embed-responsive embed-responsive-16by9 product-img" style="background-image: url({{ $product["image"] }});">
            <div class="card-img-overlay">
                @if ($amountInCart > 0)
                    <div class="badge badge-pill badge-primary amount-in-cart">
                        {{ $amountInCart }} in cart
                    </div>
                @endif
            </div>
        </div>
        <div class="card-body">
            <strong>{{ $product['name'] }}</strong>
        </div>
        <div class="card-footer">
            <livewire:counter :sku="$product['sku']" />
        </div>
    </div>
</div>
