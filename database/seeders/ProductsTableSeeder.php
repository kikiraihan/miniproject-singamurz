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
        $seller = User::find(2);

        $products = [
            [
                'name' => 'Laptop Asus ROG',
                'short_description' => 'Laptop gaming dengan performa tinggi.',
                'price' => 15000000,
                'stock' => 10,
                'image_url' => 'https://images.unsplash.com/photo-1593642702821-c8da6771f0c6?auto=format&fit=crop&w=400&h=300&q=80',
            ],
            [
                'name' => 'Smartphone Samsung S21',
                'short_description' => 'Smartphone flagship dengan kamera canggih.',
                'price' => 12000000,
                'stock' => 20,
                'image_url' => 'https://images.unsplash.com/photo-1610792516307-ea5acd9c3b00?auto=format&fit=crop&w=400&h=300&q=80',
            ],
            [
                'name' => 'Headphone Sony WH-1000XM4',
                'short_description' => 'Headphone noise-cancelling premium.',
                'price' => 3500000,
                'stock' => 15,
                'image_url' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=400&h=300&q=80',
            ],
            [
                'name' => 'Smartwatch Apple Watch Series 7',
                'short_description' => 'Smartwatch dengan layar besar dan fitur kesehatan.',
                'price' => 7000000,
                'stock' => 8,
                'image_url' => 'https://images.unsplash.com/photo-1579586337278-3befd40fd17a?auto=format&fit=crop&w=400&h=300&q=80',
            ],
            [
                'name' => 'Kamera Canon EOS R5',
                'short_description' => 'Kamera mirrorless dengan resolusi tinggi.',
                'price' => 45000000,
                'stock' => 5,
                'image_url' => 'https://images.unsplash.com/photo-1512790182412-b19e6d62bc39?auto=format&fit=crop&w=400&h=300&q=80',
            ],
            [
                'name' => 'Keyboard Mechanical Razer',
                'short_description' => 'Keyboard gaming dengan switch mekanikal.',
                'price' => 2000000,
                'stock' => 25,
                'image_url' => 'https://images.tokopedia.net/img/cache/500-square/VqbcmM/2023/9/8/12fe9202-b5aa-4c7b-a94f-ef779cdf1533.png.webp?ect=4g',
            ],
            [
                'name' => 'Monitor LG Ultrawide',
                'short_description' => 'Monitor ultrawide dengan resolusi tinggi.',
                'price' => 5000000,
                'stock' => 10,
                'image_url' => 'https://images.unsplash.com/photo-1587829741301-dc798b83add3?auto=format&fit=crop&w=400&h=300&q=80',
            ],
            [
                'name' => 'Mouse Logitech G502',
                'short_description' => 'Mouse gaming dengan sensor presisi tinggi.',
                'price' => 1200000,
                'stock' => 30,
                'image_url' => 'https://down-id.img.susercontent.com/file/f7b05fbc64068da660721c2283f1a75b.webp',
            ],
            [
                'name' => 'Tablet iPad Pro',
                'short_description' => 'Tablet premium dengan layar Liquid Retina.',
                'price' => 18000000,
                'stock' => 7,
                'image_url' => 'https://down-id.img.susercontent.com/file/id-11134207-7rask-m47gd8ib3zcqb1.webp',
            ],
            [
                'name' => 'Drone DJI Mavic Air 2',
                'short_description' => 'Drone dengan kamera 4K dan sensor canggih.',
                'price' => 12000000,
                'stock' => 6,
                'image_url' => 'https://down-id.img.susercontent.com/file/id-11134207-7rasb-m4x2kbp49jie5b@resize_w900_nl.webp',
            ],
            [
                'name' => 'Speaker JBL Flip 5',
                'short_description' => 'Speaker portable dengan suara menggelegar.',
                'price' => 1800000,
                'stock' => 12,
                'image_url' => 'https://down-id.img.susercontent.com/file/id-11134201-7rasf-m23y7fj5pat94f@resize_w900_nl.webp',
            ],
            [
                'name' => 'Power Bank Anker 20000mAh',
                'short_description' => 'Power bank berkapasitas besar dan pengisian cepat.',
                'price' => 500000,
                'stock' => 40,
                'image_url' => 'https://down-id.img.susercontent.com/file/sg-11134201-22110-bffehhxtgakvc2@resize_w900_nl.webp',
            ],
            [
                'name' => 'Microphone Rode NT1-A',
                'short_description' => 'Microphone kondensor untuk rekaman profesional.',
                'price' => 3500000,
                'stock' => 9,
                'image_url' => 'https://down-id.img.susercontent.com/file/id-11134207-7r98t-lqgcw27dbjqq75@resize_w900_nl.webp',
            ],
            [
                'name' => 'Printer Epson EcoTank L3150',
                'short_description' => 'Printer hemat tinta dengan teknologi terbaru.',
                'price' => 3000000,
                'stock' => 15,
                'image_url' => 'https://down-id.img.susercontent.com/file/928b53061753a02a78c19d0a68d23728@resize_w900_nl.webp',
            ],
            [
                'name' => 'SSD Samsung 1TB NVMe',
                'short_description' => 'SSD berkecepatan tinggi untuk penyimpanan data.',
                'price' => 2000000,
                'stock' => 20,
                'image_url' => 'https://down-id.img.susercontent.com/file/id-11134207-7r98p-lt3k6mymolmlf9@resize_w900_nl.webp',
            ],
            [
                'name' => 'Router TP-Link Archer AX50',
                'short_description' => 'Router WiFi 6 dengan kecepatan tinggi.',
                'price' => 1800000,
                'stock' => 18,
                'image_url' => 'https://down-id.img.susercontent.com/file/sg-11134201-7rcdu-lt0n2oj9pir3ad@resize_w900_nl.webp',
            ],
            [
                'name' => 'VR Headset Oculus Quest 2',
                'short_description' => 'Headset VR standalone dengan resolusi tinggi.',
                'price' => 6000000,
                'stock' => 10,
                'image_url' => 'https://down-id.img.susercontent.com/file/id-11134201-7ras9-m58n7fo4n31275@resize_w900_nl.webp',
            ],
        ];
        
        foreach ($products as &$product) {
            $product['seller_id'] = $seller->id;
            $product['created_at'] = now();
            $product['updated_at'] = now();
        }
        
        // Simpan ke database
        DB::table('products')->insert($products);        
    }
}