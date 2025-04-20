@extends('layouts.app')

@section('content')
    <div class="card shadow-lg border-0 rounded-lg">
        <div class="card-body">
            <h2 class="text-center text-primary mb-4">
                @isset($doctor)
                    Update Doctor Details
                @else
                    Doctor Registration
                @endisset
            </h2>

            <form
                action="{{ isset($doctor) ? route('doctors.update', $doctor->id) : route('doctors.store') }}"
                method="POST">

                @csrf
                @isset($doctor)
                    @method('PUT')
                @endisset

                <div class="mb-4">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" name="first_name" id="first_name" class="form-control form-control-lg"
                        placeholder="Enter first name" required value="{{ old('first_name', isset($doctor) ? $doctor->first_name : '') }}">
                    @error('first_name')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" name="last_name" id="last_name" class="form-control form-control-lg"
                        placeholder="Enter last name" required value="{{ old('last_name', isset($doctor) ? $doctor->last_name : '') }}">
                    @error('last_name')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control form-control-lg"
                        placeholder="Enter email" required value="{{ old('email', isset($doctor) ? $doctor->email : '') }}">
                    @error('email')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control form-control-lg"
                        placeholder="Enter phone number" required value="{{ old('phone', isset($doctor) ? $doctor->phone : '') }}">
                    @error('phone')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="speciality" class="form-label">Speciality</label>
                    <input type="text" name="speciality" id="speciality" class="form-control form-control-lg"
                        placeholder="Enter speciality" required value="{{ old('speciality', isset($doctor) ? $doctor->speciality : '') }}">
                    @error('speciality')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-sm">
                        @isset($doctor)
                            Update
                        @else
                            Register
                        @endisset
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('styles')
    @yield('styles')
@endsection
