<?php

// app/Http/Controllers/ReportController.php
// Handles the Reports module: view table, export CSV, Excel, PDF

namespace App\Http\Controllers;

use App\Models\Record;
use App\Exports\RecordsExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * INDEX - Show the reports table with all records.
     * Route: GET /reports
     */
    public function index()
    {
        // Fetch all records for the report table
        $records = Record::all();

        // Compute summary statistics
        $totalRecords = $records->count();
        $avgGrade     = $records->avg('grade');
        $activeCount  = $records->where('status', 'active')->count();

        return view('reports.index', compact('records', 'totalRecords', 'avgGrade', 'activeCount'));
    }

    /**
     * EXPORT CSV - Download records as a CSV file.
     * Route: GET /reports/export-csv
     */
    public function exportCsv()
    {
        // Uses maatwebsite/excel to export as CSV
        return Excel::download(new RecordsExport(), 'records.csv', \Maatwebsite\Excel\Excel::CSV);
    }

    /**
     * EXPORT EXCEL - Download records as an Excel (.xlsx) file.
     * Route: GET /reports/export-excel
     */
    public function exportExcel()
    {
        // Uses maatwebsite/excel to export as XLSX
        return Excel::download(new RecordsExport(), 'records.xlsx');
    }

    /**
     * EXPORT PDF - Download records as a PDF file.
     * Route: GET /reports/export-pdf
     */
    public function exportPdf()
    {
        // Fetch all records to include in the PDF
        $records = Record::all();

        // Load a blade view into the PDF renderer (barryvdh/laravel-dompdf)
        $pdf = Pdf::loadView('reports.pdf', compact('records'));

        // Download the generated PDF
        return $pdf->download('records.pdf');
    }
}