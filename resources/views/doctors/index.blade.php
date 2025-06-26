@extends('layouts.bootstrap')

@section('content')
<div class="container mt-5">
    <!-- Search form for filtering by doctor name -->
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h2 class="text-primary mb-4">Doctors</h2>
            <form action="{{ route('doctors.index') }}" method="GET" class="d-flex justify-content-center">
                <input type="text" name="doctor_speciality" value="{{ request('doctor_speciality') }}" placeholder="Search by Doctor speciality..." class="form-control w-50">
                <button type="submit" class="btn btn-primary ms-2">Search</button>
                <!-- Clear Button -->
                <a href="{{ route('doctors.index') }}" class="btn btn-secondary ms-2 d-flex align-items-center justify-content-center">Clear</a>
            </form>
        </div>
    </div>

    <!-- Doctors List in Grid -->
    <div class="row">
            @foreach ($doctors as $doctor)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <a href="{{ route('doctors.show', $doctor) }}" class="text-decoration-none">
                        <div class="card-body">
                            <h5 class="card-title text-primary">{{ $doctor->first_name }} {{ $doctor->last_name }}</h5>
                            <p class="card-text"><strong>Email:</strong> {{ $doctor->email }}</p>
                            <p class="card-text"><strong>Phone:</strong> {{ $doctor->phone }}</p>
                            <p class="card-text"><strong>Speciality:</strong> {{ $doctor->speciality }}</p>
                            <!-- Rating and Review Info -->
                            <div class="mt-2">
                                @if ($doctor->reviews_count > 0)
                                    <p><strong>Rating:</strong> {{ number_format($doctor->reviews_avg_rating, 1) }} ★</p>
                                    <p><strong>Reviews:</strong> {{ $doctor->reviews_count }} {{ Str::plural('review', $doctor->reviews_count) }}</p>
                                @else
                                    <p class="text-muted">No reviews yet.</p>
                                @endif
                            </div>
                        </div>
                    </a>

                    <!-- Action Buttons -->
                    @auth
                        @if (auth()->user()->role === 'admin')
                            <!-- Action Buttons -->
                            <div class="d-flex justify-content-between mt-3">
                                <a href="{{ route('doctors.edit', $doctor) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('doctors.destroy', $doctor) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this doctor?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </div>
                        @endif
                    @endauth
                </div>
            </div>
        @endforeach

    </div>

    <!-- Pagination Links -->
    <div class="mt-4">
        {{ $doctors->links('pagination::bootstrap-4') }}
    </div>

    @auth
        @if (auth()->user()->role === 'admin')
            <!-- Add New Doctor Button -->
            <div class="d-grid gap-2 mb-4">
                <a href="{{ route('doctors.create') }}" class="btn btn-success btn-lg">Add New Doctor</a>
            </div>
            <!-- Back to Main Page Button -->
            <div class="d-grid gap-2">
                <a href="{{ route('clinic.index') }}" class="btn btn-secondary btn-lg">Main Page</a>
            </div>
        @else
            <!-- Back to Main Page Button -->
            <div class="d-grid gap-2">
                <a href="{{ route('user.dashboard') }}" class="btn btn-secondary btn-lg">Main Page</a>
            </div>
        @endif
    @endauth
</div>
@endsection

@section('styles')
    <style>
        /* General Styling */
        body {
            font-family: 'Arial', sans-serif;
        }

        .btn-primary, .btn-secondary, .btn-success {
            border-radius: 30px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover, .btn-secondary:hover, .btn-success:hover {
            background-color: #0056b3;
        }

        .btn-warning {
            background-color: #f39c12;
            color: white;
            border-radius: 30px;
        }

        .btn-warning:hover {
            background-color: #e67e22;
        }

        .btn-danger {
            background-color: #e74c3c;
            color: white;
            border-radius: 30px;
        }

        .btn-danger:hover {
            background-color: #c0392b;
        }

        .card {
            border-radius: 15px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        /* Custom Pagination */
        .pagination .page-link {
            font-size: 1rem;
            padding: 0.5rem 1rem;
            border-radius: 50px;
        }

        .pagination .page-item.active .page-link,
        .pagination .page-item.disabled .page-link {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
        }

        .pagination .page-link {
            color: #007bff;
            background-color: white;
            border: 1px solid #ddd;
        }

        .pagination .page-link:hover {
            background-color: #f1f1f1;
        }

        /* Search Form Styling */
        .form-control {
            border-radius: 30px;
            padding: 10px 15px;
            box-shadow: none;
            border: 1px solid #ddd;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
        }

        .container {
            max-width: 1200px;
        }

        .doctor-card {
            background-color: #f8f9fa;
            border-radius: 15px;
            border: 1px solid #e2e6ea;
        }

        .doctor-card:hover {
            background-color: #e9f5ff;
            border-color: #007bff;
        }

        .doctor-rating {
            color: #f39c12;
            font-weight: bold;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            .doctor-card {
                margin-bottom: 15px;
            }
        }
    </style>
@endsection
