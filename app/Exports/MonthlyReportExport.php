<?php

// app/Exports/MonthlyReportExport.php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MonthlyReportExport implements FromArray, WithHeadings
{
    protected $reportData;

    public function __construct(array $reportData)
    {
        $this->reportData = $reportData;
    }

    public function array(): array
    {
        return [
            ['Month', $this->reportData['month']],
            ['Year', $this->reportData['year']],  // Sertakan tahun dalam export
            ['Total Income', number_format($this->reportData['totalIncome'], 2)],
            ['Total Expense', number_format($this->reportData['totalExpense'], 2)],
            ['Nett Profit', number_format($this->reportData['nettProfit'], 2)],
        ];
    }

    public function headings(): array
    {
        return ['Description', 'Amount'];
    }
}
