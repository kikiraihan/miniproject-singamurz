<div>
  <h2 class="text-lg font-semibold mb-4">Detail Order</h2>
  
  <div class="mb-4">
      <p><strong>Order ID:</strong> {{ $order->id }}</p>
      <p><strong>Tanggal Order:</strong> {{ $order->created_at->format('d M Y H:i') }}</p>
      <p><strong>Status:</strong> <span class="px-2 py-1 rounded text-white bg-{{ $order->status == 'pending' ? 'yellow-500' : ($order->status == 'completed' ? 'green-500' : 'red-500') }}">{{ ucfirst($order->status) }}</span></p>
      <p><strong>Total Harga:</strong> Rp{{ number_format($order->total_amount, 0, ',', '.') }}</p>
  </div>

  <h3 class="text-md font-semibold mb-2">Daftar Produk</h3>
  <div class="space-y-4">
      @foreach ($order->orderItems as $item)
          <div class="flex items-center border p-4 rounded-lg shadow-md">
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