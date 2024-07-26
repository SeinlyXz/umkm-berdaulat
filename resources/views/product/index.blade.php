@extends('layouts.app')
@section('title', 'Product')
@section('content')
    <!-- Middle Image -->
    {{-- <img src="pict1 1.png" alt="" class="p-5"> --}}
    <!-- Category Searching -->
    {{-- <div class="container p-5">
        <div class="custom-gradient p-10">
            <h2 class="mb-6 text-[#E5BA73] font-bold text-2xl ps-20">Pencarian Kategori</h2>
            <div class="flex gap-10 justify-center">
                <a href=""><img src="clarity_circle-arrow-solid.png" alt="" class="w-12 my-28"></a>
                <div class="relative rounded-xl overflow-hidden">
                    <img src="Rectangle 62.png" alt="" class="object-cover">
                    <div class="absolute inset-0 rounded-xl overflow-hidden bottom-0 bg-gradient-to-t from-10% from-black/60"></div>
                    <h2 class="absolute bottom-4 left-4 text-white text-xl mb-8 ms-12 ps-2 font-bold text-center">Kerajinan <br> Tangan</h2>
                </div>
                <div class="relative rounded-xl overflow-hidden">
                    <img src="Rectangle 63.png" alt="" class="object-cover">
                    <div class="absolute inset-0 rounded-xl overflow-hidden bottom-0 bg-gradient-to-t from-10% from-black/60"></div>
                    <h2 class="absolute bottom-4 left-4 text-white text-xl mb-10 ms-14 ps-2 font-bold">Fashion</h2>
                </div>
                <div class="relative rounded-xl overflow-hidden">
                    <img src="Rectangle 65.png" alt="" class="object-cover">
                    <div class="absolute inset-0 rounded-xl overflow-hidden bg-gradient-to-t from-10% from-black/60"></div>
                    <h2 class="absolute bottom-4 left-4 text-white text-xl mb-10 ms-12 ps-2 font-bold">Aksesoris</h2>
                </div>
                <div class="relative rounded-xl overflow-hidden">
                    <img src="Rectangle 66.png" alt="" class="object-cover">
                    <!-- Overlay -->
                    <div class="absolute inset-0 rounded-xl overflow-hidden bg-gradient-to-t from-10% from-black/60"></div>
                    <!-- Teks -->
                    <h2 class="absolute bottom-4 left-4 text-white text-xl mb-10 ms-12 ps-2 font-bold">Perabotan</h2>
                </div>
                <a href="" ><img src="clarity_circle-arrow-solid (1).png" alt="" class="w-12 my-28"></a>
            </div>
        </div>
    </div> --}}
    <!-- Product Recommendation-->
    <div class="py-10 flex flex-col gap-y-5">
        <p class="text-[#C58940] font-bold text-2xl">Rekomendasi untuk Anda</p>
        <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
            @foreach ($products as $product)
            <x-product-card :toko="$product->toko" :name="$product->nama" :harga="$product->harga" :rating="$product->rating" :productid="$product->id" :gambar="$product->gambar"/>
            @endforeach
        </div>
        {{-- <div class="p-10">
            <div class="flex gap-5 justify-between">
                <div class="relative rounded-xl overflow-hidden">
                    <img src="Rectangle 17.png" alt="" class="object-cover w-64 h-96">
                    <!-- Overlay -->
                    <div class="absolute inset-0 rounded-xl overflow-hidden bg-gradient-to-t from-10% from-[#C58940]/100"></div>
                    <!-- Diskon -->
                    <h2 class="absolute bg-[#C58940] rounded-3xl top-3 right-3 text-white text-2xl w-20 h-10 flex items-center justify-center font-bold text-center">20%</h2>
                    <!-- Harga -->
                    <h2 class="absolute bottom-32 left-4 text-white text-3xl ps-2 font-sans">Rp. 187.000</h2>
                    <!-- Deskripsi -->
                    <h2 class="absolute bottom-16 left-4 text-white text-xl ps-2 font-bold">Bath Soap Anti Aging <br> Miracle Serum</h2>
                    <!-- Bintang -->
                    <img src="{{url("bintang.png")}}" alt="" class="absolute bottom-10 left-6 w-3">
                    <img src="{{url("bintang.png")}}" alt="" class="absolute bottom-10 left-10 w-3">
                    <img src="{{url("bintang.png")}}" alt="" class="absolute bottom-10 left-12 ms-2 w-3">
                    <img src="{{url("bintang.png")}}" alt="" class="absolute bottom-10 left-16 ms-2 w-3">
                    <img src="{{url("bintang.png")}}" alt="" class="absolute bottom-10 left-20 ms-2 w-3">
                    <p class="absolute bottom-9 mb-0.5 left-24 ms-2.5 font-sans text-xs text-white">4.3 Ribu Terjual</p>
                    <img src="location.png" alt="" class="absolute bottom-3.5 left-24 ms-4 w-2.5">
                    <p class="absolute bottom-3 left-28 ms-4 font-sans text-xs text-white pt-9 font-bold">Toko Merah Gejayan</p>
                </div>
            </div>
        </div> --}}
    </div>
    

@endsection