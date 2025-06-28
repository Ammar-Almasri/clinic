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

        if(auth()->user()->role === 'admin')
            return redirect()->route('appointments.index');

        return redirect()->route('user.appointments.view');
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

    public function choosePatient()
    {
        return view('appointments.choose_patient');
    }

    public function selectRegisteredPatient(Request $request)
    {
        $name = $request->input('patient_name');
        $patients = Patient::when($name, function($query, $name) {
            return $query->name($name);
        })
        ->latest()
        ->paginate(6);

        // Modify the view reference to point to 'patients.index'
        return view('appointments.select_registered_patient', compact('patients'));
    }

    public function selectUserRegisteredPatient(Request $request)
    {
        $name = $request->input('patient_name');

        $patients = Patient::where('email', auth()->user()->email)
            ->when($name, function ($query, $name) {
                return $query->name($name);
            })
            ->latest()
            ->paginate(6);

        return view('appointments.select_registered_patient', compact('patients'));
    }

    public function viewUserAppointments()
    {
        $userEmail = auth()->user()->email;

        $appointments = Appointment::whereHas('patient', function ($query) use ($userEmail) {
            $query->where('email', $userEmail);
        })
        ->with(['doctor', 'patient'])
        ->latest()
        ->paginate(6);

        return view('appointments.index', compact('appointments'));
    }


}
