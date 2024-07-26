@extends("layouts.app")
@section("title","Toko Anda")
@section("profile")
    <section class="w-full bg-[#FACF00] py-7">
        <div class="md:px-32 px-10 py-5 flex justify-between">
            <div class="flex gap-x-5">
                <div class="w-32 rounded-full">
                    <img src="/storage/toko_assets/{{$toko->banner_image}}" alt="" class="object-cover rounded-full w-32 h-32">
                </div>
                <div class="py-2 flex flex-col justify-between">
                    <h1 class="text-[#476A80] text-3xl font-bold">{{$toko->name}}</h1>
                    <p class="text-lg">
                        {{$toko->description}}
                    </p>
                    <div class="flex gap-x-4">
                        <button class="bg-white px-3 py-1 rounded-xl w-24">Ikut</button>
                        <button class="bg-[#090b0c] px-3 py-1 rounded-xl text-white w-24">Chat</button>
                    </div>
                </div>
            </div>
            <div class="hidden bg-[#476A80] w-96 h-28 rounded-xl md:flex justify-between my-auto items-center px-16">
                <p class="text-white">Rating</p>
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
                <x-product-card :gambar="$product->gambar" :toko="$product->toko" :name="$product->nama" :harga="$product->harga" :rating="$product->rating" :productid="$product->id"/>
                @endforeach
            </div>
        @endif
    </div>
@endsection