<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    // sintaks diatas bertujuan untuk ketika kehalaman product harus login terlebih dahulu
    // dikoment di karenakan digrouping pada routesnya 

    public function index(){
        $products = Product::get();

        return view('pages.product.products', ['products' => $products]);
        // bisa juga ditulis seperti ini
        // return view('products', compact['products']);
    }
    // $products = Product::get > merupakan data apa saja yang akan diambil/distore dari model Product
    // return view untuk selanjutnya menampilkan halaman products.blade.php
    // sintaks diatas dari data backend ke data frontend
    // ['products' => $products], products didepan merupakan key
    // dimana products tersebut menyambung di foreach product.blade.php $product

    public function create(Request $request){
        // $validator = Validator::make($request->all(), 
        $request -> validate(
        [
            'name' => ['required', 'string', 'max:25'],
            'details' => ['required', 'string'],
            'stock' => ['required', 'integer'],
            'price' => ['required', 'integer']
        ]);
        // sintaks diatas untuk memvalidasi bahwa form tidak boleh kosong, dengan required, 
        // datanya integer atau string dan lengthnya
        // data dari array berasal dari modelnya MVC
        // sintaks diatas merupakan panggilan dari route dengan class create
        // dimana berisi array sesuai yang diinginkan


        // $input = $validator-> validate();

        Product::create([
            'name' => $request->input('name'),
            'details' => $request->input('details'),
            'stock' => $request->input('stock'),
            'price' => $request->input('price')
        ]);
        // sintaks diatas dari inputan ke data backend
        // return redirect()->route('products');
        // sintaks diatas setelah dilakukan submit akan diarahkan kembali ke halaman products
        return redirect()
        ->back()
        ->with('success', 'Data Produk Berhasil Disimpan');
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => ['required', 'exists:products,id']
        ]);
        // exists untuk mengetahui products,id
        // exists:(nama tablenya apa),(column)
        
        $product = Product::find($request->input('id'));
        $product->delete();
        
        return redirect()
                ->back()
                ->with('success', 'Data produk berhasil dihapus');
                // return redirect berarti dia mengembalikan ke halaman, dengan back() berarti halaman sebelumnya
                // dengan menampilkan data di session success, dan valuenya data produk berhasil dihapus 
    }

    public function show($id)
    {
        $product = Product::find($id);

        return view('pages.product.products-edit', ['product' => $product]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:25'],
            'details' => ['required', 'string'],
            'stock' => ['required', 'integer'],
            'price' => ['required', 'integer']
        ]);
        // sintaks diatas untuk update
        
        $product = Product::find($id);
        // sintak diatas untuk mencari id tsb
        
        $product->update([
            'name' => $request->input('name'),
            'details' => $request->input('details'),
            'stock' => $request->input('stock'),
            'price' => $request->input('price')
        ]);

        return redirect()
                ->route('products')
                ->with('success', 'Data dengan id ' . $id . ' produk berhasil update');
    }
}
