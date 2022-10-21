@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Create Products') }}</div>
                
                <div class="card-body">
                    @if (Session::has('success'))
                    <div class="alert alert-info">{{ Session::get('success') }}</div>
                    @endif 
                    {{-- sintaks diatas bertujuan memberi tahukan kalau session success keluar notif berhasil 
                        sintaks ini ngelink di ProductController--}}

                    <form action="{{ route('products-create') }}" method="post">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="products-name" type="text" class="form-control" name="name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                {{-- sintaks diatas akan keluar alert error  --}}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Details') }}</label>

                            <div class="col-md-6">
                                <input id="products-details" type="text" class="form-control" name="details">

                                @error('details')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Stock') }}</label>

                            <div class="col-md-6">
                                <input id="products-stock" type="number" class="form-control" name="stock">

                                @error('stock')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Price') }}</label>

                            <div class="col-md-6">
                                <input id="products-price" type="number" class="form-control" name="price">

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary btn-md col-md-3">Simpan</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Table Products') }}</div>
                
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Details</th>
                                <th>Stock</th>
                                <th>Price</th>
                                <th>Option</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->details }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>{{ $product->price }}</td>
                                <td>
                                    <a href="{{ route('products-edit', ['id' => $product->id]) }}" class="btn btn-sm btn-success">Edit</a>
                                    {{-- <button class="btn btn-success btn-md">Edit</button> --}}
                                    <form action="{{route('products-delete')}}" method="POST">
                                        @csrf
                                        @method('DELETE') 
                                        {{-- method delete berguna untuk menghapus data, dimana method hanya terdapat
                                            get dan post --}}
                                        
                                        <input type="text" name="id" value="{{ $product->id }}" hidden>
                                        {{-- mengeluarkan input type id, hidden menyembunyikan input --}}
                                        <button type="submit" class="btn btn-danger btn-md">Delete</button>
                                    </form>
                                    {{-- action = route('products-delete'), berasal dari route namenya product delete
                                    dengan menggunakan method post untuk menstore data --}}
                                </td>
                            </tr>
                            @endforeach
                            {{-- pengulangan foreach untuk mengeluarkan hasil data dari store data --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection