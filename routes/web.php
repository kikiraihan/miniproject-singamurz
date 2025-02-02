<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Landing\DetailProduct;
use App\Livewire\Landing\ListProduct;
use App\Livewire\UserPage\Checkout;
use App\Livewire\UserPage\Dashboard;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', ListProduct::class)->name('landing');
Route::get('/detail/{id}', DetailProduct::class)->name('landing.detail');

Route::get('/checkout', Checkout::class)->name('userpage.checkout');

Route::get('/dashboard', Dashboard::class)->middleware(['auth', 'verified'])->name('userpage.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
