<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{ProductApiController, TransactionApiController};

Route::get('/produk', [ProductApiController::class, 'index']);
Route::post('/produk', [ProductApiController::class, 'store']);
Route::post('/transaksi', [TransactionApiController::class, 'store']);
