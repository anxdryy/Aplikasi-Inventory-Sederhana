<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ProductController, TransactionController};

Route::get('/', fn() => redirect()->route('products.index'));
Route::resource('products', ProductController::class);
Route::resource('transactions', TransactionController::class)->only(['index', 'store']);
