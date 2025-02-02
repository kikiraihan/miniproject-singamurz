<div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg p-6">
    <h2 class="text-lg font-semibold mb-4">Detail Order</h2>
    
    <div class="border rounded-lg overflow-hidden shadow-md">
        <table class="w-full text-left border-collapse">
            <tbody>
                <tr class="border-b">
                    <td class="p-3 font-semibold">Order ID</td>
                    <td class="p-3">{{ $order->id }}</td>
                </tr>
                <tr class="border-b">
                    <td class="p-3 font-semibold">Tanggal Order</td>
                    <td class="p-3">{{ $order->created_at->format('d M Y H:i') }}</td>
                </tr>
                <tr class="border-b">
                    <td class="p-3 font-semibold">Status</td>
                    <td class="p-3">
                        <span class="px-2 py-1 rounded text-white bg-{{ $order->status == 'pending' ? 'yellow-500' : ($order->status == 'completed' ? 'green-500' : 'red-500') }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="p-3 font-semibold">Metode Pembayaran</td>
                    <td class="p-3">
                        {{ $order->payment_method }}
                        @if(in_array($order->payment_method, ['BNI VA', 'BCA VA']))
                            <span class="ml-2 cursor-pointer text-blue-500 relative group">
                                (?)
                                <span class="absolute left-0 top-full mt-1 w-48 p-2 text-sm text-white bg-gray-700 rounded shadow-lg opacity-0 group-hover:opacity-100 transition-opacity">
                                    Nomor Virtual Account: 1234567890 (Contoh)
                                </span>
                            </span>
                        @endif
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="p-3 font-semibold">Total Harga</td>
                    <td class="p-3">Rp{{ number_format($order->total_amount, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td class="p-3 font-semibold">Alamat Pengiriman</td>
                    <td class="p-3">{{ $order->user->address }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <h3 class="text-md font-semibold mt-6 mb-4">Daftar Produk</h3>
    <div class="space-y-4">
        @foreach ($order->orderItems as $item)
            <div class="flex items-center border rounded-lg shadow-md p-4">
                <img src="{{ $item->product->image_url }}" alt="{{ $item->product->name }}" class="w-24 h-24 object-cover rounded-lg">
                <div class="ml-4">
                    <p class="text-lg font-semibold">{{ $item->product->name }}</p>
                    <p class="text-gray-600">Harga: Rp{{ number_format($item->price, 0, ',', '.') }}</p>
                    <p class="text-gray-600">Jumlah: {{ $item->quantity }}</p>
                    <p class="text-gray-800 font-semibold">Subtotal: Rp{{ number_format($item->price * $item->quantity, 0, ',', '.') }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
