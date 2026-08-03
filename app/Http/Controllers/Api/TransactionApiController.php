<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\{Product, Transaction};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionApiController extends Controller
{
    public function store(Request $request)
    {
        $request->validate(['product_id' => 'required|exists:products,id', 'jenis' => 'required|in:masuk,keluar', 'jumlah' => 'required|integer|min:1', 'tanggal' => 'required|date']);

        DB::beginTransaction();
        try {
            $product = Product::lockForUpdate()->findOrFail($request->product_id);
            if ($request->jenis == 'keluar' && $product->stok < $request->jumlah) {
                DB::rollBack();
                return response()->json(['success' => false, 'message' => 'Stok tidak cukup! Sisa stok: ' . $product->stok], 400);
            }
            $product->stok = $request->jenis == 'masuk' ? $product->stok + $request->jumlah : $product->stok - $request->jumlah;
            $product->save();
            $transaction = Transaction::create($request->all());
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Transaksi berhasil', 'data' => $transaction], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()], 500);
        }
    }
}
