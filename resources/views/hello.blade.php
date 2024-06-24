@extends('layouts.app')

@section('content')
    <div class="h-screen flex items-center justify-center">
        <div class="">
            <h1 class="text-4xl">
                Hello World!
            </h1>
            @foreach ($users as $user)
                <ul>
                    <li class="flex flex-col">
                        <p>
                            {{ $user->name }}
                        </p>
                    </li>
                </ul>
            @endforeach
        </div>
    </div>
@endsection