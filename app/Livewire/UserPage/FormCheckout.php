<?php

namespace App\Livewire\UserPage;

use App\Models\Cart as ModelsCart;
use App\Models\Order;
use App\Models\User;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FormCheckout extends Component
{
    public $cartItems = [];
    public $user;
    public $address;
    public $paymentMethod;

    public function mount()
    {
        $this->user = Auth::user();
        $this->address = $this->user->address ?? '';
        $this->loadCart();
    }

    public function loadCart()
    {
        $cartItems = ModelsCart::where('user_id', Auth::id())->with('product')->get();
        if ($cartItems->isEmpty()) {
            return redirect(route('userpage.checkout'));
        }
        $this->cartItems = $cartItems->toArray();
    }

    public function checkout()
    {
        $cartItems = ModelsCart::where('user_id', Auth::id())->get();
        if ($cartItems->isEmpty()) {
            return abort(404);
        }

        $totalPrice = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);

        $order = Order::create([
            'user_id' => Auth::id(),
            'total_amount' => $totalPrice,
            'status' => 'payment_pending',
            'payment_method' => $this->paymentMethod,
        ]);

        foreach ($cartItems as $item) {
            $order->orderItems()->create([
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ]);
        }

        ModelsCart::where('user_id', Auth::id())->delete();

        Notification::make()
            ->title('Pesanan Berhasil Dibuat')
            ->success()
            ->send();

        return redirect(route('userpage.checkout'));
    }

    public function render()
    {
        return view('livewire.user-page.form-checkout', [
            'store' => 'rreu',
        ])->layout('landing.layout');
    }
}
