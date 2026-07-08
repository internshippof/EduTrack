@extends('layouts.auth')

@section('title', 'Register')

@section('content')

    <h4 class="mb-1">Create an account</h4>
    <p class="text-muted mb-4">Sign up to get started with EduTrack.</p>

    <x-alert />

    <form action="{{ route('register') }}" method="POST">
        @csrf

        <x-form-input
            name="name"
            label="Full Name"
            type="text"
            icon="bi-person-fill"
            required
            autofocus
        />

        <x-form-input
            name="email"
            label="Email Address"
            type="email"
            icon="bi-envelope-fill"
            required
        />

        <x-form-input
            name="password"
            label="Password"
            type="password"
            icon="bi-lock-fill"
            required
        />

        <x-form-input
            name="password_confirmation"
            label="Confirm Password"
            type="password"
            icon="bi-lock-fill"
            required
        />

        <button type="submit" class="btn btn-et-primary w-100">
            <i class="bi bi-person-plus-fill me-1"></i> Register
        </button>
    </form>

    <p class="text-center text-muted mt-4 mb-0">
        Already have an account? <a href="{{ route('login') }}">Login here</a>
    </p>

@endsection
