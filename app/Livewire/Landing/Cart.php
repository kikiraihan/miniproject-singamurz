<?php

namespace App\Livewire\Landing;

use App\Models\Cart as ModelsCart;
use App\Models\Order;
use App\Models\Product;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Cart extends Component
{
    public $cartItems = [];
    public $isCartOpen = false;

    protected $listeners = ['addToCartFromClient' => 'addToCart', 'toggleCart' => 'toggleCart'];

    public function mount()
    {
        $this->loadCart();
    }

    // Toggle cart modal
    public function toggleCart()
    {
        $this->isCartOpen = !$this->isCartOpen;
    }

    // Load cart items from database
    public function loadCart()
    {
        $this->cartItems = ModelsCart::where('user_id', Auth::id())->with('product')->get()->toArray();
    }

    // Tambahkan item ke keranjang
    public function addToCart($productId, $quantity=1)
    {
        $product = Product::findOrFail($productId);
        $cartItem = ModelsCart::where('user_id', Auth::id())->where('product_id', $productId)->first();

        if ($cartItem) {
            $cartItem->quantity=$cartItem->quantity+$quantity;
            $cartItem->save();
        } else {
            ModelsCart::create([
                'user_id' => Auth::id(),
                'product_id' => $productId,
                'quantity' => $quantity ? $quantity:1,
            ]);
        }

        
        $this->loadCart();
        
        return Notification::make()
            ->title('Item ditambahkan ke keranjang')
            ->success()
            ->send();
    }

    // Kurangi item dari keranjang
    public function decreaseQuantity($cartId)
    {
        $cartItem = ModelsCart::findOrFail($cartId);
        if ($cartItem->quantity > 1) {
            $cartItem->decrement('quantity');
        } else {
            $cartItem->delete();
        }

        $this->loadCart();

        return Notification::make()
            ->title('Item dikurangi dari keranjang')
            ->success()
            ->send();
    }

    // Hapus item dari keranjang
    public function removeItem($cartId)
    {
        ModelsCart::findOrFail($cartId)->delete();
        $this->loadCart();
        return Notification::make()
            ->title('Item dihapus dari keranjang')
            ->success()
            ->send();
    }

    public function checkout()
    {
        $cartItems = ModelsCart::where('user_id', Auth::id())->get();
        if ($cartItems->isEmpty()) {
            session()->flash('error', 'Keranjang kosong!');
            return;
        }

        $totalPrice = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);

        $order = Order::create([
            'user_id' => Auth::id(),
            'total_amount' => $totalPrice,
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
        ModelsCart::where('user_id', Auth::id())->delete();

        $this->loadCart();
        return Notification::make()
            ->title('Pesanana di checkout')
            ->success()
            ->send();
        // session()->flash('success', 'Pesanan berhasil dibuat!');
        // return redirect()->route('order.details', ['orderId' => $order->id]);
    }

    public function render()
    {
        return view('livewire.landing.cart', [
            'isCartOpen' => $this->isCartOpen,
        ]);
    }
}