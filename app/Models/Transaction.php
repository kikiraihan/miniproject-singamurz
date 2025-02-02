<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'transaction_id',
        'payment_method',
        'status',
    ];

    /**
     * Relasi ke tabel orders (satu transaksi dimiliki oleh satu order).
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}