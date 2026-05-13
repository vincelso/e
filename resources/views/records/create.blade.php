{{-- resources/views/records/create.blade.php --}}
{{-- Form to add a new record --}}

@extends('layouts.app')

@section('title', 'Add Record')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-7">

        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="bi bi-plus-circle"></i> Add New Record</h5>
            </div>

            <div class="card-body">
                {{-- Form submits to RecordController@store --}}
                <form action="{{ route('records.store') }}" method="POST">
                    @csrf {{-- Security token required for all forms --}}

                    {{-- Name field --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name') }}" placeholder="Enter full name">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Email field --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email') }}" placeholder="Enter email address">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Course field --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">Course</label>
                        <input type="text" name="course" class="form-control @error('course') is-invalid @enderror"
                               value="{{ old('course') }}" placeholder="e.g. BSIT, BSCS">
                        @error('course')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Year Level dropdown --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">Year Level</label>
                        <select name="year_level" class="form-select @error('year_level') is-invalid @enderror">
                            <option value="">-- Select Year Level --</option>
                            <option value="1st Year" {{ old('year_level') == '1st Year' ? 'selected' : '' }}>1st Year</option>
                            <option value="2nd Year" {{ old('year_level') == '2nd Year' ? 'selected' : '' }}>2nd Year</option>
                            <option value="3rd Year" {{ old('year_level') == '3rd Year' ? 'selected' : '' }}>3rd Year</option>
                            <option value="4th Year" {{ old('year_level') == '4th Year' ? 'selected' : '' }}>4th Year</option>
                        </select>
                        @error('year_level')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Grade field --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">Grade <span class="text-muted">(optional)</span></label>
                        <input type="number" step="0.01" min="0" max="100"
                               name="grade" class="form-control @error('grade') is-invalid @enderror"
                               value="{{ old('grade') }}" placeholder="e.g. 92.50">
                        @error('grade')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Status field --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">Status</label>
                        <select name="status" class="form-select @error('status') is-invalid @enderror">
                            <option value="active"   {{ old('status') == 'active'   ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Buttons --}}
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Save Record
                        </button>
                        <a href="{{ route('records.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

@endsection