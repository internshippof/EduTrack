@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')

    <x-page-header
        title="Admin Dashboard"
        subtitle="Overview of the whole EduTrack system."
        :crumbs="['Dashboard' => '/', 'Admin' => '']"
    />

    <x-alert />

    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-lg-3">
            <x-stat-card icon="bi-person-badge-fill" label="Total Users" :value="$totalUsers" color="#4f46e5" />
        </div>
        <div class="col-sm-6 col-lg-3">
            <x-stat-card icon="bi-shield-lock-fill" label="Admins" :value="$totalAdmins" color="#e11d48" />
        </div>
        <div class="col-sm-6 col-lg-3">
            <x-stat-card icon="bi-people-fill" label="Total Students" :value="$totalStudents" color="#06b6d4" />
        </div>
        <div class="col-sm-6 col-lg-3">
            <x-stat-card icon="bi-journal-bookmark-fill" label="Total Courses" :value="$totalCourses" color="#16a34a" />
        </div>
    </div>

    <div class="et-card">
        <div class="et-card-header">
            <h5><i class="bi bi-clock-history me-2 text-primary"></i>Recently Registered Accounts</h5>
            <a href="{{ route('admin.users') }}" class="btn btn-et-soft btn-sm">
                Manage All Users <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>

        <div class="table-responsive">
            <table class="table et-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Joined</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentUsers as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if($user->role === 'admin')
                                    <span class="et-badge" style="background:#fee2e2;color:#e11d48;">
                                        <i class="bi bi-shield-lock-fill"></i> Admin
                                    </span>
                                @else
                                    <span class="et-badge">
                                        <i class="bi bi-person-fill"></i> Student
                                    </span>
                                @endif
                            </td>
                            <td class="text-muted">{{ $user->created_at->diffForHumans() }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="4">No users yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
