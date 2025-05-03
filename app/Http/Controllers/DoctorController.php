<?php
namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Http\Requests\DoctorRequest;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index(Request $request)
    {
        $speciality = $request->input('doctor_speciality');
        $doctors = Doctor::when($speciality, function($query, $speciality) {
            return $query->speciality($speciality);
        })
        ->popular()
        ->highestRated()
        ->latest() // Apply the latest method before pagination
        ->paginate(3); // Paginate the results
        return view('doctors.index', ['doctors' => $doctors]); // Changed view path to doctors.index
    }

    public function create()
    {
        return view('doctors.doctors_form'); // Changed view path to doctors.create
    }

    public function store(DoctorRequest $request)
    {
        $data = $request->validated();
        Doctor::create($data);

        return redirect()->route('doctors.index');
    }

    public function edit(Doctor $doctor)
    {
        return view('doctors.doctors_form', ['doctor' => $doctor]); // Changed view path to doctors.edit
    }

    public function update(DoctorRequest $request, Doctor $doctor)
    {
        $data = $request->validated();
        $doctor->update($data);

        return redirect()->route('doctors.index');
    }

    public function destroy(Doctor $doctor)
    {
        $doctor->delete();

        return redirect()->route('doctors.index');
    }

    public function show(Doctor $doctor)
    {
        $doctor = $doctor->load(['reviews' => fn($query) => $query->latest()]);
        return view('doctors.show', ['doctor' => $doctor]); // No change here, this already refers to doctors.show
    }
}
