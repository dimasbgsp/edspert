<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/test', function(){
//     return "Hello World!";
// });

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function(){
        Route::get('/products', [ProductController::class, 'index'])->name('products');
// sintaks disana melempar ke halaman products, dengan isi dari ProductControllernya dengan function index dengan memberi
// tanda pengenal/name yaitu products 
Route::post('/products', [ProductController::class, 'create'])->name('products-create');
// sintaks post untuk menstore/menyimpan data data
// diikuti ProductController, dengan variable/class create, dan diberi pengenal sebagai products-create 
Route::delete('/products/delete', [ProductController::class, 'delete'])->name('products-delete');
// untuk membuat delete buat routenya dulu, viewnya (products.blade), 
Route::get('/products/{id}/edit', [ProductController::class, 'show'])->name('products-edit');
// untuk membuat edit buat routenya dulu, controllernya dengan function show
Route::put('/products/{id}/update', [ProductController::class, 'update'])->name('products-update');
Route::get('/orders', [OrderController::class, 'index'])->name('orders');
Route::post('/orders', [OrderController::class, 'create'])->name(('orders-create'));
});
