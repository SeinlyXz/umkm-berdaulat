@extends("layouts.app")
@section("title","Home")
@section("content")
    <div class="flex justify-center items-center h-screen">
        <div class="flex flex-col gap-y-5">
            <h1 class="text-3xl text-gray-500">
                Selamat Datang! {{$user->name}}
                {{ $search }}
            </h1>
            <a href="{{ route('logout') }}" class="text-white bg-slate-500 hover:bg-slate-400 text-center rounded-xl px-3 py-2 w-full mt-5">
                Logout
            </a>
        </div>
    </div>
@endsection