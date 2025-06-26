<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:doctors,email,' . ($this->doctor->id ?? null),
            'phone'      => 'required|string|unique:doctors,phone,' . ($this->doctor->id ?? null),
            'speciality' => 'required|string|max:255',
        ];
    }
}
