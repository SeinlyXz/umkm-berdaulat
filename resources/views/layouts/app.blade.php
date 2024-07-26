<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>
        UMKM - @yield('title')
    </title>
    <link rel="icon" href="{{ asset('logo.svg') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- <link rel="stylesheet" href="/build/assets/app-a8C0jmIC.css">
    <script src="/build/assets/app-DUWcdm82.js"></script> --}}
</head>
<body>
    <div class="pb-20">
        <x-navbar />
    </div>
    <section>
        @yield('profile')
        <div class="md:px-20 px-5">
            @yield('content')
        </div>
    </section>
</body>
</html>