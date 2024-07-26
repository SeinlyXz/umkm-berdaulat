@use("\Illuminate\Support\Number")
@php
    $current_url = request()->path();
@endphp
@if ($current_url == 'toko')
    <a href="/product/edit/{{$productid}}" class="group">
        <section class="border border-gray-300 rounded-lg md:w-[14rem] group-hover:shadow-xl ease-in-out duration-500 group-hover:-translate-y-2 relative">
            <img src="/storage/product_images/{{ $gambar }} " alt="product" class="w-full md:h-52 object-cover rounded-t-lg bg-gray-100" loading="lazy">
            <div class="flex flex-col justify-between px-3 pt-4 md:pb-0 pb-3 md:h-42">
                <h1 class="md:text-xl text-[#9D7600] line-clamp-1">{{$name}}</h1>
                <div class="py-2">
                    <p class="md:text-sm text-xs text-[#9D7600] line-through">IDR 100,000.00</p>
                    <p class="md:text-xl text-sm text-gray-500 font-semibold">{{Number::currency($harga, "IDR")}}</p>
                </div>
                <span>
                    {{$toko}}
                </span>
                {{-- <p class="text-sm text-gray-500 md:line-clamp-3 line-clamp-2 italic">{{isset($deskripsi) ? $deskripsi : "Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, rem laborum architecto excepturi"}}</p>  --}}
                <section class="flex md:justify-between flex-col md:flex-row pb-3">
                    <p class="my-auto text-sm">
                        <span class="{{$rating > 0 ? 'text-[#9D7600]' : 'text-gray-500'}} md:text-base text-xs">
                            {{$rating}} 
                        </span>
                        <span class="text-[#9D7600] md:text-base text-xs">
                            Stars Rating
                        </span>
                    </p>
                </section>
            </div>
        </section>
    </a>
@else
    <a href="/product/{{$productid}}" class="group">
        <section class="border border-gray-300 rounded-lg md:w-[14rem] group-hover:shadow-xl ease-in-out duration-500 group-hover:-translate-y-2 relative">
            <img src="/storage/product_images/{{ $gambar }} " alt="product" class="w-full md:h-52 object-cover rounded-t-lg bg-gray-100">
            <div class="flex flex-col justify-between px-3 pt-4 md:pb-0 pb-3 md:h-42">
                <h1 class="md:text-xl text-[#9D7600] line-clamp-1">{{$name}}</h1>
                <div class="py-2">
                    <p class="md:text-sm text-xs text-[#9D7600] line-through">IDR 100,000.00</p>
                    <p class="md:text-xl text-sm text-gray-500 font-semibold">{{Number::currency($harga, "IDR")}}</p>
                </div>
                <span>
                    {{$toko}}
                </span>
                {{-- <p class="text-sm text-gray-500 md:line-clamp-3 line-clamp-2 italic">{{isset($deskripsi) ? $deskripsi : "Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, rem laborum architecto excepturi"}}</p>  --}}
                <section class="flex md:justify-between flex-col md:flex-row pb-3">
                    <p class="my-auto text-sm">
                        <span class="{{$rating > 0 ? 'text-[#9D7600]' : 'text-gray-500'}} md:text-base text-xs">
                            {{$rating}} 
                        </span>
                        <span class="text-[#9D7600] md:text-base text-xs">
                            Stars Rating
                        </span>
                    </p>
                </section>
            </div>
        </section>
    </a>
@endif