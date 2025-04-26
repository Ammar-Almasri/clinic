<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Http\Requests\PatientRequest;
use App\Models\Doctor;

class PatientController extends Controller
{
    public function index()
    {
        return view('patients', ['patients' => Patient::latest()->paginate(3)]);
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
