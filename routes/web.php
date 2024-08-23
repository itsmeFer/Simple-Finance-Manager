<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/last-login', [UserController::class, 'lastLogin'])->name('last-login');
use App\Http\Controllers\UserController;

Route::get('/last-login', [UserController::class, 'lastLogin'])->name('last-login');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::resource('transactions', TransactionController::class);
Route::get('/transactions/summary', [TransactionController::class, 'monthlySummary'])->name('transactions.summary');
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');


use App\Http\Controllers\SummaryController;

Route::get('/summary', [SummaryController::class, 'index'])->name('summary');
use App\Http\Controllers\ReportController;

Route::get('/report/monthly', [ReportController::class, 'generateReport'])->name('report.monthly');

Route::get('/report/monthly', [ReportController::class, 'monthlyReport'])->name('report.monthly');


Route::get('/report/monthly', [ReportController::class, 'generateReport'])->name('report.monthly');
use App\Http\Controllers\DebtController;

Route::get('/debts', [DebtController::class, 'index'])->name('debts.index');

Route::resource('debts', DebtController::class);
Route::resource('receivables', ReceivableController::class);

Route::get('/download/pdf', [ReportController::class, 'generateReport'])->name('download.pdf');
Route::get('/download/excel', [ReportController::class, 'generateReport'])->name('download.excel');


require __DIR__.'/auth.php';
