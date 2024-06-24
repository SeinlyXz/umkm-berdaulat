@extends('layouts.guest')

@section("content")
    <div class="h-screen items-center w-full flex justify-center">
        <section class="flex flex-col gap-y-5 shadow-xl p-10 rounded-xl">
            @if (Session::has('error'))
                <div class="bg-red-500 w-full text-white px-3 py-2 rounded-xl text-center">
                    <p>{{ Session::get('error') }}</p>
                </div>
            @endif
            <h1 class="text-2xl">
                Register User Baru
            </h1>
            <form action="{{ route('register.post') }}" method="POST">
                @csrf
                <div class="flex flex-col gap-y-3">
                    <input type="text" name="name" class="w-96 rounded-xl border border-gray-500 px-3 py-2" required placeholder="nama">
                    <input type="email" name="email" class="w-96 rounded-xl border border-gray-500 px-3 py-2" required placeholder="email">
                    <input type="password" name="password" class="w-96 rounded-xl border border-gray-500 px-3 py-2" required placeholder="password">
                    <button type="submit" class="rounded-xl px-3 py-2 bg-slate-400 text-white">Register</button>
                </div>
            </form>
            <p>
                Sudah punya akun? <a href="{{route("login")}}" class="text-blue-500 hover:text-blue-400 underline underline-offset-2">klik di sini</a>
            </p>
        </section>
    </div>
@endsection
