<!-- resources/views/users/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 bg-white border-r border-gray-200 h-screen">
            <div class="p-6">
                <h2 class="text-xl font-semibold mb-4">Dashboard</h2>
                <ul>
                    <li class="mb-2">
                        <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-blue-600">Dashboard</a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('transactions.index') }}" class="text-gray-700 hover:text-blue-600">Transactions</a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('users.index') }}" class="text-gray-700 hover:text-blue-600">Users</a>
                    </li>
                </ul>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 p-6">
            <h1 class="text-2xl font-bold mb-6">Users List</h1>
            
            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="py-2 px-4 border-b">Name</th>
                            <th class="py-2 px-4 border-b">Email</th>
                            <th class="py-2 px-4 border-b">Last Login</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="py-2 px-4 border-b">{{ $user->name }}</td>
                                <td class="py-2 px-4 border-b">{{ $user->email }}</td>
                                <td class="py-2 px-4 border-b">
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
