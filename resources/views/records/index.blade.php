{{-- resources/views/records/index.blade.php --}}
{{-- Shows all records with pagination and action buttons --}}

@extends('layouts.app')

@section('title', 'Records')

@section('content')

{{-- Page header --}}
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2><i class="bi bi-table"></i> Records</h2>
    <a href="{{ route('records.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Add Record
    </a>
</div>

{{-- Records table --}}
<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover table-bordered mb-0">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Course</th>
                    <th>Year Level</th>
                    <th>Grade</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                {{-- Loop through each record --}}
                @forelse($records as $record)
                    <tr>
                        <td>{{ $record->id }}</td>
                        <td>{{ $record->name }}</td>
                        <td>{{ $record->email }}</td>
                        <td>{{ $record->course }}</td>
                        <td>{{ $record->year_level }}</td>
                        <td>{{ $record->grade ?? '—' }}</td>
                        <td>
                            {{-- Show colored badge based on status --}}
                            <span class="badge {{ $record->status === 'active' ? 'bg-success' : 'bg-secondary' }}">
                                {{ ucfirst($record->status) }}
                            </span>
                        </td>
                        <td>
                            {{-- Edit button --}}
                            <a href="{{ route('records.edit', $record) }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil"></i> Edit
                            </a>

                            {{-- Delete button (uses a form with DELETE method) --}}
                            <form action="{{ route('records.destroy', $record) }}" method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Are you sure you want to delete this record?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    {{-- Show message if no records exist --}}
                    <tr>
                        <td colspan="8" class="text-center text-muted py-4">
                            No records found. <a href="{{ route('records.create') }}">Add one now</a>.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Pagination links --}}
<div class="mt-3">
    {{ $records->links() }}
</div>

@endsection