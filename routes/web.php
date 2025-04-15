<?php

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
    return "doctors here";
})->name('doctors.index');

Route::get('/clinic/patients', function(){
    return "patients here";
})->name('patients.index');

Route::get('/clinic/appointments', function(){
    return "appointments here";
})->name('appointments.index');

Route::view('clinic/patients/create','patients_form')->name('patients.create');

Route::view('clinic/appointments/create/{patient}','appointments_form')->name('appointments.create');
