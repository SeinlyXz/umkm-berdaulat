@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center mt-10">
    <div class="w-full">
        <div class="flex flex-col">
            <div class="flex flex-col gap-y-2 bg-white shadow-xl px-5 py-4 rounded-lg">
                <h1 class="text-2xl font-bold">Buat Toko</h1>
                <form action="{{ route('toko.store') }}" method="POST" class="flex gap-x-10 justify-between" enctype="multipart/form-data">
                    @csrf
                    <div class="w-[50%] flex flex-col gap-y-2">
                        <div class="flex flex-col gap-y-2">
                            <label for="name" class="text-gray-700">Nama</label>
                            <input type="text" name="name" id="name" class="w-full rounded-lg border border-gray-300 p-2 text-gray-900 focus:border-blue-500 focus:ring-blue-500" placeholder="Nama Toko Anda">
                        </div>
                        <div class="flex flex-col gap-y-2">
                            <label for="description" class="text-gray-700">Deskripsi</label>
                            <textarea name="description" id="description" class="w-full rounded-lg border border-gray-300 p-2 text-gray-900 focus:border-blue-500 focus:ring-blue-500" placeholder="Deskripsi Toko Anda"></textarea>
                        </div>
                        <div class="flex flex-col gap-y-2">
                            <label for="alamat" class="text-gray-700">Alamat</label>
                            <input type="text" name="alamat" id="alamat" class="w-full rounded-lg border border-gray-300 p-2 text-gray-900 focus:border-blue-500 focus:ring-blue-500" placeholder="Alamat Toko Anda">
                        </div>
                        <div class="flex flex-col gap-y-2">
                            <label for="no_telp" class="text-gray-700">No. Telp</label>
                            <input type="text" name="no_telp" id="no_telp" class="w-full rounded-lg border border-gray-300 p-2 text-gray-900 focus:border-blue-500 focus:ring-blue-500" placeholder="No. Telp Toko Anda">
                        </div>
                    </div>
                    <div class="w-[50%] flex flex-col gap-y-2">
                        <div class="flex flex-col gap-y-2">
                            <label for="banner_image" class="text-gray-700">Banner Image</label>
                            <input type="file" name="banner_image" id="banner_image" class="w-full rounded-lg border border-gray-300 p-2 text-gray-900 focus:border-blue-500 focus:ring-blue-500" placeholder="Banner Image Toko Anda">
                        </div>
                        <div class="flex flex-col gap-y-2">
                            <label for="cover_image" class="text-gray-700">Cover Image</label>
                            <input type="file" name="cover_image" id="cover_image" class="w-full rounded-lg border border-gray-300 p-2 text-gray-900 focus:border-blue-500 focus:ring-blue-500" placeholder="Cover Image Toko Anda">
                        </div>
                        <div class="flex flex-col gap-y-2 mt-auto">
                            <button type="submit" class="w-full rounded-lg bg-blue-500 py-2 px-4 text-white hover:bg-blue-600 focus:bg-blue-400">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection