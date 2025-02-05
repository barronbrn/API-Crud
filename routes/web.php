<?php

use App\Http\Controllers\API\PeralatanController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;


// Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
// Route::get('/', [ProdukController::class, 'index'])->name('index.index');
// Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
// Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
// Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
// Route::put('/produk/{id}', [ProdukController::class, 'update'])->name('produk.update');
// Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');

Route::get('/', [ProdukController::class, 'index'])->name('index.index');
Route::resource('produk', ProdukController::class);
