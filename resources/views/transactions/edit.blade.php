<!-- resources/views/transactions/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Transaction</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold mb-6">Edit Transaction</h2>
        <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-semibold mb-2">Description</label>
                <input type="text" name="description" id="description" class="w-full px-3 py-2 border border-gray-300 rounded-lg" value="{{ old('description', $transaction->description) }}">
            </div>
            <div class="mb-4">
                <label for="amount" class="block text-gray-700 font-semibold mb-2">Amount</label>
                <input type="number" name="amount" id="amount" class="w-full px-3 py-2 border border-gray-300 rounded-lg" value="{{ old('amount', $transaction->amount) }}">
            </div>
            <div class="mb-4">
                <label for="type" class="block text-gray-700 font-semibold mb-2">Type</label>
                <select name="type" id="type" class="w-full px-3 py-2 border border-gray-300 rounded-lg">
                    <option value="income" {{ $transaction->type == 'income' ? 'selected' : '' }}>Income</option>
                    <option value="expense" {{ $transaction->type == 'expense' ? 'selected' : '' }}>Expense</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="transaction_date" class="block text-gray-700 font-semibold mb-2">Transaction Date</label>
                <input type="date" name="transaction_date" id="transaction_date" class="w-full px-3 py-2 border border-gray-300 rounded-lg" value="{{ old('transaction_date', $transaction->transaction_date) }}">
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Update</button>
            </div>
        </form>
    </div>
</body>
</html>
