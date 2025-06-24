@extends('layouts.bootstrap')

@section('content')
    <div class="container mt-5">
        <!-- Search form for filtering by patient name -->
        <div class="row mb-4">
            <div class="col-12 text-center">
                <h2 class="text-primary mb-4">Appointments</h2>
                <form action="{{ route('appointments.index') }}" method="GET" class="d-flex justify-content-center">
                    <input type="text" name="patient_name" value="{{ request('patient_name') }}" placeholder="Search by Patient Name..." class="form-control w-50">
                    <button type="submit" class="btn btn-primary ms-2">Search</button>
                    <!-- Clear Button -->
                    <a href="{{ route('appointments.index') }}" class="btn btn-secondary ms-2 d-flex align-items-center justify-content-center">Clear</a>
                </form>
            </div>
        </div>

        <!-- Appointments List in Grid -->
        <div class="row">
            @foreach ($appointments as $appointment)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title text-primary">{{ $appointment->patient->first_name }} {{ $appointment->patient->last_name }}</h5>
                            <p class="card-text"><strong>Doctor:</strong> {{ $appointment->doctor->first_name }} {{ $appointment->doctor->last_name }}</p>
                            <p class="card-text"><strong>Speciality:</strong> {{ $appointment->doctor->speciality }}</p>
                            <p class="card-text"><strong>Appointment Date:</strong> {{ $appointment->appointment_date->format('Y-m-d H:i') }}</p>
                            <p class="card-text"><strong>Reason:</strong> {{ $appointment->reason }}</p>

                            <!-- Action Buttons -->
                            <div class="d-flex justify-content-between mt-3">
                                <a href="{{ route('appointments.edit', $appointment) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('appointments.destroy', $appointment) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this appointment?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination Links -->
        <div class="mt-4">
            {{ $appointments->links('pagination::bootstrap-4') }}
        </div>

        <!-- Back to Main Page Button -->
        <div class="d-grid gap-2">
            <a href="{{ route('clinic.index') }}" class="btn btn-secondary btn-lg">Main Page</a>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        /* General Styling */
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

        .appointment-card {
            background-color: #f8f9fa;
            border-radius: 15px;
            border: 1px solid #e2e6ea;
        }

        .appointment-card:hover {
            background-color: #e9f5ff;
            border-color: #007bff;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            .appointment-card {
                margin-bottom: 15px;
            }
        }
    </style>
@endsection
