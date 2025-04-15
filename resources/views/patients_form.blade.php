@extends('layouts.app')

@section('content')
    <div class="card shadow-lg border-0 rounded-lg">
        <div class="card-body">
            <h2 class="text-center text-primary mb-4">Patient Registration</h2>

            <form action="{{ route('patients.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" name="first_name" id="first_name" class="form-control form-control-lg" placeholder="Enter first name" required>
                    @error('first_name')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" name="last_name" id="last_name" class="form-control form-control-lg" placeholder="Enter last name" required>
                    @error('last_name')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Enter email" required>
                    @error('email')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control form-control-lg" placeholder="Enter phone number" required>
                    @error('phone')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-sm">Register</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('styles')
<style>
    /* Remove default margin and padding for the body */
    body, html {
        margin: 0;
        padding: 0;
        height: 100%;
        background-color: #f1f6f9;
        font-family: 'Poppins', sans-serif;
    }

    /* Center the container and remove extra space at the top */
    body {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .card {
        background-color: #ffffff;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        max-height: 90vh; /* Prevent overflow */
        overflow-y: auto;
    }

    .card-body {
        padding: 20px;
    }

    h2 {
        font-size: 2rem;
        font-weight: bold;
        color: #007bff;
        margin-bottom: 30px;
    }

    .form-control {
        border-radius: 10px;
        padding: 15px;
        font-size: 1.1rem;
        border: 1px solid #ddd;
        margin-bottom: 15px;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 10px rgba(0, 123, 255, 0.2);
    }

    .form-label {
        font-size: 1.1rem;
        color: #333;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        border-radius: 10px;
        padding: 12px 20px; /* Smaller padding */
        font-size: 1rem; /* Adjust font size */
        transition: background-color 0.3s;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    .text-danger {
        font-size: 0.9rem;
        margin-top: 5px;
    }

    .d-grid {
        display: grid;
        gap: 15px;
    }

    /* Subtle animation for the card */
    .card {
        animation: fadeIn 0.8s ease-in-out;
    }

    @keyframes fadeIn {
        0% { opacity: 0; transform: translateY(20px); }
        100% { opacity: 1; transform: translateY(0); }
    }
</style>
@endsection
