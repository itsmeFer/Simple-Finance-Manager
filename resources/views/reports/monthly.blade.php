<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Report</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 80%; margin: 0 auto; }
        .header { text-align: center; margin-bottom: 20px; }
        .content { margin-top: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 10px; text-align: left; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Monthly Report</h1>
            <p>Month: {{ $month }}/{{ $year }}</p>
        </div>
        <div class="content">
            <p><strong>Total Income:</strong> {{ number_format($totalIncome, 2) }}</p>
            <p><strong>Total Expense:</strong> {{ number_format($totalExpense, 2) }}</p>
            <p><strong>Nett Profit:</strong> {{ number_format($nettProfit, 2) }}</p>
        </div>
    </div>
</body>
</html>
