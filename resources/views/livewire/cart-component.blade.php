<div>
    <h2 class="text-lg font-bold mb-4">Keranjang Belanja</h2>

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
