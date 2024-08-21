<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MonthlyReportExport implements FromView
{
    public $transactions;
    public $totalIncome;
    public $totalExpense;
    public $nettProfit;

    public function __construct($transactions, $totalIncome, $totalExpense, $nettProfit)
    {
        $this->transactions = $transactions;
        $this->totalIncome = $totalIncome;
        $this->totalExpense = $totalExpense;
        $this->nettProfit = $nettProfit;
    }

    public function view(): View
    {
        return view('reports.monthly_excel', [
            'transactions' => $this->transactions,
            'totalIncome' => $this->totalIncome,
            'totalExpense' => $this->totalExpense,
            'nettProfit' => $this->nettProfit,
        ]);
    }
}
