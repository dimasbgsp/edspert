@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Create Order') }}</div>

                <div class="card-body">
                    @if (Session::has('success'))
                    <div class="alert alert-info">{{ Session::get('success') }}</div>
                    @endif 
                    {{-- sintaks diatas bertujuan memberi tahukan kalau session success keluar notif berhasil 
                        sintaks ini ngelink di ProductController--}}

                    <form action="{{ route('orders-create') }}" method="post">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Product') }}</label>

                            <div class="col-md-6">
                                <select class="form-select" name="product_id">
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                {{-- sintaks diatas akan keluar alert error  --}}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Total') }}</label>

                            <div class="col-md-6">
                                <input type="number" name="total" id="" class="form-control @error('total') is-invalid @enderror">

                                @error('total')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                {{-- sintaks diatas akan keluar alert error  --}}
                            </div>
                        </div>

                            <div class="row justify-content-center">
                                <button type="submit" class="btn btn-primary btn-md col-md-3">Simpan</button>
    
                            </div>
                    </form>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                {{-- <th>Product</th> --}}
                                <th>Total</th>
                                <th>Status</th>
                                <th>Created Date</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->user->email }}</td>
                                {{-- <td>{{ $order->product->name }}</td> --}}
                                <td>{{ $order->total }}</td>
                                <td>{{ $order->status }}</td>
                                <td>{{ $order->created_at }}</td>
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