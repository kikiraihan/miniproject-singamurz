<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'image_url',
    ];

    /**
     * Relasi ke tabel order_items (satu produk bisa ada di banyak order items).
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function seller(){
        return $this->belongsTo(User::class, 'seller_id');
    }
}