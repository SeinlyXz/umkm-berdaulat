@extends('layouts.guest')

@section('content') 
<div class="h-screen items-center justify-center flex">
    <form action="{{route('product.store')}}" method="POST" class="">
        <div class="flex p-5 shadow-2xl bg-[#FAEAB1] rounded-xl gap-10">
            <div class="">
                <h1 class="flex justify-center font-bold text-xl m-3">Tambah Produk</h1>
                @csrf
                <div class="py-2">
                    <label for="name" class="">Nama: </label> <br>
                    <input type="text" name="nama" id="name" class="border border-black rounded mt-3 w-72 px-3 py-2" placeholder="Contoh: Sabun Tukang " required>
                </div>
                <div class="py-2">
                    <label for="price">Harga: </label> <br>
                    <input type="text" name="harga" id="price" class="border border-black rounded mt-3 w-72 px-3 py-2" placeholder="Contoh: Rp. 20.000" required>
                </div>
                <div class="justify-center flex mt-3 ">
                    <button type="submit" class="text-black px-3 py-2 rounded bg-[#E5BA73]">Tambah</button>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="flex items-center justify-center w-full">
                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-[#F0E5BD]">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                            </svg>
                            <p class="mb-2 text-xs text-gray-500 dark:text-gray-400"><span class="m-3 font-semibold">Tambah Gambar Produk #1</span></p>
                        </div>
                        <input id="dropzone-file" type="file" class="hidden" />
                    </label>
                </div> 
                <div class="flex items-center justify-center w-full">
                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-[#F0E5BD]">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                            </svg>
                            <p class="mb-2 text-xs text-gray-500 dark:text-gray-400 "><span class="m-3 font-semibold">Tambah Gambar Produk #2</span></p>
                            
                        </div>
                        <input id="dropzone-file" type="file" class="hidden" />
                    </label>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
