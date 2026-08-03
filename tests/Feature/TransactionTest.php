<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TransactionTest extends TestCase
{
    use RefreshDatabase;
    public function test_transaksi_keluar_ditolak_jika_stok_minus()
    {
        $product = Product::create([
            'kode_produk' => 'TST-01',
            'nama_produk' => 'Baju Test',
            'satuan' => 'Pcs',
            'stok' => 10,
            'harga' => 50000,
        ]);

        $response = $this->postJson('/api/transaksi', [
            'product_id' => $product->id,
            'jenis' => 'keluar',
            'jumlah' => 15,
            'tanggal' => date('Y-m-d')
        ]);

        $response->assertStatus(400);
        $response->assertJson([
            'success' => false,
        ]);

        $this->assertEquals(10, $product->fresh()->stok);
    }
}
