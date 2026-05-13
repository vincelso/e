{{-- resources/views/records/edit.blade.php --}}
{{-- Form to edit an existing record — pre-filled with current values --}}

@extends('layouts.app')

@section('title', 'Edit Record')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-7">

        <div class="card shadow-sm">
            <div class="card-header bg-warning text-dark">
                <h5 class="mb-0"><i class="bi bi-pencil"></i> Edit Record #{{ $record->id }}</h5>
            </div>

            <div class="card-body">
                {{-- Form uses PUT method (spoofed via @method('PUT')) --}}
                <form action="{{ route('records.update', $record) }}" method="POST">
                    @csrf
                    @method('PUT') {{-- Laravel needs this to treat POST as PUT --}}

                    {{-- Name field --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name', $record->name) }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Email field --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email', $record->email) }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Course field --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">Course</label>
                        <input type="text" name="course" class="form-control @error('course') is-invalid @enderror"
                               value="{{ old('course', $record->course) }}">
                        @error('course')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Year Level --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">Year Level</label>
                        <select name="year_level" class="form-select @error('year_level') is-invalid @enderror">
                            @foreach(['1st Year', '2nd Year', '3rd Year', '4th Year'] as $year)
                                <option value="{{ $year }}"
                                    {{ old('year_level', $record->year_level) == $year ? 'selected' : '' }}>
                                    {{ $year }}
                                </option>
                            @endforeach
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
                               value="{{ old('grade', $record->grade) }}">
                        @error('grade')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Status --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">Status</label>
                        <select name="status" class="form-select @error('status') is-invalid @enderror">
                            <option value="active"   {{ old('status', $record->status) == 'active'   ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status', $record->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Buttons --}}
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-warning">
                            <i class="bi bi-save"></i> Update Record
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