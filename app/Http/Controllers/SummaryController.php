<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class SummaryController extends Controller
{
    public function index()
    {
        // Menghitung total income
        $totalIncome = Transaction::where('type', 'income')->sum('amount');

        // Menghitung total expense
        $totalExpense = Transaction::where('type', 'expense')->sum('amount');

        // Menghitung nett profit
        $nettProfit = $totalIncome - $totalExpense;

        // Mengirim data ke view
        return view('summary.index', compact('totalIncome', 'totalExpense', 'nettProfit'));
    }
}
