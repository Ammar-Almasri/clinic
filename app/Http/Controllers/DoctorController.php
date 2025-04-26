<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Http\Requests\DoctorRequest;

class DoctorController extends Controller
{
    public function index()
    {
        return view('doctors', ['doctors' => Doctor::latest()->paginate(3)]);
    }

    public function create()
    {
        return view('doctors_form');
    }

    public function store(DoctorRequest $request)
    {
        $data = $request->validated();
        Doctor::create($data);

        return redirect()->route('doctors.index');
    }

    public function edit(Doctor $doctor)
    {
        return view('doctors_form', ['doctor' => $doctor]);
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
}
