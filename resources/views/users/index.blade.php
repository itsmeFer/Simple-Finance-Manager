<!-- resources/views/users/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="flex flex-col md:flex-row">
        <!-- Sidebar -->
        <div class="bg-gray-800 text-gray-100 w-full md:w-1/4 h-screen">
            <div class="p-4">
                <h1 class="text-xl font-bold">Users</h1>
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
                <a href="{{ route('dashboard') }}" class="block py-2.5 px-4 hover:bg-gray-700 hover:text-white {{ request()->routeIs('dashboard') ? 'bg-gray-700 text-white' : '' }}">
                    Dashboard
                </a>
                <a href="{{ route('debts.index') }}" class="block py-2.5 px-4 hover:bg-gray-700 hover:text-white {{ request()->routeIs('debts.index') ? 'bg-gray-700 text-white' : '' }}">
                    Hutang
                </a>
                <a href="{{ route('receivables.index') }}" class="block py-2.5 px-4 hover:bg-gray-700 hover:text-white {{ request()->routeIs('receivables.index') ? 'bg-gray-700 text-white' : '' }}">
                    Piutang
                </a>
                <form method="POST" action="{{ route('logout') }}" class="block py-2.5 px-4">
                    @csrf
                    <button type="submit" class="w-full text-left hover:bg-gray-700 hover:text-white">Logout</button>
                </form>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="w-full md:w-3/4 p-6">
            <h2 class="text-2xl font-semibold mb-6">Users List</h2>

            <!-- Users List -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Last Login</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td class="border px-4 py-2">{{ $user->name }}</td>
                            <td class="border px-4 py-2">{{ $user->email }}</td>
                            <td class="border px-4 py-2">
                                @if ($user->last_login_at)
                                    {{ \Carbon\Carbon::parse($user->last_login_at)->format('d-m-Y H:i:s') }}
                                @else
                                    Never
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
