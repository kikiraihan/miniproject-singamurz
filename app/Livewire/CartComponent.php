<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartComponent extends Component
{
    public $cartItems = [];

    public function mount()
    {
        $this->loadCart();
    }

    // Load cart items from database
    public function loadCart()
    {
        $this->cartItems = Cart::where('user_id', Auth::id())->with('product')->get()->toArray();
    }

    // Tambahkan item ke keranjang
    public function addToCart($productId)
    {
        $product = Product::findOrFail($productId);
        $cartItem = Cart::where('user_id', Auth::id())->where('product_id', $productId)->first();

        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $productId,
                'quantity' => 1,
            ]);
        }

        $this->loadCart();
    }

    // Kurangi item dari keranjang
    public function decreaseQuantity($cartId)
    {
        $cartItem = Cart::findOrFail($cartId);
        if ($cartItem->quantity > 1) {
            $cartItem->decrement('quantity');
        } else {
            $cartItem->delete();
        }

        $this->loadCart();
    }

    // Hapus item dari keranjang
    public function removeItem($cartId)
    {
        Cart::findOrFail($cartId)->delete();
        $this->loadCart();
    }

    public function checkout()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        if ($cartItems->isEmpty()) {
            session()->flash('error', 'Keranjang kosong!');
            return;
        }

        $totalPrice = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);

        $order = Order::create([
            'user_id' => Auth::id(),
            'total_price' => $totalPrice,
            'status' => 'pending',
        ]);

        foreach ($cartItems as $item) {
            $order->orderItems()->create([
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ]);
        }

        // Hapus semua item dari cart setelah checkout
        Cart::where('user_id', Auth::id())->delete();

        session()->flash('success', 'Pesanan berhasil dibuat!');
        return redirect()->route('order.details', ['orderId' => $order->id]);
    }


    public function render()
    {
        return view('livewire.cart-component');
    }
}
