{{-- resources/views/dashboard.blade.php --}}
{{-- Main dashboard page shown after login --}}

@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row mb-4">
    <div class="col">
        <h2><i class="bi bi-speedometer2"></i> Dashboard</h2>
        <p class="text-muted">Welcome back, <strong>{{ Auth::user()->name }}</strong>!</p>
    </div>
</div>

{{-- Quick navigation cards --}}
<div class="row g-4">

    {{-- Records card --}}
    <div class="col-md-6">
        <div class="card text-white bg-primary h-100">
            <div class="card-body text-center py-4">
                <i class="bi bi-table" style="font-size: 3rem;"></i>
                <h4 class="card-title mt-2">Records</h4>
                <p class="card-text">Manage student records — add, edit, or delete entries.</p>
                <a href="{{ route('records.index') }}" class="btn btn-light">
                    Go to Records
                </a>
            </div>
        </div>
    </div>

    {{-- Reports card --}}
    <div class="col-md-6">
        <div class="card text-white bg-success h-100">
            <div class="card-body text-center py-4">
                <i class="bi bi-file-earmark-bar-graph" style="font-size: 3rem;"></i>
                <h4 class="card-title mt-2">Reports</h4>
                <p class="card-text">View and export records as CSV, Excel, or PDF.</p>
                <a href="{{ route('reports.index') }}" class="btn btn-light">
                    Go to Reports
                </a>
            </div>
        </div>
    </div>

</div>
@endsection