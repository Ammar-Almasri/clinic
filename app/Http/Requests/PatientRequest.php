<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
public function rules()
{
    $rules = [
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
    ];

    if (auth()->user()?->role === 'admin') {
        $rules['email'] = 'required|email';
        $rules['phone'] = 'required|string|max:20';
    } else {
        // For normal users, no need to validate email & phone inputs
        // because you will assign them from user data
        $rules['email'] = 'nullable';
        $rules['phone'] = 'nullable';
    }

    return $rules;
}


}
