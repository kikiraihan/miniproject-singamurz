<div class="container mx-auto w-2/3 mt-8">
    <h2 class="text-xl font-bold mb-4">Checkout</h2>
    
    <!-- User Information -->
    <div class="border p-4 rounded-lg bg-gray-100 mb-4">
        <p><strong>Nama:</strong> {{ $user->name }}</p>
        <p><strong>Alamat:</strong> {{ $address }}</p>
    </div>
    
    <!-- Cart Items -->
    <div class="grid gap-4">
        @foreach($cartItems as $item)
            <div class="flex items-center p-4 border rounded-lg bg-white shadow">
                <img src="{{ $item['product']['image_url'] }}" alt="{{ $item['product']['name'] }}" class="w-20 h-20 object-cover rounded">
                <div class="ml-4">
                    <p class="font-bold">{{ $item['product']['name'] }}</p>
                    <p>Rp {{ number_format($item['product']['price'], 0, ',', '.') }}</p>
                    <p>Jumlah: {{ $item['quantity'] }}</p>
                </div>
            </div>
        @endforeach
    </div>
    
    <!-- Payment Method Selection -->
    <div class="mt-4">
        <label for="paymentMethod" class="block font-bold">Metode Pembayaran:</label>
        <select wire:model="paymentMethod" class="w-full p-2 border rounded-lg">
            <option value="">Pilih Metode</option>
            <option value="COD">Cash on Delivery (COD)</option>
            <option value="BNI VA">BNI Virtual Account</option>
            <option value="BCA VA">BCA Virtual Account</option>
        </select>
    </div>
    
    <!-- Checkout Button -->
    <div class="mt-4 text-right">
        <button wire:click="checkout" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Checkout</button>
    </div>
</div>