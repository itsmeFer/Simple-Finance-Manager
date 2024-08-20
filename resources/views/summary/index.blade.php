<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Summary</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="flex flex-col md:flex-row">
        <!-- Sidebar -->
        <div class="bg-gray-800 text-gray-100 w-full md:w-1/4 h-screen">
            <div class="p-4">
                <h1 class="text-xl font-bold">Summary</h1>
            </div>
            <nav class="mt-4 flex flex-col h-full">
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
                <form method="POST" action="{{ route('logout') }}" class="py-2.5 px-4 mt-auto">
                    @csrf
                    <button type="submit" class="w-full text-left hover:bg-gray-700 hover:text-white">Logout</button>
                </form>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="w-full md:w-3/4 p-6">
            <h2 class="text-2xl font-semibold mb-6">Monthly Summary</h2>

            <div class="flex space-x-4">
                <!-- Income Section -->
                <div class="w-1/3 bg-green-100 p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-bold text-green-800">Total Income</h3>
                    <p class="mt-2 text-2xl font-semibold text-green-600">{{ number_format($totalIncome, 2) ?? '0.00' }}</p>
                </div>

                <!-- Expense Section -->
                <div class="w-1/3 bg-red-100 p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-bold text-red-800">Total Expense</h3>
                    <p class="mt-2 text-2xl font-semibold text-red-600">{{ number_format($totalExpense, 2) ?? '0.00' }}</p>
                </div>

                <!-- Nett Profit Section -->
                <div class="w-1/3 bg-blue-100 p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-bold text-blue-800">Nett Profit</h3>
                    <p class="mt-2 text-2xl font-semibold text-blue-600">{{ number_format($nettProfit, 2) ?? '0.00' }}</p>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('transactions.index') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Back to Transactions</a>
            </div>
        </div>
    </div>
</body>
</html>
