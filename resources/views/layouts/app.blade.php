<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'EduTrack') | EduTrack</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet">

    @stack('styles')
</head>
<body>

<div class="et-shell">

    {{-- Sidebar --}}
    <aside class="et-sidebar" id="etSidebar">
        <div class="et-sidebar-brand">
            <span class="et-logo-icon"><i class="bi bi-mortarboard-fill"></i></span>
            EduTrack
        </div>

        <div class="et-sidebar-section-label">Main</div>
        <ul class="et-nav">
            <x-nav-link href="/" icon="bi-speedometer2" :active="request()->is('/')">Dashboard</x-nav-link>
            <x-nav-link href="/students" icon="bi-people-fill" :active="request()->is('students*')">Students</x-nav-link>
            <x-nav-link href="/courses" icon="bi-journal-bookmark-fill" :active="request()->is('courses')">Courses</x-nav-link>
        </ul>

        <div class="et-sidebar-section-label">Info</div>
        <ul class="et-nav">
            <x-nav-link href="/about" icon="bi-info-circle-fill" :active="request()->is('about')">About</x-nav-link>
            <x-nav-link href="/contact" icon="bi-envelope-fill" :active="request()->is('contact')">Contact</x-nav-link>
        </ul>

        @auth
            @if(auth()->user()->isAdmin())
                <div class="et-sidebar-section-label">Admin</div>
                <ul class="et-nav">
                    <x-nav-link href="{{ route('admin.dashboard') }}" icon="bi-speedometer" :active="request()->is('admin/dashboard')">Admin Dashboard</x-nav-link>
                    <x-nav-link href="{{ route('admin.users') }}" icon="bi-person-badge-fill" :active="request()->is('admin/users')">Manage Users</x-nav-link>
                </ul>
            @endif
        @endauth

        <div class="et-sidebar-footer">
            EduTrack &copy; {{ date('Y') }}<br>
            Laravel Internship Project
        </div>
    </aside>

    <div class="et-sidebar-backdrop" id="etBackdrop"></div>

    {{-- Main column --}}
    <div class="et-main">

        <header class="et-topbar">
            <div class="d-flex align-items-center gap-3">
                <button class="et-sidebar-toggle" id="etSidebarToggle">
                    <i class="bi bi-list"></i>
                </button>
                <div>
                    <div class="et-topbar-title">@yield('title', 'Dashboard')</div>
                    <div class="et-topbar-sub">Student &amp; Course Management</div>
                </div>
            </div>

            <div class="et-topbar-user dropdown">
                <a href="#" class="d-flex align-items-center gap-2 text-decoration-none" data-bs-toggle="dropdown">
                    <div class="et-avatar"><i class="bi bi-person-fill"></i></div>
                    <span class="text-dark fw-semibold d-none d-md-inline">{{ auth()->user()->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><h6 class="dropdown-header">{{ auth()->user()->email }}</h6></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="px-3">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-danger w-100">
                                <i class="bi bi-box-arrow-right me-1"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </header>

        <main class="et-content">
            @yield('content')
        </main>

        <footer class="et-footer">
            EduTrack &copy; {{ date('Y') }} &mdash; Laravel Internship Project
        </footer>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const toggleBtn = document.getElementById('etSidebarToggle');
    const sidebar = document.getElementById('etSidebar');
    const backdrop = document.getElementById('etBackdrop');

    function closeSidebar(){
        sidebar.classList.remove('show');
        backdrop.classList.remove('show');
    }

    toggleBtn && toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('show');
        backdrop.classList.toggle('show');
    });
    backdrop && backdrop.addEventListener('click', closeSidebar);
</script>

@stack('scripts')
</body>
</html>
