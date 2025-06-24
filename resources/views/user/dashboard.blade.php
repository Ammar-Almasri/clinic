<x-app-layout>
    @push('styles')
        {{-- Bootstrap CSS --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    @endpush

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            User Dashboard
        </h2>
    </x-slot>

    <div class="container mt-5 text-center">
        <h1 class="text-primary">Welcome to Your Dashboard</h1>
        <p class="mt-3">This is the normal user dashboard.</p>
    </div>
</x-app-layout>
