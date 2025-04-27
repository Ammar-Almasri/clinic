<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Http\Requests\PatientRequest;
use App\Models\Doctor;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->input('patient_name');
        $patients = Patient::when($name, function($query,$name){
            return $query->name($name);
        })
        ->latest()
        ->paginate(6);

        return view('patients', ['patients' => $patients]);
    }

    public function create()
    {
        return view('patients_form');
    }

    public function store(PatientRequest $request)
    {
        $data = $request->validated();
        $patient = Patient::create($data);

        return redirect()->route('appointments.create', ['patient' => $patient]);
    }

    public function edit(Patient $patient)
    {
        return view('patients_form', ['patient' => $patient]);
    }

    public function update(PatientRequest $request, Patient $patient)
    {
        $data = $request->validated();
        $patient->update($data);

        return redirect()->route('patients.index');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()->route('patients.index');
    }
}
