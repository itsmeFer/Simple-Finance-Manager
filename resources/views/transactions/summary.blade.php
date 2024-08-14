@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Monthly Summary</h1>

    <div class="row">
        <div class="col-md-6">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Total Income</div>
                <div class="card-body">
                    <h5 class="card-title">Rp {{ number_format($totalIncome, 2) }}</h5>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header">Total Expense</div>
                <div class="card-body">
                    <h5 class="card-title">Rp {{ number_format($totalExpense, 2) }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
