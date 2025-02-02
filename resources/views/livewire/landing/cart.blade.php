<div>
    <!-- Ikon Keranjang Belanja -->
    <button wire:click="toggleCart" class="relative p-2 bg-gray-200 rounded-full">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l1 5h13l1-5h2M5 10h14l-1 9H6l-1-9m5 9a1 1 0 100-2 1 1 0 000 2zm6 0a1 1 0 100-2 1 1 0 000 2z" />
        </svg>
        @if(count($cartItems) > 0)
            <span class="absolute top-0 right-0 bg-red-500 text-white text-xs px-2 py-1 rounded-full">
                {{ count($cartItems) }}
            </span>
        @endif
    </button>

    <!-- Modal Keranjang -->
    @if($isCartOpen)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
            <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
                <h2 class="text-lg font-bold mb-4">Keranjang Belanja</h2>
                <button wire:click="toggleCart" class="absolute top-2 right-2 text-gray-600">&times;</button>
                
                @if(empty($cartItems))
                    <p>Keranjang kosong.</p>
                @else
                    <table class="w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="p-2 border">Produk</th>
                                <th class="p-2 border">Harga</th>
                                <th class="p-2 border">Jumlah</th>
                                <th class="p-2 border">Total</th>
                                <th class="p-2 border">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cartItems as $item)
                                <tr>
                                    <td class="p-2 border">{{ $item['product']['name'] }}</td>
                                    <td class="p-2 border">Rp {{ number_format($item['product']['price'], 0, ',', '.') }}</td>
                                    <td class="p-2 border">
                                        <button wire:click="decreaseQuantity({{ $item['id'] }})" class="px-2 py-1 bg-red-500 text-white">-</button>
                                        <span class="mx-2">{{ $item['quantity'] }}</span>
                                        <button wire:click="addToCart({{ $item['product']['id'] }})" class="px-2 py-1 bg-green-500 text-white">+</button>
                                    </td>
                                    <td class="p-2 border">Rp {{ number_format($item['product']['price'] * $item['quantity'], 0, ',', '.') }}</td>
                                    <td class="p-2 border">
                                        <button wire:click="removeItem({{ $item['id'] }})" class="px-2 py-1 bg-red-600 text-white">Hapus</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    @endif
</div>
