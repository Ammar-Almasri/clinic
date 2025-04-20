<?php

use App\Http\Requests\AppointmentRequest;
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

Route::get('/clinic/doctors', function(){

    return view('doctors',['doctors'=>Doctor::latest()->paginate(3)]);

})->name('doctors.index');

Route::get('/clinic/patients', function(){
    return view('patients',['patients'=>Patient::latest()->paginate(3)]);
})->name('patients.index');

Route::get('/clinic/appointments', function(){
    return view('appointments',['appointments'=>Appointment::latest()->paginate(3)]);

})->name('appointments.index');

Route::view('clinic/patients/create','patients_form')->name('patients.create');

Route::get('clinic/appointments/create/{patient}',function(Patient $patient){

    return view('appointments_form',['doctors'=>Doctor::all(),'patient'=>$patient]);
})->name('appointments.create');

Route::post('/clinic/patients',function(PatientRequest $req){

    $data = $req->validated();
    $patient = Patient::create($data);

    return redirect()->route('appointments.create', ['patient' => $patient]);
})->name('patients.store');

Route::post('/clinic/appointments',function(AppointmentRequest $req){

    $data = $req->validated();
    Appointment::create($data);

    return redirect()->route('appointments.index');
})->name('appointments.store');

Route::get('/clinic/appointments/edit/{appointment}', function(Appointment $appointment){

    return view('appointments_form',['doctors'=>Doctor::all(),'appointment' => $appointment]);
})->name('appointments.edit');

Route::put('/clinic/appointments/{appointment}',function(AppointmentRequest $req, Appointment $appointment){

    $data = $req->validated();
    $appointment->update($data);

    return redirect()->route('appointments.index');
})->name('appointments.update');

Route::get('clinic/patients/edit/{patient}',function(Patient $patient){

    return view('patients_form',['patient'=>$patient]);
})->name('patients.edit');

Route::put('/clinic/patients/{patient}',function(PatientRequest $req, Patient $patient){

    $data = $req->validated();
    $patient->update($data);

    return redirect()->route('patients.index');
})->name('patients.update');
