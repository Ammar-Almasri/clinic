<x-app-layout>
    @push('styles')
        {{-- Bootstrap CSS --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

        <style>
            body {
                font-family: 'Inter', sans-serif;
                background-color: #f4f6f9;
                margin: 0;
                padding: 0;
                min-height: 100vh;
                text-align: center;
            }

            .container {
                max-width: 900px;
                width: 100%;
                padding: 20px;
                margin: 40px auto;
                background: #ffffff;
                border-radius: 15px;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
                animation: fadeIn 0.8s ease-in-out;
            }

            h1 {
                font-size: 36px;
                font-weight: 700;
                color: #333;
                margin-bottom: 40px;
                text-transform: uppercase;
                letter-spacing: 2px;
                transition: color 0.3s;
            }

            h1:hover {
                color: #4f46e5;
            }

            .dashboard-grid {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 30px;
                max-width: 700px;
                margin: 0 auto 40px;
            }

            .dashboard-button {
                background-color: #4f46e5;
                color: white;
                padding: 20px;
                text-align: center;
                border-radius: 12px;
                font-size: 20px;
                font-weight: 600;
                text-decoration: none;
                transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                display: inline-block;
            }

            .dashboard-button:hover {
                background-color: #3730a3;
                transform: translateY(-5px);
                box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
            }

            .dashboard-button:active {
                transform: translateY(2px);
            }

            @media (max-width: 768px) {
                .dashboard-grid {
                    grid-template-columns: 1fr;
                    gap: 20px;
                    margin-bottom: 30px;
                }
            }

            @keyframes fadeIn {
                0% {
                    opacity: 0;
                    transform: translateY(20px);
                }
                100% {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .logout-container {
                max-width: 700px;
                margin: 0 auto;
                text-align: center;
            }
        </style>
    @endpush

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ammar Clinic Dashboard
        </h2>
    </x-slot>

    <div class="container">
        <div class="dashboard-grid">
            <a href="{{ route('doctors.index') }}" class="dashboard-button">👨‍⚕️ View Doctors</a>
            <a href="{{ route('patients.index') }}" class="dashboard-button">😷 View Patients</a>
            <a href="{{ route('appointments.choosePatient') }}" class="dashboard-button">📅 Book Appointment</a>
            <a href="{{ route('appointments.index') }}" class="dashboard-button">🧾 View Appointments</a>
        </div>
    </div>
</x-app-layout>
