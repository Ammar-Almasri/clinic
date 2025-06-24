@extends('layouts.bootstrap')

@section('content')
    <div class="container mt-5">
        <!-- Search form -->
        <div class="row mb-4">
            <div class="col-12 text-center">
                <h2 class="text-primary mb-4">Select Registered Patient</h2>
                <form action="{{ route('appointments.selectRegisteredPatient') }}" method="GET" class="d-flex justify-content-center">
                    <input type="text" name="patient_name" value="{{ request('patient_name') }}" placeholder="Search by Patient Name..." class="form-control w-50">
                    <button type="submit" class="btn btn-primary ms-2">Search</button>
                    <a href="{{ route('appointments.selectRegisteredPatient') }}" class="btn btn-secondary ms-2 d-flex align-items-center justify-content-center">Clear</a>
                </form>
            </div>
        </div>

        <!-- Patients List in Grid -->
        <div class="row">
            @forelse ($patients as $patient)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100 appointment-card">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title text-primary">{{ $patient->first_name }} {{ $patient->last_name }}</h5>
                                <p class="card-text"><strong>Email:</strong> {{ $patient->email }}</p>
                                <p class="card-text"><strong>Phone:</strong> {{ $patient->phone }}</p>
                            </div>

                            <a href="{{ route('appointments.create', $patient) }}" class="btn btn-success mt-3">📅 Book Appointment</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p>No patients found.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $patients->withQueryString()->links('pagination::bootstrap-4') }}
        </div>

        <!-- Back Button -->
        <div class="d-grid gap-2 mt-4">
            <a href="{{ route('clinic.index') }}" class="btn btn-secondary btn-lg">Main Page</a>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        /* Buttons */
        .btn-primary, .btn-secondary, .btn-success {
            border-radius: 30px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover, .btn-secondary:hover, .btn-success:hover {
            background-color: #0056b3;
        }

        /* Card */
        .card {
            border-radius: 15px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        /* Pagination */
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

        /* Form control */
        .form-control {
            border-radius: 30px;
            padding: 10px 15px;
            box-shadow: none;
            border: 1px solid #ddd;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0,123,255,0.25);
        }

        /* Appointment card style */
        .appointment-card {
            background-color: #f8f9fa;
            border-radius: 15px;
            border: 1px solid #e2e6ea;
        }

        .appointment-card:hover {
            background-color: #e9f5ff;
            border-color: #007bff;
        }

        /* Responsive */
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
