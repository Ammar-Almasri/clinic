<?php

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Requests\AppointmentRequest;
use App\Http\Requests\DoctorRequest;
use App\Http\Requests\PatientRequest;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',function (){
    return redirect()->route('clinic.index');
});

Route::get('/clinic', function () {
    return view('index');
})->name('clinic.index');

Route::get('/clinic/doctors', [DoctorController::class, 'index'])->name('doctors.index');
Route::get('/clinic/doctors/create', [DoctorController::class, 'create'])->name('doctors.create');
Route::get('/clinic/doctors/{doctor}', [DoctorController::class, 'show'])->name('doctors.show');
Route::post('/clinic/doctors', [DoctorController::class, 'store'])->name('doctors.store');
Route::get('/clinic/doctors/edit/{doctor}', [DoctorController::class, 'edit'])->name('doctors.edit');
Route::put('/clinic/doctors/{doctor}', [DoctorController::class, 'update'])->name('doctors.update');
Route::delete('/clinic/doctors/{doctor}', [DoctorController::class, 'destroy'])->name('doctors.destroy');

Route::get('/clinic/patients', [PatientController::class, 'index'])->name('patients.index');
Route::get('/clinic/patients/create', [PatientController::class, 'create'])->name('patients.create');
Route::post('/clinic/patients', [PatientController::class, 'store'])->name('patients.store');
Route::get('/clinic/patients/edit/{patient}', [PatientController::class, 'edit'])->name('patients.edit');
Route::put('/clinic/patients/{patient}', [PatientController::class, 'update'])->name('patients.update');
Route::delete('/clinic/patients/{patient}', [PatientController::class, 'destroy'])->name('patients.destroy');

Route::get('/clinic/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
Route::get('/clinic/appointments/create/{patient}', [AppointmentController::class, 'create'])->name('appointments.create');
Route::post('/clinic/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
Route::get('/clinic/appointments/edit/{appointment}', [AppointmentController::class, 'edit'])->name('appointments.edit');
Route::put('/clinic/appointments/{appointment}', [AppointmentController::class, 'update'])->name('appointments.update');
Route::delete('/clinic/appointments/{appointment}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');
