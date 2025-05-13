@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            Student Details
            <a href="{{ route('students.index') }}" class="btn btn-secondary float-end">Back</a>
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $student->first_name }} {{ $student->last_name }}</h5>
            <p class="card-text"><strong>Address:</strong> {{ $student->address }}</p>
            <p class="card-text"><small class="text-muted">Created: {{ $student->created_at->diffForHumans() }}</small></p>
        </div>
        <div class="card-footer">
            <a href="{{ route('students.edit', $student) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('students.destroy', $student) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" 
                    onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection