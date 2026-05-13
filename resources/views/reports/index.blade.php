{{-- resources/views/reports/index.blade.php --}}
{{-- Reports page: shows a summary table + export buttons --}}

@extends('layouts.app')

@section('title', 'Reports')

@section('content')

{{-- Page header + export buttons --}}
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2><i class="bi bi-bar-chart"></i> Reports</h2>

    {{-- Export buttons --}}
    <div class="d-flex gap-2">
        <a href="{{ route('reports.csv') }}" class="btn btn-outline-secondary">
            <i class="bi bi-filetype-csv"></i> Export CSV
        </a>
        <a href="{{ route('reports.excel') }}" class="btn btn-outline-success">
            <i class="bi bi-file-earmark-excel"></i> Export Excel
        </a>
        <a href="{{ route('reports.pdf') }}" class="btn btn-outline-danger">
            <i class="bi bi-file-earmark-pdf"></i> Export PDF
        </a>
    </div>
</div>

{{-- Summary cards row --}}
<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card text-white bg-primary text-center p-3">
            <h6>Total Records</h6>
            <h2>{{ $totalRecords }}</h2>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-success text-center p-3">
            <h6>Active Students</h6>
            <h2>{{ $activeCount }}</h2>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-info text-center p-3">
            <h6>Average Grade</h6>
            <h2>{{ number_format($avgGrade, 2) }}</h2>
        </div>
    </div>
</div>

{{-- Full records table --}}
<div class="card shadow-sm">
    <div class="card-header bg-dark text-white">
        <strong><i class="bi bi-table"></i> All Records</strong>
    </div>
    <div class="card-body p-0">
        <table class="table table-striped table-bordered mb-0">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Course</th>
                    <th>Year Level</th>
                    <th>Grade</th>
                    <th>Status</th>
                    <th>Date Added</th>
                </tr>
            </thead>
            <tbody>
                @forelse($records as $record)
                    <tr>
                        <td>{{ $record->id }}</td>
                        <td>{{ $record->name }}</td>
                        <td>{{ $record->email }}</td>
                        <td>{{ $record->course }}</td>
                        <td>{{ $record->year_level }}</td>
                        <td>{{ $record->grade ?? '—' }}</td>
                        <td>
                            <span class="badge {{ $record->status === 'active' ? 'bg-success' : 'bg-secondary' }}">
                                {{ ucfirst($record->status) }}
                            </span>
                        </td>
                        <td>{{ $record->created_at->format('Y-m-d') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted py-4">No records found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection