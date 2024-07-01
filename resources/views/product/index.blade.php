@extends('layouts.guest')

@section('content')
    <!-- Navbar -->
    <div class="flex justify-center">
        <header class="bg-[#476A80] drop-shadow-sm relative flex justify-between mx-auto p-2 w-full">
            <a href="{{ url()->current() }}">
                <img src="{{ asset('assets/Logo.png') }}" alt="Logo" class="w-9 h-9 m-2">
            </a>
                <form class="relative flex justify-center">
                <img 
                    src="{{ asset('assets/Vector.svg') }}" 
                    alt="Logo"
                    class="absolute left-3 top-3 w-5 h-5"
                    >
                <input
                    type="search"
                    placeholder="Search"
                    class="h-10 input input-bordered w-full max-w-xs px-4 text-center rounded-3xl text-base text-white bg-neutral-300 border-none"
                />
            </form>
            <img src="{{ asset('assets/Logo.png') }}" alt="Logo" class="w-10 h-10 invisible">
        </header>
    </div>

    <div class="splide">
        <div class="splide__track">
            <ul class="splide__list">
                <li class="splide__slide">Slide 1</li>
                <li class="splide__slide">Slide 2</li>
                <li class="splide__slide">Slide 3</li>
            </ul>
        </div>
    </div>
    

    <!-- Kategori Produk -->
    <div class="flex justify-center items-center">
        <div class="bg-[#FACF00] w-72 rounded-2xl ">
            <div class="m-8 py-20">
                <h1 class="font-bold text-4xl">KATEGORI PRODUCT</h1>
                <h3 class="pt-5 text-base text-[#476A80]">UMKM BERDAULAT</h3>
                <h5 class="pt-5 text-base">Lihat Semua</h5>
            </div>
        </div>
        <div class="flex justify-center items-center">
            <div>
                <img src="{{ asset('assets/KerajinanTangan.png') }}" alt="">
            </div>
            <div>
                <img src="{{ asset('assets/Fashion.png') }}" alt="">
            </div>
            <div>
                <img src="{{ asset('assets/Aksesoris.png') }}" alt="">
            </div>
            <div>
                <img src="{{ asset('assets/Perabotan.png') }}" alt="">
            </div>
        </div>
    </div>
    

    <
    </div>
    <!-- Product Recommendation-->
    <div class="container p-5">
        <p class="text-[#C58940] ms-12 font-bold text-2xl">Rekomendasi untuk Anda</p>
        <div class="p-10">
            <div class="grid grid-cols-4 gap-5 justify-between">
                @foreach ($products as $product)
                <div class="relative rounded-xl overflow-hidden">
                    <img src="Rectangle 17.png" alt="" class="object-cover w-64 h-96">
                    <!-- Overlay -->
                    <div class="absolute inset-0 rounded-xl overflow-hidden bg-gradient-to-t from-10% from-[#C58940]/100"></div>
                    <!-- Diskon -->
                    <h2 class="absolute bg-[#C58940] rounded-3xl top-3 right-3 text-white text-2xl w-20 h-10 flex items-center justify-center font-bold text-center">20%</h2>
                    <!-- Harga -->
                    <h2 class="absolute bottom-32 left-4 text-white text-3xl ps-2 font-sans">Rp. {{$product->harga}}</h2>
                    <!-- Nama -->
                    <h2 class="absolute bottom-24 left-4 text-white text-xl ps-2 font-bold">{{$product->nama}}</h2>
                    {{-- Kategori --}}
                    <h2 class="absolute bottom-20 left-4 text-white text-xl ps-2 font-bold">{{$product->categories->nama}}</h2>
                    <!-- Bintang -->
                    @for ($i = 0; $i < $product->rating; $i++)
                    <img src={{url('bintang.png')}} alt="" class="absolute bottom-10 left-6 w-3">
                        
                    @endfor
                    {{-- <img src="./Stars/Star-1.png" alt="" class="absolute bottom-10 left-10 w-3">
                    <img src="./Stars/Star-1.png" alt="" class="absolute bottom-10 left-12 ms-2 w-3">
                    <img src="./Stars/Star-1.png" alt="" class="absolute bottom-10 left-16 ms-2 w-3">
                    <img src="./Stars/Star.png" alt="" class="absolute bottom-10 left-20 ms-2 w-3"> --}}
                    <p class="absolute bottom-9 mb-0.5 left-24 ms-2.5 font-sans text-xs text-white">4.3 Ribu Terjual</p>
                    <img src="location.png" alt="" class="absolute bottom-3.5 left-24 ms-4 w-2.5">
                    <p class="absolute bottom-3 left-28 ms-4 font-sans text-xs text-white pt-9 font-bold">Toko Merah Gejayan</p>
                </div>
                @endforeach
                
            </div>
        </div>
        <div class="p-10">
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
                    <img src="./Stars/Star-1.png" alt="" class="absolute bottom-10 left-6 w-3">
                    <img src="./Stars/Star-1.png" alt="" class="absolute bottom-10 left-10 w-3">
                    <img src="./Stars/Star-1.png" alt="" class="absolute bottom-10 left-12 ms-2 w-3">
                    <img src="./Stars/Star-1.png" alt="" class="absolute bottom-10 left-16 ms-2 w-3">
                    <img src="./Stars/Star.png" alt="" class="absolute bottom-10 left-20 ms-2 w-3">
                    <p class="absolute bottom-9 mb-0.5 left-24 ms-2.5 font-sans text-xs text-white">4.3 Ribu Terjual</p>
                    <img src="location.png" alt="" class="absolute bottom-3.5 left-24 ms-4 w-2.5">
                    <p class="absolute bottom-3 left-28 ms-4 font-sans text-xs text-white pt-9 font-bold">Toko Merah Gejayan</p>
                </div>
                
            </div>
        </div>
    </div>
    

@endsection