@extends('layouts.app')

@section('title', 'Students')

@section('content')

    <x-page-header
        title="Students"
        subtitle="Manage all enrolled students in one place."
        :crumbs="['Dashboard' => '/', 'Students' => '']"
    >
        <x-slot:actions>
            <a href="/students/create" class="btn btn-et-primary">
                <i class="bi bi-person-plus-fill me-1"></i> Add Student
            </a>
        </x-slot:actions>
    </x-page-header>

    <x-alert />

    <div class="et-card">
        <div class="et-card-header">
            <h5><i class="bi bi-people-fill me-2 text-primary"></i>All Students <span class="et-badge ms-2">{{ $students->total() }}</span></h5>

            <form action="{{ route('students.index') }}" method="GET" class="et-input-icon-group" style="min-width:260px;">
                <i class="bi bi-search"></i>
                <input type="text" name="search" value="{{ $search }}" class="form-control" placeholder="Search by name or email...">
            </form>
        </div>

        <div class="table-responsive">
            <table class="table et-table" id="studentsTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Student</th>
                        <th>Phone</th>
                        <th>Course</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($students as $student)
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
                            <td>
                                <span class="et-badge">
                                    <i class="bi bi-journal-bookmark-fill"></i>
                                    {{ $student->course->course_name ?? 'Unassigned' }}
                                </span>
                            </td>
                            <td class="text-end">
                                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-et-soft btn-sm">
                                    <i class="bi bi-pencil-fill"></i> Edit
                                </a>
                                <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger btn-sm" onclick="return confirm('Delete this student?')">
                                        <i class="bi bi-trash3-fill"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">
                                <div class="et-empty">
                                    <i class="bi bi-people"></i>
                                    <div class="fw-semibold">No students found</div>
                                    <div class="small">
                                        @if($search)
                                            No results for "{{ $search }}". Try a different name or email.
                                        @else
                                            Add your first student to get started.
                                        @endif
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Day 15: pagination links (Bootstrap 5 styled, built into Laravel core) --}}
        @if($students->hasPages())
            <div class="d-flex justify-content-center py-3">
                {{ $students->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>

@endsection
