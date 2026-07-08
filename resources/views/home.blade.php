@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <div class="et-hero mb-4">
        <h1 class="mb-2">Welcome to EduTrack 👋</h1>
        <p class="mb-4">Here's a quick overview of your students, courses and everything else happening in EduTrack today.</p>
        <a href="/students" class="btn btn-light fw-semibold me-2">
            <i class="bi bi-people-fill me-1"></i> Manage Students
        </a>
        <a href="/courses" class="btn btn-outline-light fw-semibold">
            <i class="bi bi-journal-bookmark-fill me-1"></i> View Courses
        </a>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-lg-3">
            <x-stat-card icon="bi-people-fill" label="Total Students" :value="$studentCount ?? 0" color="#4f46e5" />
        </div>
        <div class="col-sm-6 col-lg-3">
            <x-stat-card icon="bi-journal-bookmark-fill" label="Active Courses" :value="$courseCount ?? 0" color="#06b6d4" />
        </div>
        <div class="col-sm-6 col-lg-3">
            <x-stat-card icon="bi-graph-up-arrow" label="Enrollments Today" :value="$enrollToday ?? 0" color="#16a34a" />
        </div>
        <div class="col-sm-6 col-lg-3">
            <x-stat-card icon="bi-star-fill" label="Satisfaction" value="98%" color="#f59e0b" />
        </div>
    </div>

    <div class="row g-3">
        <div class="col-lg-8">
            <div class="et-card h-100">
                <div class="et-card-header">
                    <h5>Quick Actions</h5>
                </div>
                <div class="et-card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <a href="/students/create" class="et-card p-3 d-flex align-items-center gap-3 text-decoration-none h-100">
                                <div class="et-stat-icon" style="background:#4f46e5;"><i class="bi bi-person-plus-fill"></i></div>
                                <div>
                                    <div class="fw-bold text-dark">Add New Student</div>
                                    <div class="et-topbar-sub">Register a student to a course</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="/students" class="et-card p-3 d-flex align-items-center gap-3 text-decoration-none h-100">
                                <div class="et-stat-icon" style="background:#06b6d4;"><i class="bi bi-table"></i></div>
                                <div>
                                    <div class="fw-bold text-dark">View All Students</div>
                                    <div class="et-topbar-sub">Browse, edit or remove records</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="/courses" class="et-card p-3 d-flex align-items-center gap-3 text-decoration-none h-100">
                                <div class="et-stat-icon" style="background:#16a34a;"><i class="bi bi-journal-plus"></i></div>
                                <div>
                                    <div class="fw-bold text-dark">Browse Courses</div>
                                    <div class="et-topbar-sub">See fees and durations</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="/contact" class="et-card p-3 d-flex align-items-center gap-3 text-decoration-none h-100">
                                <div class="et-stat-icon" style="background:#f59e0b;"><i class="bi bi-headset"></i></div>
                                <div>
                                    <div class="fw-bold text-dark">Get Support</div>
                                    <div class="et-topbar-sub">Reach out to our team</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="et-card h-100">
                <div class="et-card-header">
                    <h5>About EduTrack</h5>
                </div>
                <div class="et-card-body">
                    <p class="text-muted small mb-3">
                        EduTrack is a lightweight Student &amp; Course Management System built with
                        Laravel and Bootstrap 5 &mdash; designed to make institute administration simple.
                    </p>
                    <ul class="list-unstyled small d-flex flex-column gap-2 mb-0">
                        <li><i class="bi bi-check-circle-fill text-primary me-2"></i>Full student CRUD</li>
                        <li><i class="bi bi-check-circle-fill text-primary me-2"></i>Course catalog</li>
                        <li><i class="bi bi-check-circle-fill text-primary me-2"></i>Clean, responsive UI</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
