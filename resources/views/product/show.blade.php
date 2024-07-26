@use("\Illuminate\Support\Number")
@extends("layouts.app")
@section("title", $product->nama)

@section("content")
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row gap-8 justify-between">
        <!-- Image Gallery -->
        <div class="w-full md:w-1/3">
            <div class="relative border border-gray-200 rounded-xl p-4">
                <img src="/storage/product_images/{{$product->gambar}}" alt="{{$product->nama}}" class="object-cover w-full h-72 rounded-xl">
                <button class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-white p-2 rounded-full shadow-md">
                    <svg class="h-6 w-6 rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7" />
                    </svg>
                </button>
                <button class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-white p-2 rounded-full shadow-md">
                    <svg class="h-6 w-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7" />
                    </svg>
                </button>
            </div>
        </div>
        <!-- Product Details -->
        <div class="w-full md:w-1/3 space-y-4 flex flex-col justify-between">
            <h1 class="text-4xl font-semibold">{{$product->nama}}</h1>
            <a href="{{url("toko/".$product->toko->id)}}" class="text-yellow-400 mr-1">{{$product->toko->name}}</a>
            <div class="flex items-center">
                <span class="text-yellow-400 mr-1">★</span>
                <span>{{$product->rating}}</span>
            </div>
            <h2 class="text-xl font-semibold mb-4">Product Description</h2>
            <p class="text-gray-600">
                Add your product description here. Highlight key features and benefits to help customers make an informed decision.
            </p>
        </div>
        <!-- Additional Info and Actions -->
        <div class="w-full md:w-1/3">
            <div class="border border-gray-200 rounded-xl p-4 h-full space-y-4 flex flex-col justify-between">
                <p class="text-2xl font-bold text-gray-700">{{Number::currency($product->harga, "IDR")}}</p>
                <p class="{{$product->qty < 10 ? 'text-red-600' : 'text-green-600'}}">
                    @if($product->qty < 10)
                        Buruan, stok tersisa: {{$product->qty}}
                    @else
                        <span class="text-green-600">
                            Stok: {{$product->qty}}
                        </span>
                    @endif
                </p>
                <div class="flex flex-col">
                    <form action="{{route('keranjang.store')}}" method="POST" id="keranjang">
                        @method('POST')
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <button type="submit" form="keranjang" id="addToCart" class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300">
                            Add to Cart
                        </button>
                        @if(session()->has('success'))
                            <span class="text-green-500">Berhasil ditambahkan ke keranjang</span>
                        @endif
                    </form>
                    <form action="">
                        @method('POST')
                        @csrf
                        <button id="buyNow" class="w-full bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 transition duration-300">
                            Buy Now
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<script>
    $(document).ready(function() {
        const quantityInput = $('#quantity');
        const decreaseBtn = $('#decrease');
        const increaseBtn = $('#increase');
        const addToCartBtn = $('#addToCart');
        const buyNowBtn = $('#buyNow');

        decreaseBtn.click(function() {
            let value = parseInt(quantityInput.val());
            if (value > 1) {
                quantityInput.val(value - 1);
            }
        });

        increaseBtn.click(function() {
            let value = parseInt(quantityInput.val());
            quantityInput.val(value + 1);
        });

        quantityInput.on('input', function() {
            let value = parseInt($(this).val());
            if (isNaN(value) || value < 1) {
                $(this).val(1);
            }
        });

        addToCartBtn.click(function() {
            const quantity = quantityInput.val();
            // Add your "Add to Cart" logic here
            alert(`Added ${quantity} item(s) to cart`);
        });

        buyNowBtn.click(function() {
            const quantity = quantityInput.val();
            // Add your "Buy Now" logic here
            alert(`Buying ${quantity} item(s) now`);
        });
    });
</script>