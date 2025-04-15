@extends('layouts.app')

@section('styles')
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0; /* Adjust padding */
            height: 100vh; /* Ensure body takes full height */
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center; /* Ensure text is centered */
        }

        .container {
            max-width: 900px;
            width: 100%;
            padding: 20px;
            margin: 0 auto;
        }

        h1 {
            font-size: 36px;
            font-weight: 700;
            color: #333;
            margin-bottom: 40px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        /* Grid for buttons */
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 30px;
            max-width: 700px;
            margin: 0 auto;
        }

        /* Button styles */
        .dashboard-button {
            background-color: #4f46e5;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 12px;
            font-size: 20px;
            font-weight: 600;
            text-decoration: none;
            transition: background-color 0.3s, transform 0.3s;
        }

        /* Button hover effect */
        .dashboard-button:hover {
            background-color: #3730a3;
            transform: translateY(-5px);
        }

        /* Responsive for smaller screens */
        @media (max-width: 768px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <h1>@yield('title','Ammar Clinic Dashboard')</h1>
        <div class="dashboard-grid">
            <a href="{{ route('doctors.index') }}" class="dashboard-button">👨‍⚕️View Doctors</a>
            <a href="{{ route('patients.index') }}" class="dashboard-button">😷View Patients</a>
            <a href="{{ route('patients.create') }}" class="dashboard-button">📅Book Appointment</a>
            <a href="{{ route('appointments.index') }}" class="dashboard-button">🧾View Appointments</a>
        </div>
    </div>
@endsection
