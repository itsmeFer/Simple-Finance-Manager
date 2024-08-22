<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class MonthlyReportExport implements FromArray, WithHeadings, WithStyles
{
    protected $reportData;

    public function __construct(array $reportData)
    {
        $this->reportData = $reportData;
    }

    public function array(): array
    {
        return [
            ['PT. FERDI PERKASA SELALU'],  // Judul
            ['Laporan Bulanan Perusahaan'], // Subjudul
            [], // Baris kosong untuk spasi
            ['Month', $this->reportData['month']],
            ['Year', $this->reportData['year']],
            ['Total Income', number_format($this->reportData['totalIncome'], 2)],
            ['Total Expense', number_format($this->reportData['totalExpense'], 2)],
            ['Nett Profit', number_format($this->reportData['nettProfit'], 2)],
        ];
    }

    public function headings(): array
    {
        return [];
    }

    public function styles(Worksheet $sheet)
    {
        // Merge cells for the title and subtitle to center them on column M
        $sheet->mergeCells('A1:M1'); // Merge cells from A to M for the title
        $sheet->mergeCells('A2:M2'); // Merge cells from A to M for the subtitle

        return [
            1 => ['font' => ['bold' => true, 'size' => 24], 'alignment' => ['horizontal' => 'center']], // Judul
            2 => ['font' => ['bold' => true, 'italic' => true, 'size' => 14], 'alignment' => ['horizontal' => 'center']], // Subjudul
        ];
    }
}
