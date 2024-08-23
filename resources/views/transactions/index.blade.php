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
                <form method="POST" action="{{ route('logout') }}" class="block py-2.5 px-4">
                    @csrf
                    <button type="submit" class="w-full text-left hover:bg-gray-700 hover:text-white">Logout</button>
                </form>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="w-full md:w-3/4 p-6">
            <h2 class="text-2xl font-semibold mb-6">Transactions</h2>

            <!-- Action Buttons -->
            <div class="flex space-x-4 mb-4">
                <a href="{{ route('transactions.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Add New Transaction
                </a>
                <a href="{{ route('download.pdf') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Download Monthly Report (PDF)
                </a>
                <a href="{{ route('download.excel') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Download Monthly Report (Excel)
                </a>
                <a href="{{ route('debts.index') }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                    Hutang
                </a>
                <a href="{{ route('receivables.index') }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                    Piutang
                </a>
            </div>

            <!-- Transactions Table -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="px-4 py-2">Description</th>
                            <th class="px-4 py-2">Amount</th>
                            <th class="px-4 py-2">Type</th>
                            <th class="px-4 py-2">Date</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transactions as $transaction)
                        <tr>
                            <td class="border px-4 py-2">{{ $transaction->description }}</td>
                            <td class="border px-4 py-2">{{ number_format($transaction->amount, 2) }}</td>
                            <td class="border px-4 py-2">{{ ucfirst($transaction->type) }}</td>
                            <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($transaction->date)->format('Y-m-d') }}</td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('transactions.edit', $transaction->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">
                                    Edit
                                </a>
                                <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                                        Delete
                                    </button>
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
