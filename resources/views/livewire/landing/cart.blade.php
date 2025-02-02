<div>
    <!-- Ikon Keranjang Belanja -->
    <button wire:click="toggleCart" class="relative px-2 py-1 rounded-full hover:bg-gray-300 dark:bg-gray-700 text-gray-900 dark:text-white shadow-md transition duration-300">
        <i class='bx bx-cart mr-4 text-lg'></i>
        <span class="absolute top-0 right-0 bg-red-500 text-white text-xs px-2 py-1 rounded-full">
            {{ count($cartItems) }}
        </span>
    </button>

    <!-- Modal Keranjang -->
    @if($isCartOpen)
        <div wire:click.self="toggleCart" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
            <div class="bg-white p-6 rounded-lg shadow-lg w-2/3 relative">
                <h2 class="text-lg font-bold mb-4">Keranjang Belanja</h2>
                
                <!-- Tombol Close dengan Boxicons -->
                <button wire:click="toggleCart" class="absolute top-2 right-2 text-gray-600">
                    <i class="bx bx-x text-3xl"></i>
                </button>

                @if(empty($cartItems))
                    <p>Keranjang kosong.</p>
                @else
                    <table id="cartTable" class="w-full border-collapse border border-gray-300 display">
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
                                        <button wire:click="decreaseQuantity({{ $item['id'] }})" class="px-2 py-1 bg-red-500 text-white rounded-lg">-</button>
                                        <span class="mx-2">{{ $item['quantity'] }}</span>
                                        <button wire:click="addToCart({{ $item['product']['id'] }})" class="px-2 py-1 bg-green-500 text-white rounded-lg">+</button>
                                    </td>
                                    <td class="p-2 border">Rp {{ number_format($item['product']['price'] * $item['quantity'], 0, ',', '.') }}</td>
                                    <td class="p-2 border">
                                        <button wire:click="removeItem({{ $item['id'] }})" class="px-2 py-1 bg-red-600 text-white rounded-lg">Hapus</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4 text-right">
                        <a href="{{ route('userpage.form-checkout') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Checkout</a>
                    </div>
                @endif
            </div>
        </div>
    @endif

    <!-- DataTables Scripts -->
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    @script
    <script>
        $('#cartTable').DataTable({
            destroy: true,
            responsive: true,
            paging: true,
            searching: true,
            ordering: true,
        });
    </script>
    @endscript --}}
</div>
