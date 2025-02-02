<main class="container mx-auto px-4 py-8">
    {{-- <h1 class="text-3xl font-bold mb-6">Featured Products</h1> --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

        @forelse ($products as $item)
        <!-- Product Card -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden flex flex-col h-full justify-between transition duration-300 hover:ring-2 hover:ring-singa dark:hover:ring-singa-secondary">
         
            
            <!-- Gambar Produk -->
            <a href="{{ route('landing.detail', ['id' => $item->id]) }}">
                <img src="{{ $item->image_url }}" alt="{{ $item->name }}" class="w-full h-48 object-cover">
            </a>
        
            <!-- Konten Card -->
            <div class="p-4 flex flex-col flex-grow">
                <h2 class="text-xl font-semibold mb-2 text-gray-900 dark:text-gray-100">{{ $item->name }}</h2>
                <span class="text-singa dark:text-singa-secondary mb-2 font-extrabold text-sm">{{ $item->seller->shop_name }}</span>        
                <p class="text-gray-600 dark:text-gray-400 mb-2">{{ $item->short_description }}</p>        
            </div>

            <div class="mt-auto mb-2 px-2">
                <div class="flex items-center justify-between mb-4 px-2">
                    <span class="text-singa font-bold dark:text-singa-secondary">Rp {{ number_format($item->price, 0, ',', '.') }}</span>
                    <span class="text-singa font-bold dark:text-gray-300 text-sm">Qty: {{ $item->stock }}</span>
                </div>
                <button class="bg-singa text-white px-4 py-2 rounded-md hover:bg-singa flex items-center w-full justify-center transition duration-300 dark:bg-singa-secondary dark:hover:bg-singa-secondary"
                    wire:click="$dispatch('addToCartFromClient', [{{$item->id}}])" >
                    {{-- onclick="addToCart('{{ $item->name }}', {{ $item->price }})" --}}
                    <i class='bx bx-cart-add mr-2'></i>Add to Cart
                </button>
            </div>
        </div>
        @empty
        <p>No products found.</p>
        @endforelse

    </div>

    <!-- Pagination -->
    <div class="mt-8 justify-between">
        {{ $products->links() }}
    </div>
</main>
