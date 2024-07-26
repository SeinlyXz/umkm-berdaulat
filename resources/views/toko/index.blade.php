@extends("layouts.app")
@section("title","Toko Anda")
@section("profile")
    <section class="w-full bg-[#FACF00] py-7">
        <div class="md:px-32 px-10 py-5 flex justify-between">
            <div class="flex gap-x-5">
                <div class="w-32 rounded-full">
                    <img src="/storage/toko_assets/{{$toko->banner_image}}" alt="" class="object-cover rounded-full w-32 h-32">
                </div>
                <div class="py-2 flex flex-col my-auto gap-y-5">
                    <div class="flex items-center gap-x-2">
                        <h1 class="text-[#476A80] text-3xl font-bold">{{$toko->name}}</h1>
                        <a href="{{route('toko.edit', $toko->id)}}" class="text-[#476A80] text-xl font-bold">
                            <svg class="w-6 h-6 text-[#476A80]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28"/>
                            </svg>
                        </a>
                    </div>
                    <p class="text-lg line-clamp-1">
                        {{$toko->description}}
                    </p>
                </div>
            </div>
            <div class="hidden bg-[#476A80] w-96 h-28 rounded-xl md:flex justify-between my-auto items-center px-16">
                <p class="text-white">Rating Toko: {{$toko->rating == 0 ? "-" : $toko->rating}}</p>
                <div class="h-28 border border-white"></div>
                <p class="text-white">Rating</p>
            </div>
        </div>
    </section>
@endsection
@section("content")
    <x-toko-menu />
    <div class="pb-10">
        @if($products->count() > 0)
            <div class="grid md:grid-cols-5 grid-cols-2 md:gap-5 gap-3">
                @foreach($products as $product)
                    <x-product-card :toko="$product->toko" :name="$product->nama" :harga="$product->harga" :rating="$product->rating" :productid="$product->id" :gambar="$product->gambar"/>
                @endforeach
                <a href="{{route('product.create')}}" class="bg-slate-500 hover:bg-slate-700 text-white font-semibold rounded-xl w-12 h-12 my-auto text-xl flex justify-center items-center">
                    +
                </a>
            </div>
        @else
            <div class="flex justify-center items-center pt-10">
                <a href="{{route('product.create')}}" class=" bg-slate-500 hover:bg-slate-700 text-white font-semibold py-2 px-4 rounded-xl">
                    Upload produk pertama Anda
                </a>
            </div>
        @endif
    </div>
@endsection