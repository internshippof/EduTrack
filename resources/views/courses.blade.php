@extends('layouts.app')

@section('title', 'Courses')

@section('content')

    <x-page-header
        title="Courses"
        subtitle="Browse all available courses, their duration and fee structure."
        :crumbs="['Dashboard' => '/', 'Courses' => '']"
    />

    <div class="row g-3">
        @forelse($courses as $course)
            <div class="col-md-6 col-lg-4">
                <div class="et-course-card card">
                    <div class="et-course-banner">
                        <i class="bi bi-mortarboard-fill"></i>
                    </div>
                    <div class="card-body">
                        <h5 class="mb-2">{{ $course->course_name }}</h5>

                        <div class="d-flex align-items-center gap-2 mb-2 text-muted small">
                            <i class="bi bi-clock-fill"></i> {{ $course->duration }}
                            <span class="mx-1">&middot;</span>
                            <i class="bi bi-people-fill"></i> {{ $course->students_count }} enrolled
                        </div>

                        <div class="d-flex align-items-center justify-content-between mt-3">
                            <span class="et-course-price">Rs. {{ number_format($course->fee, 0) }}</span>
                            <div class="d-flex gap-2">
                                <a href="{{ route('courses.detail', $course->id) }}" class="btn btn-et-soft btn-sm">
                                    <i class="bi bi-eye-fill"></i> View Students
                                </a>
                                <a href="/students/create" class="btn btn-et-primary btn-sm">
                                    Enroll <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="et-card">
                    <div class="et-empty">
                        <i class="bi bi-journal-x"></i>
                        <div class="fw-semibold">No courses available yet</div>
                        <div class="small">Add a course to your database to see it listed here.</div>
                    </div>
                </div>
            </div>
        @endforelse
    </div>

@endsection
