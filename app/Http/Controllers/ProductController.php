<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // Fitur Pencarian Web (Wajib di soal)
        if ($request->has('search')) {
            $search = $request->search;
            $query->where('kode_produk', 'like', "%{$search}%")
                  ->orWhere('nama_produk', 'like', "%{$search}%");
        }

        $products = $query->latest()->get();
        return view('products.index', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_produk' => 'required|unique:products',
            'nama_produk' => 'required',
            'satuan' => 'required',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|integer|min:0'
        ]);

        Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Produk ditambahkan!');
    }
}
