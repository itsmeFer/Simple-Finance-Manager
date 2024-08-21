<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use PDF;
use Excel;
use App\Exports\MonthlyReportExport;

class ReportController extends Controller
{
    public function generateReport(Request $request)
    {
        $format = $request->query('format', 'pdf');

        $month = now()->format('F Y'); 

        $transactions = Transaction::whereMonth('created_at', now()->month)
                                   ->whereYear('created_at', now()->year)
                                   ->get();

        $totalIncome = $transactions->where('type', 'income')->sum('amount');
        $totalExpense = $transactions->where('type', 'expense')->sum('amount');
        $nettProfit = $totalIncome - $totalExpense;

        $reportData = [
            'month' => $month,  
            'transactions' => $transactions,
            'totalIncome' => $totalIncome,
            'totalExpense' => $totalExpense,
            'nettProfit' => $nettProfit,
        ];

        if ($format === 'pdf') {
            $pdf = PDF::loadView('reports.monthly_pdf', $reportData);
            return $pdf->download('monthly_report.pdf');
        } elseif ($format === 'excel') {
            return Excel::download(new MonthlyReportExport($reportData), 'monthly_report.xlsx');
        }
    }
}
