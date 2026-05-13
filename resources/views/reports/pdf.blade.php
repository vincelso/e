{{-- resources/views/reports/pdf.blade.php --}}
{{-- This view is rendered by DomPDF to generate the downloadable PDF --}}
{{-- Keep it simple — DomPDF doesn't support all CSS features --}}

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Records Report</title>
    <style>
        /* Basic styling for PDF output */
        body  { font-family: Arial, sans-serif; font-size: 12px; }
        h2    { text-align: center; color: #1a1a2e; }
        p     { text-align: center; color: #555; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th    { background-color: #1a1a2e; color: white; padding: 8px; text-align: left; }
        td    { padding: 7px 8px; border-bottom: 1px solid #ddd; }
        tr:nth-child(even) { background-color: #f2f2f2; }
    </style>
</head>
<body>

    <h2>Records Report</h2>
    <p>Generated on {{ now()->format('F d, Y') }}</p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Course</th>
                <th>Year Level</th>
                <th>Grade</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($records as $record)
                <tr>
                    <td>{{ $record->id }}</td>
                    <td>{{ $record->name }}</td>
                    <td>{{ $record->email }}</td>
                    <td>{{ $record->course }}</td>
                    <td>{{ $record->year_level }}</td>
                    <td>{{ $record->grade ?? 'N/A' }}</td>
                    <td>{{ ucfirst($record->status) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>