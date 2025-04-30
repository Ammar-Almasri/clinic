<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use App\Http\Requests\AppointmentRequest;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->input('patient_name');
        $appointments = Appointment::when($name, function($query,$name){
            return $query->name($name);
        })
        ->latest()
        ->paginate(6);

        return view('appointments.index', ['appointments' => $appointments]);
    }

    public function create(Patient $patient)
    {
        return view('appointments.appointments_form', [
            'doctors' => Doctor::all(),
            'patient' => $patient
        ]);
    }

    public function store(AppointmentRequest $request)
    {
        $data = $request->validated();
        Appointment::create($data);

        return redirect()->route('appointments.index');
    }

    public function edit(Appointment $appointment)
    {
        return view('appointments.appointments_form', [
            'doctors' => Doctor::all(),
            'appointment' => $appointment
        ]);
    }

    public function update(AppointmentRequest $request, Appointment $appointment)
    {
        $data = $request->validated();
        $appointment->update($data);

        return redirect()->route('appointments.index');
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return redirect()->route('appointments.index');
    }
}
