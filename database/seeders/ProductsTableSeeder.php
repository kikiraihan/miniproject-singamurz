<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seller = User::find(1);

        // Contoh data produk dengan gambar yang sesuai
        $products = [
            [
                'name' => 'Laptop Asus ROG',
                'description' => 'Laptop gaming dengan performa tinggi.',
                'price' => 15000000,
                'stock' => 10,
                'image_url' => 'https://images.unsplash.com/photo-1593642702821-c8da6771f0c6?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&h=300&q=80', // Gambar laptop
                'seller_id' => $seller->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Smartphone Samsung S21',
                'description' => 'Smartphone flagship dengan kamera canggih.',
                'price' => 12000000,
                'stock' => 20,
                'image_url' => 'https://images.unsplash.com/photo-1610792516307-ea5acd9c3b00?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&h=300&q=80', // Gambar smartphone
                'seller_id' => $seller->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Headphone Sony WH-1000XM4',
                'description' => 'Headphone noise-cancelling premium.',
                'price' => 3500000,
                'stock' => 15,
                'image_url' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&h=300&q=80', // Gambar headphone
                'seller_id' => $seller->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Smartwatch Apple Watch Series 7',
                'description' => 'Smartwatch dengan layar besar dan fitur kesehatan.',
                'price' => 7000000,
                'stock' => 8,
                'image_url' => 'https://images.unsplash.com/photo-1579586337278-3befd40fd17a?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&h=300&q=80', // Gambar smartwatch
                'seller_id' => $seller->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kamera Canon EOS R5',
                'description' => 'Kamera mirrorless dengan resolusi tinggi.',
                'price' => 45000000,
                'stock' => 5,
                'image_url' => 'https://images.unsplash.com/photo-1512790182412-b19e6d62bc39?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&h=300&q=80', // Gambar kamera
                'seller_id' => $seller->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert data ke tabel products
        DB::table('products')->insert($products);
    }
}