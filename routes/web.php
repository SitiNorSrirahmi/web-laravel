<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('landing', [
        'produkTerbaru' => Product::latest()->take(4)->get(),
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard', [
        'totalProduk' => Product::count(),
        'totalOrder' => Order::count(),
        'stokMenipis' => Product::where('stok', '<', 10)->count(),
        'totalPendapatan' => OrderItem::sum(DB::raw('qty * harga_satuan')),
        'orderPending' => Order::where('status', 'pending')->count(),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('products', ProductController::class)->except(['destroy']);

    Route::delete('/products/{product}', [ProductController::class, 'destroy'])
        ->middleware('role:admin')
        ->name('products.destroy');

    Route::resource('orders', OrderController::class)->only(['index', 'create', 'store', 'show']);
});


require __DIR__.'/auth.php';
