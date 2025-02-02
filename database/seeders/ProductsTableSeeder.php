<?php

namespace Database\Seeders;

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
        // Contoh data produk
        $products = [
            [
                'name' => 'Laptop Asus ROG',
                'description' => 'Laptop gaming dengan performa tinggi.',
                'price' => 15000000,
                'stock' => 10,
                'image_url' => 'https://picsum.photos/400/300?random=1', // Gambar placeholder
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Smartphone Samsung S21',
                'description' => 'Smartphone flagship dengan kamera canggih.',
                'price' => 12000000,
                'stock' => 20,
                'image_url' => 'https://picsum.photos/400/300?random=2', // Gambar placeholder
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Headphone Sony WH-1000XM4',
                'description' => 'Headphone noise-cancelling premium.',
                'price' => 3500000,
                'stock' => 15,
                'image_url' => 'https://picsum.photos/400/300?random=3', // Gambar placeholder
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Smartwatch Apple Watch Series 7',
                'description' => 'Smartwatch dengan layar besar dan fitur kesehatan.',
                'price' => 7000000,
                'stock' => 8,
                'image_url' => 'https://picsum.photos/400/300?random=4', // Gambar placeholder
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kamera Canon EOS R5',
                'description' => 'Kamera mirrorless dengan resolusi tinggi.',
                'price' => 45000000,
                'stock' => 5,
                'image_url' => 'https://picsum.photos/400/300?random=5', // Gambar placeholder
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert data ke tabel products
        DB::table('products')->insert($products);
    }
}