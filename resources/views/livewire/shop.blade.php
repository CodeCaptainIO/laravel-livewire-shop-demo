<div>
    <nav class="navbar navbar-light bg-light shadow">
        <a class="navbar-brand" href="#">Snackbar</a>

        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <div>
            <button class="btn btn-secondary" wire:click="$toggle('cartVisible')">
                <i class="fa fa-shopping-cart"></i>
                <span class="badge badge-pill badge-primary">Amount: {{ $total }}</span>
            </button>
        </div>
        <div class="card shadow cart {{ $cartVisible ? 'cart-visible' : 'cart-hidden' }}">
            <div class="card-header">
                Your cart
            </div>
            <div class="card-body">
                <livewire:cart />
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <livewire:product-list :products="$products" />
    </div>
    <div class="overlay {{ $cartVisible ? 'overlay-visible' : 'overlay-hidden' }}" wire:click="$set('cartVisible', false)"></div>
</div>
