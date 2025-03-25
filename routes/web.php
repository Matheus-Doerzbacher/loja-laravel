<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardController;
Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::get('/vitrine', [ProductController::class, 'vitrine'])->name('products.vitrine');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::get('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

    Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');

    Route::get('/dashboard2', [DashboardController::class, 'index'])->name('dashboard.index');
    // TODOs: Excluir Rota dashboard.clientes e a funcao que ela chama
    Route::get('/dashboard/clientes', [DashboardController::class, 'clientes'])->name('dashboard.clientes');
    // TODOs: Excluir Rota dashboard.estoque e a funcao que ela chama
    Route::get('/dashboard/estoque', [DashboardController::class, 'estoque'])->name('dashboard.estoque');
    Route::get('/dashboard/vendas', [DashboardController::class, 'vendas'])->name('dashboard.vendas');
    Route::get('/dashboard/relatorios', [DashboardController::class, 'relatorios'])->name('dashboard.relatorios');
});



// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
