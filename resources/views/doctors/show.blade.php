{{-- resources/views/doctors/show.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="mb-4">
        <a href="{{ route('doctors.index') }}" class="btn btn-outline-primary">
            <i class="bi bi-arrow-left"></i> Back to Doctors
        </a>
    </div>

    <div class="card shadow-sm mb-5">
        <div class="card-body text-center">
            {{-- Doctor Image --}}
            <div class="mb-4">
                <img src="{{ asset('images/' . $doctor->first_name . '.jpg') }}"
                    alt="Doctor Image"
                    class="rounded-circle shadow"
                    style="width: 150px; height: 150px; object-fit: cover;">

            </div>

            <h1 class="card-title mb-4">{{ $doctor->first_name }} {{ $doctor->last_name }}</h1>

            <div class="mb-3">
                <i class="bi bi-envelope-fill me-2 text-primary"></i>
                <strong>Email:</strong> {{ $doctor->email }}
            </div>

            <div class="mb-3">
                <i class="bi bi-telephone-fill me-2 text-success"></i>
                <strong>Phone:</strong> {{ $doctor->phone }}
            </div>

            <div class="mb-0">
                <i class="bi bi-heart-pulse-fill me-2 text-danger"></i>
                <strong>Speciality:</strong> {{ $doctor->speciality }}
            </div>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <h3 class="card-title mb-4">Patient Reviews</h3>

            @if($doctor->reviews->count())
                <ul class="list-group list-group-flush">
                    @foreach($doctor->reviews as $review)
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <strong>{{ $review->patient_name }}</strong>
                                <div>
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $review->rating)
                                            <i class="bi bi-star-fill text-warning"></i>
                                        @else
                                            <i class="bi bi-star text-warning"></i>
                                        @endif
                                    @endfor
                                </div>
                            </div>
                            <p class="mt-2 mb-0 text-muted">{{ $review->comment }}</p>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-muted">No reviews yet for this doctor.</p>
            @endif
        </div>
    </div>
</div>
@endsection
