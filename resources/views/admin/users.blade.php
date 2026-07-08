@extends('layouts.app')

@section('title', 'Manage Users')

@section('content')

    <x-page-header
        title="Manage Users"
        subtitle="Assign or remove admin permissions for any account."
        :crumbs="['Dashboard' => '/', 'Admin' => route('admin.dashboard'), 'Users' => '']"
    />

    <x-alert />

    <div class="et-card">
        <div class="et-card-header">
            <h5><i class="bi bi-person-badge-fill me-2 text-primary"></i>All Users <span class="et-badge ms-2">{{ $users->count() }}</span></h5>
        </div>

        <div class="table-responsive">
            <table class="table et-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Current Role</th>
                        <th class="text-end">Change Role</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td class="text-muted">{{ $user->id }}</td>
                            <td>
                                <div class="et-person">
                                    <div class="et-person-avatar">{{ strtoupper(substr($user->name, 0, 2)) }}</div>
                                    <div class="et-person-name">
                                        {{ $user->name }}
                                        @if($user->id === auth()->id())
                                            <span class="text-muted small">(you)</span>
                                        @endif
                                    </div>
                                </div>
                            </td>
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
                            <td class="text-end">
                                <form action="{{ route('admin.users.role', $user->id) }}" method="POST" class="d-flex justify-content-end gap-2">
                                    @csrf
                                    @method('PUT')
                                    <select name="role" class="form-select form-select-sm" style="width:auto;">
                                        <option value="student" @selected($user->role === 'student')>Student</option>
                                        <option value="admin" @selected($user->role === 'admin')>Admin</option>
                                    </select>
                                    <button type="submit" class="btn btn-et-soft btn-sm">
                                        <i class="bi bi-check-lg"></i> Update
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5">No users yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
