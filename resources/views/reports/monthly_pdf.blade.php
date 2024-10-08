<!-- resources/views/reports/monthly_pdf.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Report</title>
</head>
<body>
    <h1 style="text-align: center;">PT. FERDI PERKASA SELALU</h1>
    <h2 style="text-align: center;">Laporan Bulanan Perusahaan</h2>

    <table border="1" cellspacing="0" cellpadding="8" style="width: 100%; margin-top: 20px;">
        <thead>
            <tr>
                <th>Description</th>
                <th>Amount</th>
                <th>Type</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
            <tr>
                <td>{{ $transaction['description'] }}</td>
                <td>{{ number_format($transaction['amount'], 2) }}</td>
                <td>{{ ucfirst($transaction['type']) }}</td>
                <td>{{ $transaction['transaction_date'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Total Income: {{ number_format($totalIncome, 2) }}</h3>
    <h3>Total Expense: {{ number_format($totalExpense, 2) }}</h3>
    <h3>Nett Profit: {{ number_format($nettProfit, 2) }}</h3>
</body>
</html>
