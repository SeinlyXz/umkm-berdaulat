@extends('layouts.app')
@section('title', 'Product')
@section('content')
    <div class="py-10 flex flex-col gap-y-5">
        <p class="text-[#C58940] font-bold text-2xl">Semua Product</p>
        <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
            @foreach ($products as $product)
            <x-product-card :toko="$product->toko" :name="$product->nama" :harga="$product->harga" :rating="$product->rating" :productid="$product->id" :gambar="$product->gambar"/>
            @endforeach
        </div>
    </div>
@endsection