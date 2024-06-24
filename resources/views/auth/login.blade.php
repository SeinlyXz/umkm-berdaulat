@extends('layouts.guest')
@section("title","Login")
@section("content")
    <div class="h-screen items-center w-full flex justify-center">
        <section class="flex flex-col gap-y-5 shadow-xl p-10 rounded-xl">
            @if (Session::has('error'))
                <div class="bg-red-500 w-full text-white px-3 py-2 rounded-xl text-center">
                    <p>{{ Session::get('error') }}</p>
                </div>
            @endif
            @if(Session::has('warning'))
                <div class="bg-yellow-500 w-full text-white px-3 py-2 rounded-xl text-center">
                    <p>{{ Session::get('warning') }}</p>
                </div>
            @endif
            <h1 class="text-2xl">
                Login Dulu Bang
            </h1>
            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                <div class="flex flex-col gap-y-4 w-full">
                    <input type="text" name="email" class="w-96 border border-gray-500 rounded-xl px-3 py-2" placeholder="Email" required {{Session::has("warning") ? "disabled" : ""}}>
                    <input type="password" class="w-96 border border-gray-500 rounded-xl px-3 py-2" name="password" placeholder="Password" required {{Session::has("warning") ? "disabled" : ""}}>
                    <button type="submit" class="w-96 bg-slate-400 hover:bg-slate-500 rounded-xl px-3 py-2 text-white text-center">Login</button>
                </div>
            </form>
            <p>
                Belum punya akun? <a href="{{route('register')}}" class="text-blue-500 hover:text-blue-400 underline underline-offset-2">daftar di sini</a>
            </p>
        </section>
    </div>
@endsection