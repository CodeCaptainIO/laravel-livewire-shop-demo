<div class="row">
    @foreach($products as $product)
        <div class="col-md-6 col-lg-4 mb-3" wire:key="{{ $loop->index }}">
            <livewire:product-card :product="$product" :key="$loop->index" />
        </div>
    @endforeach
</div>
