<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Product::create([
            'kode_produk' => 'PRD-001',
            'nama_produk' => 'Kaos Kaki Hitam Polos',
            'satuan' => 'Lusin',
            'stok' => 50,
            'harga' => 120000,
        ]);

        Product::create([
            'kode_produk' => 'PRD-002',
            'nama_produk' => 'Kaos Kaki Sekolah Putih',
            'satuan' => 'Lusin',
            'stok' => 100,
            'harga' => 100000,
        ]);

        Product::create([
            'kode_produk' => 'PRD-003',
            'nama_produk' => 'Kaos Kaki Sport Pendek',
            'satuan' => 'Pcs',
            'stok' => 20,
            'harga' => 15000,
        ]);
    }
}
