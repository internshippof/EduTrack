@extends('layouts.app')

@section('title', $course->course_name)

@section('content')

    <x-page-header
        title="{{ $course->course_name }}"
        subtitle="Duration: {{ $course->duration }} &middot; Fee: Rs. {{ number_format($course->fee, 0) }}"
        :crumbs="['Dashboard' => '/', 'Courses' => '/courses', $course->course_name => '']"
    >
        <x-slot:actions>
            <a href="/courses" class="btn btn-et-soft">
                <i class="bi bi-arrow-left me-1"></i> Back to Courses
            </a>
        </x-slot:actions>
    </x-page-header>

    <div class="et-card">
        <div class="et-card-header">
            <h5>
                <i class="bi bi-people-fill me-2 text-primary"></i>
                Enrolled Students
                {{-- $course->students comes from Course::hasMany(Student::class) --}}
                <span class="et-badge ms-2">{{ $course->students->count() }}</span>
            </h5>
        </div>

        <div class="table-responsive">
            <table class="table et-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Student</th>
                        <th>Phone</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Looping over the related students, no extra query per row --}}
                    @forelse($course->students as $student)
                        <tr>
                            <td class="text-muted">{{ $student->id }}</td>
                            <td>
                                <div class="et-person">
                                    <img src="{{ $student->photo_url }}" class="et-person-avatar" style="object-fit:cover;" alt="{{ $student->name }}">
                                    <div>
                                        <div class="et-person-name">{{ $student->name }}</div>
                                        <div class="et-person-sub">{{ $student->email }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $student->phone }}</td>
                            <td class="text-end">
                                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-et-soft btn-sm">
                                    <i class="bi bi-pencil-fill"></i> Edit
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">
                                <div class="et-empty">
                                    <i class="bi bi-people"></i>
                                    <div class="fw-semibold">No students enrolled yet</div>
                                    <div class="small">Add a student and assign them to this course.</div>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
