<div x-data="initialData()" x-init="init()">
    @include('partials.nav')
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
