@extends('layouts.bootstrap')

@section('title', 'Leave a Review')

@section('content')
<div class="d-flex justify-content-center align-items-center mt-5">
    <div class="card shadow-lg border-0" style="width: 100%; max-width: 700px;">
        <div class="card-body">
            <!-- Doctor Header -->
            <div class="text-center mb-4">
                <img src="{{ asset('images/' . $doctor->first_name . '.jpg') }}"
                     alt="Dr. {{ $doctor->first_name }}'s photo"
                     class="rounded-circle shadow"
                     style="width: 120px; height: 120px; object-fit: cover;">
                <h3 class="mt-3 mb-0">Dr. {{ $doctor->first_name }} {{ $doctor->last_name }}</h3>
                <p class="text-muted mb-0">{{ $doctor->speciality }}</p>
            </div>

            <!-- Review Form -->
            <form action="{{ route('doctors.reviews.store', $doctor) }}" method="POST" class="mt-4">
                @csrf

                <!-- Hidden doctor ID -->
                <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">

                <!-- Rating -->
                <div class="mb-3">
                    <label for="rating" class="form-label">Rating</label>
                    <select name="rating" id="rating" class="form-select" required>
                        <option value="" disabled selected>Select rating</option>
                        @for ($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}">{{ $i }} {{ $i == 1 ? 'Star' : 'Stars' }}</option>
                        @endfor
                    </select>
                </div>

                <!-- Comment -->
                <div class="mb-3">
                    <label for="comment" class="form-label">Your Review</label>
                    <textarea name="comment" id="comment" rows="5" class="form-control" placeholder="Write something..." required></textarea>
                </div>

                <!-- Submit -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="bi bi-send me-1"></i> Submit Review
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
