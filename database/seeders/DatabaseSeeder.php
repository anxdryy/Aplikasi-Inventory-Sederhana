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
    }
}
