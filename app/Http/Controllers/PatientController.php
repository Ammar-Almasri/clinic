<?php
namespace App\Http\Controllers;

use App\Models\Patient;
use App\Http\Requests\PatientRequest;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->input('patient_name');
        $patients = Patient::when($name, function($query, $name) {
            return $query->name($name);
        })
        ->latest()
        ->paginate(6);

        // Modify the view reference to point to 'patients.index'
        return view('patients.index', ['patients' => $patients]);
    }

    public function create()
    {
        // Modify the view reference to point to 'patients.patients_form'
        return view('patients.patients_form');
    }

    public function store(PatientRequest $request)
    {
        $data = $request->validated();
        $patient = Patient::create($data);

        return redirect()->route('appointments.create', ['patient' => $patient]);
    }

    public function edit(Patient $patient)
    {
        // Modify the view reference to point to 'patients.patients_form'
        return view('patients.patients_form', ['patient' => $patient]);
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

    // Show only the current user's patients
    public function userIndex()
    {
        $patients = Patient::where('user_id', auth()->id())->latest()->paginate(6);
        return view('patients.index', compact('patients'));
    }

    // Show patient creation form
    public function userCreate()
    {
        return view('patients.patients_form');
    }

    // Store a new patient linked to the current user
    public function userStore(PatientRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();

        if (auth()->user()->role !== 'admin') {
            $data['email'] = auth()->user()->email;
            $data['phone'] = auth()->user()->phone;
        }

        $patient = Patient::create($data);

        return redirect()->route('user.appointments.create', ['patient' => $patient]);
    }


}
