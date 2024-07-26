<head>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>
        UMKM - @yield('title')
    </title>
    @vite('resources/css/app.css')
    {{-- <link rel="stylesheet" href="/build/assets/app-a8C0jmIC.css">
    <script src="/build/assets/app-DUWcdm82.js"></script> --}}
</head>
<body>
    <section class="px-32">
        @yield('content')
    </section>
</body>
</html>