<!-- resources/views/dashboard.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <!-- Include Tailwind CSS here -->
</head>
<body>
    <h1 class="text-2xl font-bold">Welcome to the Dashboard</h1>

    <!-- Navigation Buttons -->
    <div class="mt-4">
        <a href="{{ route('users.index') }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 mr-2">
            Users
        </a>
        <a href="{{ route('transactions.index') }}" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
            Transactions
        </a>
    </div>

    <!-- Logout Button -->
    <form method="POST" action="{{ route('logout') }}" class="mt-4">
        @csrf
        <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
            Logout
        </button>
    </form>
</body>
</html>
