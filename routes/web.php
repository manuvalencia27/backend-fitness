<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\InvoiceController;
use App\Http\Controllers\Backend\CommentController;
use App\Http\Controllers\Backend\TagController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Rutas predeterminadas laravel auth */
Auth::routes();

/* Raiz del proyecto */
Route::get('/', [\App\Http\Controllers\ProductController::class, 'index'])->name('home');

/* Rutas para productos */
Route::prefix('products')->group(function() {
    Route::get('/', [\App\Http\Controllers\ProductController::class, 'shop'])->name('shop');
    Route::get('{product}', [\App\Http\Controllers\ProductController::class, 'show']);
});

Route::prefix('categories')->group(function() {
    Route::get('{category}', [\App\Http\Controllers\CategoryController::class, 'show']);
});

Route::get('cart', [\App\Http\Controllers\CartController::class, 'index']);
Route::get('checkout', [\App\Http\Controllers\CartController::class, 'checkout']);

/* Rutas para el crud Admin*/
Route::prefix('admin')->group(function () {

    Route::middleware(['role-admin'])->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    
        Route::resource('users', UserController::class);
    
        Route::resource('categories', CategoryController::class);
    
        Route::resource('products', ProductController::class);
        
        Route::resource('invoices', InvoiceController::class);
    
        Route::resource('comments', CommentController::class);
    
        Route::resource('tags', TagController::class);
    });

});