@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Monthly Summary</h1>
    <p><strong>Total Income:</strong> {{ $totalIncome ?? '0' }}</p>
    <p><strong>Total Expense:</strong> {{ $totalExpense ?? '0' }}</p>
    <a href="{{ route('transactions.index') }}" class="btn btn-secondary mt-3">Back to Transactions</a>
</div>
@endsection
