<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function generateReport(Request $request)
    {
        $month = $request->input('month', date('m'));
        $year = $request->input('year', date('Y'));

        $totalIncome = Transaction::where('type', 'income')
                        ->whereMonth('created_at', $month)
                        ->whereYear('created_at', $year)
                        ->sum('amount');

        $totalExpense = Transaction::where('type', 'expense')
                        ->whereMonth('created_at', $month)
                        ->whereYear('created_at', $year)
                        ->sum('amount');

        $nettProfit = $totalIncome - $totalExpense;

        $reportData = [
            'month' => $month,
            'year' => $year,
            'totalIncome' => $totalIncome,
            'totalExpense' => $totalExpense,
            'nettProfit' => $nettProfit,
        ];

        if ($request->input('format') == 'pdf') {
            $pdf = Pdf::loadView('reports.monthly', $reportData);
            return $pdf->download("monthly_report_{$month}_{$year}.pdf");
        }

        if ($request->input('format') == 'excel') {
            return Excel::download(new MonthlyReportExport($reportData), "monthly_report_{$month}_{$year}.xlsx");
        }

        return view('reports.monthly', $reportData);
    }
}
