@extends('layouts.app')
{{print_r($errors->all())}}
@section('content')
    <div class="card shadow-lg border-0 rounded-lg">
        <div class="card-body">
            <h2 class="text-center text-primary mb-4">Book Appointment</h2>

            <form action="{{ route('appointments.store') }}" method="POST">
                @csrf
                <input type="hidden" name="patient_id" value="{{ $patient->id }}">
                <div class="mb-4">
                    <label for="doctor_id" class="form-label">Doctor</label>
                    <select name="doctor_id" id="doctor_id" class="form-control form-control-lg" required>
                        <option value="">-- Select Doctor --</option>
                        @foreach ($doctors as $doctor)
                            <option value="{{ $doctor->id }}" {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>
                                Dr. {{ $doctor->first_name }} ({{ $doctor->speciality }})
                            </option>
                        @endforeach
                    </select>
                    @error('doctor_id')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-4">
                    <label for="appointment_date" class="form-label">Appointment Date</label>
                    <input type="datetime-local" name="appointment_date" id="appointment_date" class="form-control form-control-lg" required>
                    @error('appointment_date')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="reason" class="form-label">Reason</label>
                    <textarea name="reason" id="reason" class="form-control form-control-lg" rows="4" placeholder="Describe the reason (optional)"></textarea>
                    @error('reason')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-sm">Book Now</button>
                </div>
            </form>
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
        max-height: 90vh;
        overflow-y: auto;
        animation: fadeIn 0.8s ease-in-out;
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
        padding: 12px 20px;
        font-size: 1rem;
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

    @keyframes fadeIn {
        0% { opacity: 0; transform: translateY(20px); }
        100% { opacity: 1; transform: translateY(0); }
    }
</style>
@endsection

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const input = document.getElementById('appointment_date');
        const tomorrow = new Date();
        tomorrow.setDate(tomorrow.getDate() + 1); // Move to next day
        tomorrow.setMinutes(tomorrow.getMinutes() - tomorrow.getTimezoneOffset()); // Adjust timezone

        input.min = tomorrow.toISOString().slice(0, 16);
    });
</script>
@endsection
