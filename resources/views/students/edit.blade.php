@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Edit Student</h1>
    
    <form action="{{ route('students.update', $student) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="first_name" class="form-label">First Name *</label>
            <input type="text" class="form-control" id="first_name" name="first_name" required
                value="{{ $student->first_name }}">
        </div>

        <div class="mb-3">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name"
                value="{{ $student->last_name }}">
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address *</label>
            <textarea class="form-control" id="address" name="address" required>{{ $student->address }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection