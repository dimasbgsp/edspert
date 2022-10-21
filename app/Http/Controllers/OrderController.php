<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
// use app model order ada shortcut 
use App\Models\Product;

class OrderController extends Controller
{
    //
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    // auth middleware diatas dimana yang berfungsi untuk tidak boleh mengakses kehalaman order dsbnya
    // harus terlebih dahulu login, ini dikoment dikarenakan kita membuat middleware di routes dengan group
    // yang mana memiliki fungsi sama yaitu membuat ketika kita akses sesuatu tanpa login tidak bisa

    public function index(){
        $orders = Order::get();
        $products = Product::select('id','name')->get();
        // select berarti menampilkan atau mengambil id dan name saja dari model/db product
        // sintaks diatas berarti saya memiliki variable orders dengan datanya berasal dari model Order
        return view('pages.order.index', compact('orders', 'products'));
    }

    public function create(Request $request){
        // pakai request karena menerima data
        $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'total' => ['required', 'integer']
        ]);
        $user = $request->user();
        $user->orders()->create([
            'total' => $request->input('total'),
            'status' => Order::UNPAID
        ]);
        

        return redirect()->back();
    }

}
