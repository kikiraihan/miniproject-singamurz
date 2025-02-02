<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Buat roles
        $sellerRole = Role::create(['name' => 'seller']);
        $buyerRole = Role::create(['name' => 'buyer']);

        // Buat seller user
        $seller = User::create([
            'name' => 'Seller User',
            'shop_name'=> 'Toko Kelontong',
            'email' => 'seller@example.com',
            'password' => Hash::make('password'), // Password di-hash
        ]);
        $seller->assignRole('seller'); // Assign role seller

        // Buat buyer user
        $buyer1 = User::create([
            'name' => 'Buyer User 1',
            'email' => 'buyer1@example.com',
            'password' => Hash::make('buyer1@example.com'), // Password di-hash
        ]);
        $buyer1->assignRole('buyer'); // Assign role buyer

        $buyer2 = User::create([
            'name' => 'Buyer User 2',
            'email' => 'buyer2@example.com',
            'password' => Hash::make('password'), // Password di-hash
        ]);
        $buyer2->assignRole('buyer'); // Assign role buyer
      }
}
