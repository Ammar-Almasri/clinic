<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Doctor $doctor)
    {
        return view('doctors.reviews.create', ['doctor' => $doctor]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Doctor $doctor)
    {
        $validated = $request->validate([
            'rating' => 'required|integer|between:1,5',  // Rating must be between 1 and 5
            'comment' => 'required|string|min:10',  // Comment must be at least 10 characters long
        ]);
        $validated = array_merge($validated, ['patient_id' => 31]);

        $doctor->reviews()->create($validated);

        return redirect()->route('doctors.show', ['doctor' => $doctor]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
