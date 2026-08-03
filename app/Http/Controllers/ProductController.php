<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('kode_produk', 'like', "%{$search}%")
                  ->orWhere('nama_produk', 'like', "%{$search}%");
        }

        $products = $query->latest()->get();
        $lowStocks = Product::where('stok', '<=', 10)->get();

        return view('products.index', compact('products', 'lowStocks'));
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

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'kode_produk' => 'required|unique:products,kode_produk,' . $product->id,
            'nama_produk' => 'required',
            'satuan' => 'required',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|integer|min:0'
        ]);

        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Produk berhasil diupdate!');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus!');
    }

    public function history(Product $product)
    {
        $transactions = $product->transactions()->latest()->get();
        return view('products.history', compact('product', 'transactions'));
    }
}
