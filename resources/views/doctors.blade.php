@extends('layouts.app')

@section('content')
    <div class="card shadow-sm p-4">
        <h2 class="text-center text-primary mb-4">Available Doctors</h2>

            @foreach ($doctors as $doctor)
            <div class="doctor-card mb-4 p-3">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h4 class="mb-0">{{ $doctor->first_name }} {{ $doctor->last_name }}</h4>
                    <div class="d-flex">
                        <a href="{{ route('doctors.edit', $doctor) }}" class="btn btn-sm btn-primary me-2">Edit</a>
                        <form action="{{ route('doctors.destroy', $doctor) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this doctor?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
                <p class="mb-1"><strong>Speciality:</strong> {{ $doctor->speciality }}</p>
                <p class="mb-1"><strong>Email:</strong> {{ $doctor->email }}</p>
                <p class="mb-0"><strong>Phone:</strong> {{ $doctor->phone }}</p>
            </div>
        @endforeach


        <div class="mt-4">
            {{ $doctors->links('pagination::bootstrap-4') }}
        </div>

        <div class="d-grid gap-2 mb-2">
            <a href="{{ route('doctors.create') }}" class="btn btn-success btn-lg">Add New Doctor</a>
        </div>

        <div class="d-grid gap-2">
            <a href="{{ route('clinic.index') }}" class="btn btn-secondary btn-lg">Main Page</a>
        </div>


    </div>
@endsection

@section('styles')
    <style>

        .pagination .page-link {
            font-size: 1rem; /* Adjust the font size */
            padding: 0.375rem 0.75rem; /* Adjust padding if necessary */
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            border-radius: 10px;
            padding: 12px 20px;
            font-size: 1rem;
            transition: background-color 0.3s;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }


        .pagination .page-item.disabled .page-link,
        .pagination .page-item.active .page-link {
            background-color: #007bff;
            border-color: #007bff;
            color: white;
        }

        .pagination .page-link {
            display: inline-block;
            color: #007bff; /* Customize the color */
            background-color: white;
            border: 1px solid #ddd;
        }

        .pagination .page-link:hover {
            background-color: #f1f1f1; /* Hover effect */
        }

        .pagination .page-item .page-link {
            padding: 8px 16px; /* Adjust padding for the arrows */
        }


        .doctor-card {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 10px;
        }

        .doctor-card:hover {
            background-color: #e9f5ff;
            border-color: #007bff;
        }
    </style>
@endsection
