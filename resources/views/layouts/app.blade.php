<head>
    <title>
        UMKM - @yield('title')
    </title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    @vite(['resources/css/app.css', 'resources/js/script.js'])
</head>
<body>
    <x-profile.my />
    <x-navbar />
    <section class="px-32">
        @yield('content')
    </section>
</body>
</html>