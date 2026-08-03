<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();
        if ($request->has('search')) {
            $search = $request->search;
            $query->where('kode_produk', 'like', "%{$search}%")
                  ->orWhere('nama_produk', 'like', "%{$search}%");
        }
        return response()->json(['success' => true, 'message' => 'List Produk', 'data' => $query->get()]);
    }

    public function store(Request $request)
    {
        $request->validate(['kode_produk' => 'required|unique:products', 'nama_produk' => 'required', 'satuan' => 'required', 'stok' => 'required|integer', 'harga' => 'required|integer']);
        $product = Product::create($request->all());
        return response()->json(['success' => true, 'message' => 'Produk ditambah', 'data' => $product], 201);
    }
}
