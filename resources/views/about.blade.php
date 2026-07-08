@extends('layouts.app')

@section('title', 'About')

@section('content')

    <x-page-header
        title="About EduTrack"
        subtitle="A little bit about the platform and why it exists."
        :crumbs="['Dashboard' => '/', 'About' => '']"
    />

    <div class="et-card mb-4">
        <div class="et-card-body">
            <p class="mb-0 text-muted">
                EduTrack is a Laravel based Student and Course Management System, built to help
                small institutes manage student records and course catalogs without the overhead
                of a full ERP. It was developed as part of an internship learning project.
            </p>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-md-4">
            <div class="et-card h-100">
                <div class="et-card-body text-center">
                    <div class="et-stat-icon mx-auto mb-3" style="background:#4f46e5;">
                        <i class="bi bi-bullseye"></i>
                    </div>
                    <h5>Mission</h5>
                    <p class="text-muted small mb-0">Provide quality education management tools that are simple to use and easy to maintain.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="et-card h-100">
                <div class="et-card-body text-center">
                    <div class="et-stat-icon mx-auto mb-3" style="background:#06b6d4;">
                        <i class="bi bi-eye-fill"></i>
                    </div>
                    <h5>Vision</h5>
                    <p class="text-muted small mb-0">Digitize educational institutes of every size, starting with the fundamentals done right.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="et-card h-100">
                <div class="et-card-body text-center">
                    <div class="et-stat-icon mx-auto mb-3" style="background:#16a34a;">
                        <i class="bi bi-flag-fill"></i>
                    </div>
                    <h5>Goal</h5>
                    <p class="text-muted small mb-0">Learn and apply Laravel through a real, practical project from the ground up.</p>
                </div>
            </div>
        </div>
    </div>

@endsection
