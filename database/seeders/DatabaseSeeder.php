<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;


    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Staff',
            'email' => 'staff@example.com',
            'password' => Hash::make('password'),
            'role' => 'staff'
        ]);

        $items = [
            [
                'kode_barang' => 'BRG001',
                'nama_barang' => 'Laptop',
                'kategori' => 'Elektronik',
                'stok' => 10,
                'kondisi' => 'baik'
            ],
            [
                'kode_barang' => 'BRG002',
                'nama_barang' => 'Proyektor',
                'kategori' => 'Elektronik',
                'stok' => 5,
                'kondisi' => 'baik'
            ],
            [
                'kode_barang' => 'BRG003',
                'nama_barang' => 'Meja',
                'kategori' => 'Furniture',
                'stok' => 20,
                'kondisi' => 'baik'
            ],
        ];

        foreach ($items as $item) {
            Item::create($item);
        }
    }
}
