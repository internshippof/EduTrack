<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Guest Routes (Day 12 - Authentication)
|--------------------------------------------------------------------------
| Only accessible when NOT logged in.
*/
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Logout (must be logged in)
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

/*
|--------------------------------------------------------------------------
| Protected Routes
|--------------------------------------------------------------------------
| Everything below requires the user to be logged in.
*/
Route::middleware('auth')->group(function () {

    // Home
    Route::get('/', [HomeController::class, 'index']);

    // Students (Day 15: Resource Controller — one line replaces 6 manual routes)
    Route::resource('students', StudentController::class)
        ->except('show'); // no single "view student" page needed

    // Courses
    Route::get('/courses', [PageController::class, 'courses']);

    // Course details (Day 11 - Eloquent Relationships demo: Course hasMany Students)
    Route::get('/courses/{id}', [PageController::class, 'courseDetail'])->name('courses.detail');

    Route::get('/about', [PageController::class, 'about']);
    Route::get('/contact', [PageController::class, 'contact']);
});

/*
|--------------------------------------------------------------------------
| Admin Routes (Day 13 - Middleware, Authorization, Roles & Permissions)
|--------------------------------------------------------------------------
| Requires: logged in (auth) AND role = admin (admin middleware alias).
*/
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::put('/users/{id}/role', [AdminController::class, 'updateRole'])->name('users.role');
});
