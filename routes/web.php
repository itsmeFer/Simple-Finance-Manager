<?php

use App\Http\Controllers\TransactionController;

Route::get('/', function () {
    return redirect()->route('transactions.index');
});

Route::resource('transactions', TransactionController::class)->except(['show']);

Route::get('transactions/summary', [TransactionController::class, 'monthlySummary'])->name('transactions.summary');

Route::get('/', function () {
    return redirect()->route('transactions.index');
});

Route::resource('transactions', TransactionController::class)->except(['show']);

Route::get('/', function () {
    return redirect()->route('transactions.index');
});

Route::resource('transactions', TransactionController::class)->except(['show']);
Route::get('transactions/summary', [TransactionController::class, 'monthlySummary'])->name('transactions.summary');
