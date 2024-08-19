<!-- resources/views/layouts/sidebar.blade.php -->

<div class="bg-gray-800 text-gray-100 w-full md:w-1/4 h-screen">
    <div class="p-4">
        <h1 class="text-xl font-bold">{{ $title }}</h1>
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
        <form method="POST" action="{{ route('logout') }}" class="block py-2.5 px-4">
            @csrf
            <button type="submit" class="w-full text-left hover:bg-gray-700 hover:text-white">Logout</button>
        </form>
    </nav>
</div>
