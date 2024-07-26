@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <div class="pt-5 pb-10 flex flex-col gap-y-5">
        <x-home-carousel />
        <x-home-category />
        <h1 class="text-3xl font-semibold">
            Produk Terbaru
        </h1>
        <div class="grid md:grid-cols-5 grid-cols-2 gap-4">
          @foreach($products as $product) 
            <x-product-card :toko="$product->toko" :name="$product->nama" :harga="$product->harga" :rating="$product->rating" :productid="$product->id" :gambar="$product->gambar" />
          @endforeach
        </div>
    </div>
@endsection
