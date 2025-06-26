<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserDashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    if (auth()->check()) {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('clinic.index');
        } else {
            return redirect()->route('user.dashboard'); // or user dashboard route
        }
    }
    return redirect()->route('login');
});

// 🔄 Home redirects to admin dashboard
Route::middleware(['auth', 'is_admin'])->prefix('clinic')->group(function () {
    Route::get('/', function () {
        return view('index');
    })->name('clinic.index');

    // Doctors
    Route::get('/doctors', [DoctorController::class, 'index'])->name('doctors.index');
    Route::get('/doctors/create', [DoctorController::class, 'create'])->name('doctors.create');
    Route::get('/doctors/{doctor}', [DoctorController::class, 'show'])->name('doctors.show');
    Route::post('/doctors', [DoctorController::class, 'store'])->name('doctors.store');
    Route::get('/doctors/edit/{doctor}', [DoctorController::class, 'edit'])->name('doctors.edit');
    Route::put('/doctors/{doctor}', [DoctorController::class, 'update'])->name('doctors.update');
    Route::delete('/doctors/{doctor}', [DoctorController::class, 'destroy'])->name('doctors.destroy');

    // Patients
    Route::get('/patients', [PatientController::class, 'index'])->name('patients.index');
    Route::get('/patients/create', [PatientController::class, 'create'])->name('patients.create');
    Route::post('/patients', [PatientController::class, 'store'])->name('patients.store');
    Route::get('/patients/edit/{patient}', [PatientController::class, 'edit'])->name('patients.edit');
    Route::put('/patients/{patient}', [PatientController::class, 'update'])->name('patients.update');
    Route::delete('/patients/{patient}', [PatientController::class, 'destroy'])->name('patients.destroy');

    // Appointments
    Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
    Route::get('/appointments/choose-patient', [AppointmentController::class, 'choosePatient'])->name('appointments.choosePatient');
    Route::get('/appointments/select-patient', [AppointmentController::class, 'selectRegisteredPatient'])->name('appointments.selectRegisteredPatient');
    Route::get('/appointments/create/{patient}', [AppointmentController::class, 'create'])->name('appointments.create');
    Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
    Route::get('/appointments/edit/{appointment}', [AppointmentController::class, 'edit'])->name('appointments.edit');
    Route::put('/appointments/{appointment}', [AppointmentController::class, 'update'])->name('appointments.update');
    Route::delete('/appointments/{appointment}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');

    // Reviews
    Route::resource('doctors.reviews', ReviewController::class)
        ->scoped(['review' => 'doctor'])
        ->only(['create', 'store']);
});

// 👤 Normal user dashboard
Route::get('/dashboard', [UserDashboardController::class, 'index'])->middleware('auth')->name('user.dashboard');

// 👥 Breeze profile management
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 🔐 Breeze auth routes (login, register, etc.)
require __DIR__.'/auth.php';
