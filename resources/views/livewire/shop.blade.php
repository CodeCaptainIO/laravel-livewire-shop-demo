<div x-data="initialData()" x-init="init()">
    <nav class="navbar navbar-light bg-light shadow">
        <a class="navbar-brand" href="#">Snackbar</a>

        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <div>
            <button class="btn btn-secondary" @click="cartVisible = true">
                <i class="fa fa-shopping-cart"></i>
                <span class="badge badge-pill badge-primary">Amount: {{ $total }}</span>
            </button>
        </div>
        <div class="card shadow cart" x-show.transition="cartVisible" @click.away="cartVisible = false">
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
    <div class="overlay" x-show.transition.opacity="cartVisible"></div>
</div>
@push('scripts')
    <script>
        function initialData() {
            return {
                cartVisible: false,
                init() {
                    window.livewire.on('cart_updated', () => {
                        this.cartVisible = true;
                        window.scrollTo({
                            top: 0,
                            left: 0,
                            behavior: 'smooth'
                        });
                    });
                }
            }
        }
    </script>
@endpush
