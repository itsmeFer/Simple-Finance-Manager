<!DOCTYPE html>
<html>
<head>
    <title>My App</title>
    @vite('resources/css/app.css')
</head>
<body>
    <!-- Sertakan bagian navigasi -->
    @include('partials.navigation')

    <main>
        @yield('content')
    </main>

    @vite('resources/js/app.js')
</body>
</html>
