@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh; background-color: #f1f6f9;">
    <div class="card shadow-lg border-0 rounded-lg w-100" style="max-width: 900px; height: auto; overflow-y: auto;">
        <div class="card-body p-4">
            <h2 class="text-center text-primary mb-4">Patient Details</h2>

            @foreach ($patients as $patient)
                <div class="patient-card mb-4 p-3 d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="mb-1">{{ $patient->first_name }} {{ $patient->last_name }}</h4>
                        <p class="mb-1"><strong>Email:</strong> {{ $patient->email }}</p>
                        <p class="mb-1"><strong>Phone:</strong> {{ $patient->phone }}</p>
                    </div>
                    <div class="d-flex align-items-center">
                        <a href="{{ route('patients.edit', $patient) }}" class="btn btn-sm btn-primary ms-2">Edit</a>
                    </div>
                </div>
            @endforeach



            <div class="mt-4">
                {{ $patients->links('pagination::bootstrap-4') }}
            </div>

            <div class="d-grid gap-2">
                <a href="{{ route('clinic.index') }}" class="btn btn-secondary btn-lg">Main Page</a>
            </div>

        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    body, html {
        margin: 0;
        padding: 0;
        height: 100%;
        background-color: #f1f6f9;
        font-family: 'Poppins', sans-serif;
    }

    .patient-card {
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
        border-radius: 10px;
    }

    .container {
        padding-left: 0 !important;
        padding-right: 0 !important;
        margin: 0 auto;
    }

    .patient-card:hover {
        background-color: #e9f5ff;
        border-color: #007bff;
    }

    .pagination .page-link {
        font-size: 1rem;
        padding: 0.375rem 0.75rem;
        display: inline-block;
        color: #007bff;
        background-color: white;
        border: 1px solid #ddd;
    }

    .container {
        padding-left: 0 !important;
        padding-right: 0 !important;
        margin: 0 auto;
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

    .pagination .page-link:hover {
        background-color: #f1f1f1;
    }

    .card {
        max-height: 90vh; /* Control height */
        overflow-y: auto;
        animation: fadeIn 0.8s ease-in-out;
    }

    @keyframes fadeIn {
        0% { opacity: 0; transform: translateY(20px); }
        100% { opacity: 1; transform: translateY(0); }
    }

</style>
@endsection
