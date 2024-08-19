<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'App Name')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="flex flex-col md:flex-row">
        <!-- Sidebar -->
        <div class="bg-gray-800 text-gray-100 w-full md:w-1/4 h-screen z-10">
            <div class="p-4">
                <h1 class="text-xl font-bold">Menu</h1>
            </div>
            <nav class="mt-4">
                <a href="{{ route('dashboard') }}" class="block py-2.5 px-4 hover:bg-gray-700 hover:text-white {{ request()->routeIs('dashboard') ? 'bg-gray-700 text-white' : '' }}">
                    Dashboard
                </a>
                <a href="{{ route('users.index') }}" class="block py-2.5 px-4 hover:bg-gray-700 hover:text-white {{ request()->routeIs('users.index') ? 'bg-gray-700 text-white' : '' }}">
                    Users
                </a>
                <a href="{{ route('transactions.index') }}" class="block py-2.5 px-4 hover:bg-gray-700 hover:text-white {{ request()->routeIs('transactions.index') ? 'bg-gray-700 text-white' : '' }}">
                    Transactions
                </a>
                <a href="{{ route('summary') }}" class="block py-2.5 px-4 hover:bg-gray-700 hover:text-white {{ request()->routeIs('summary') ? 'bg-gray-700 text-white' : '' }}">
                    Summary
                </a>
                <form method="POST" action="{{ route('logout') }}" class="block py-2.5 px-4">
                    @csrf
                    <button type="submit" class="w-full text-left hover:bg-gray-700 hover:text-white">Logout</button>
                </form>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="w-full md:w-3/4 p-6">
            @yield('content')
        </div>
    </div>
</body>
</html>
