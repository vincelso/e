<?php

// app/Exports/RecordsExport.php
// Handles exporting records to Excel or CSV
// Uses: maatwebsite/excel package
// Install with: composer require maatwebsite/excel

namespace App\Exports;

use App\Models\Record;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class RecordsExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * Fetch all records from the database to export.
     */
    public function collection()
    {
        return Record::all();
    }

    /**
     * Define the column headers for the spreadsheet.
     */
    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Email',
            'Course',
            'Year Level',
            'Grade',
            'Status',
            'Date Added',
        ];
    }

    /**
     * Map each record row to the correct columns.
     */
    public function map($record): array
    {
        return [
            $record->id,
            $record->name,
            $record->email,
            $record->course,
            $record->year_level,
            $record->grade ?? 'N/A',
            $record->status,
            $record->created_at->format('Y-m-d'),
        ];
    }
}