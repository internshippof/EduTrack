@extends('layouts.auth')

@section('title', 'Login')

@section('content')

    <h4 class="mb-1">Welcome back</h4>
    <p class="text-muted mb-4">Login to manage your students and courses.</p>

    <x-alert />

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <x-form-input
            name="email"
            label="Email Address"
            type="email"
            icon="bi-envelope-fill"
            required
            autofocus
        />

        <x-form-input
            name="password"
            label="Password"
            type="password"
            icon="bi-lock-fill"
            required
        />

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="remember" id="remember">
            <label class="form-check-label" for="remember">Remember me</label>
        </div>

        <button type="submit" class="btn btn-et-primary w-100">
            <i class="bi bi-box-arrow-in-right me-1"></i> Login
        </button>
    </form>

    <p class="text-center text-muted mt-4 mb-0">
        Don't have an account? <a href="{{ route('register') }}">Register here</a>
    </p>

@endsection
