<!-- resources/views/debts/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Debts</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="flex flex-col md:flex-row">
        <!-- Sidebar -->
        <div class="bg-gray-800 text-gray-100 w-full md:w-1/4 h-screen">
            <div class="p-4">
                <h1 class="text-xl font-bold">Hutang</h1>
            </div>
            <nav class="mt-4">
                <!-- Add your links similarly as in the users sidebar -->
                <a href="{{ route('debts.index') }}" class="block py-2.5 px-4 hover:bg-gray-700 hover:text-white {{ request()->routeIs('debts.index') ? 'bg-gray-700 text-white' : '' }}">
                    Hutang
                </a>
                <a href="{{ route('receivables.index') }}" class="block py-2.5 px-4 hover:bg-gray-700 hover:text-white {{ request()->routeIs('receivables.index') ? 'bg-gray-700 text-white' : '' }}">
                    Piutang
                </a>
                <!-- other menu items -->
                <form method="POST" action="{{ route('logout') }}" class="block py-2.5 px-4">
                    @csrf
                    <button type="submit" class="w-full text-left hover:bg-gray-700 hover:text-white">Logout</button>
                </form>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="w-full md:w-3/4 p-6">
            <h2 class="text-2xl font-semibold mb-6">Daftar Hutang</h2>

            <!-- Debts List -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="px-4 py-2">Deskripsi</th>
                            <th class="px-4 py-2">Jumlah</th>
                            <th class="px-4 py-2">Tanggal Jatuh Tempo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($debts as $debt)
                        <tr>
                            <td class="border px-4 py-2">{{ $debt->description }}</td>
                            <td class="border px-4 py-2">{{ number_format($debt->amount, 2) }}</td>
                            <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($debt->due_date)->format('d-m-Y') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
