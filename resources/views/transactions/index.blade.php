<!-- resources/views/transactions/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="flex flex-col md:flex-row">
        <!-- Sidebar -->
        <div class="bg-gray-800 text-gray-100 w-full md:w-1/4 h-screen">
            <div class="p-4">
                <h1 class="text-xl font-bold">Transactions</h1>
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
                <a href="{{ route('report.monthly', ['format' => 'pdf']) }}" class="block py-2.5 px-4 hover:bg-gray-700 hover:text-white">
                    Download Monthly Report (PDF)
                </a>
                <a href="{{ route('report.monthly', ['format' => 'excel']) }}" class="block py-2.5 px-4 hover:bg-gray-700 hover:text-white">
                    Download Monthly Report (Excel)
                </a>
                <form method="POST" action="{{ route('logout') }}" class="block py-2.5 px-4">
                    @csrf
                    <button type="submit" class="w-full text-left hover:bg-gray-700 hover:text-white">Logout</button>
                </form>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="w-full md:w-3/4 p-6">
            <h2 class="text-2xl font-semibold mb-6">Transactions</h2>

            <!-- Button to Create New Transaction -->
            <div class="mb-4">
                <a href="{{ route('transactions.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Add New Transaction</a>
            </div>

            <!-- Transactions List -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="w-1/3 px-4 py-2">Description</th>
                            <th class="w-1/3 px-4 py-2">Amount</th>
                            <th class="w-1/3 px-4 py-2">Type</th>
                            <th class="w-1/3 px-4 py-2">Date</th>
                            <th class="w-1/3 px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transactions as $transaction)
                        <tr>
                            <td class="border px-4 py-2">{{ $transaction->description }}</td>
                            <td class="border px-4 py-2">{{ $transaction->amount }}</td>
                            <td class="border px-4 py-2">{{ ucfirst($transaction->type) }}</td>
                            <td class="border px-4 py-2">{{ $transaction->transaction_date }}</td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('transactions.edit', $transaction->id) }}" class="bg-yellow-500 text-white py-1 px-2 rounded hover:bg-yellow-600">Edit</a>
                                <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white py-1 px-2 rounded hover:bg-red-600">Delete</button>
                                </form>
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
